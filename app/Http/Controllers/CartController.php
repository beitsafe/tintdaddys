<?php

namespace App\Http\Controllers;

use App\Events\NewOrderPlaced;
use App\Http\Helpers\PaymentHelper;
use App\Http\Requests\Web\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Fontis\Auspost\Api\Postage\Domestic\Parcel\Cost\CalculationParams;
use Fontis\Auspost\Model\Postage\Enum\ServiceCode;
use Illuminate\Http\Request;
use Calendar;
use Auspost;

class CartController extends Controller
{
    public function index()
    {
        $data = $this->_get_cart_items();
        return view('site.cart', $data);
    }

    public function processCart(Request $request, $process = null)
    {
        if ($process) {
            $pid = $request->id;
            $qty = @$request->qty ?: 1;

            if ($process == 'add') {
                $request->session()->put("cart.{$pid}", $qty);
            } else if ($process == 'remove') {
                $request->session()->forget("cart.{$pid}");
            }
        }

        $items = $this->_get_cart_items();

        $result = [
            'items' => $request->session()->get('cart'),
            'cart_total' => $items['cart_total']
        ];

        return response()->json($result);
    }

    protected function _get_cart_items($postcode = null)
    {
        $items = \request()->session()->get('cart') ?: [];

        $data['cart_total'] = 0;
        $data['items'] = [];
        foreach ($items as $k => $qty) {
            $product = Product::find($k);
            if ($product) {
                $data['cart_total'] += $total = ($qty * $product->price);

                $data['items'][$k]['name'] = $product->name;
                $data['items'][$k]['thumb'] = $product->default_thumb;
                $data['items'][$k]['slug'] = $product->slug;
                $data['items'][$k]['qty'] = $qty;
                $data['items'][$k]['unitprice'] = $product->price;
                $data['items'][$k]['total'] = $total;
            }
        }

        return $data;
    }

    public function store(StoreOrderRequest $request)
    {
        try {
            $data = $request->except(['_token']);
            $items = $this->_get_cart_items(@$data['shipping']['postalcode']);
            $model = new Order();
            $model->billing = $data['billing'];
            $model->shipping = $data['shipping'];
            $model->items = $items;
            $model->requestinfos = $data;
            $model->subtotal = $items['cart_total'];
            $model->shippingfee = $items['shippingfee'];

            $payment = new PaymentHelper();
            $payment->chargeOrder($data['payment']['token'], $model);
            if ($payment->status) {
                $model->paymentid = $payment->paymentid;
                $model->responseinfos = $payment->response;
                $model->user_id = auth()->user()->id;
                $model->save();

                event(new NewOrderPlaced($model));

                $request->session()->forget("cart");
                return response()->json(['status' => 'success', 'id' => $model->id]);
            } else {
                if($payment->redirectUrl){
                    $request->session()->forget("cart");
                    return response()->json(['status' => 'true', 'redirectUrl' => $payment->redirectUrl]);
                }
                return response()->json(['status' => 'failure', 'message' => $payment->response]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'failure', 'id' => $e->getMessage()]);
        }
    }

    public function thankyou($id)
    {
        $order = Order::find($id);
        return view('site.shop.thankyou', compact('order'));
    }
}
