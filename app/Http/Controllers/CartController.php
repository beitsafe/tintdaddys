<?php

namespace App\Http\Controllers;

use App\Events\NewOrderPlaced;
use App\Http\Helpers\PaymentHelper;
use App\Http\Requests\Web\StoreOrderRequest;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auspost;
use Calendar;
use Fontis\Auspost\Api\Postage\Domestic\Parcel\Cost\CalculationParams;
use Fontis\Auspost\Model\Postage\Enum\ServiceCode;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $data = $this->_get_cart_items();
        $loggedUser = auth()->user();
        $data['paymentMethods'] = $loggedUser->paymentMethods()->filter(function ($i){ return $i->type == 'card'; });
        $data['client'] = $loggedUser->client;

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
        $data = $request->except(['_token']);
        $cartSession = $this->_get_cart_items();

        $order = new Order();
        $order->billing = $data['client'];
        $order->subtotal = $cartSession['cart_total'];
        $order->instructions = $data['instructions'];
        $loggedUser = auth()->user();

        try {
            $loggedUser->createOrGetStripeCustomer([
                'description' => $data['client']['business']
            ]);
            $loggedUser->addPaymentMethod($request->paymentMethodId);

            $stripeCharge = $loggedUser->charge(
                $order->total, $request->paymentMethodId
            );


            $order->paymentid = $stripeCharge->id;
            $order->responseinfos = $stripeCharge;
            $order->user_id = $loggedUser->id;
            $order->save();

            foreach ($cartSession['items'] as $pid => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $pid,
                    'quantity' => $item['qty'],
                    'unitprice' => $item['unitprice'],
                ]);
            }

            if (!$loggedUser->client) {
                $client = $order->billing;
                $client['user_id'] = $loggedUser->id;

                Client::create($client);
            }

            $request->session()->forget("cart");
            return redirect()->route('cart.thankyou', $order->id)->with('success', 'Order Placed Successfully');
        } catch (\Exception $e) {
            dd($e->getMessage(), $e->getLine());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function thankyou($id)
    {
        $order = Order::find($id);
        return view('site.thankyou', compact('order'));
    }
}
