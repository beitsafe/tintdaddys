<?php

namespace App\Http\Controllers;

use App\Events\NewOrderPlaced;
use App\Http\Helpers\FastwayHelper;
use App\Http\Helpers\PaymentHelper;
use App\Http\Requests\Web\StoreOrderRequest;
use App\Mail\OrderReceived;
use App\Models\Client;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Auspost;
use Calendar;
use Fontis\Auspost\Api\Postage\Domestic\Parcel\Cost\CalculationParams;
use Fontis\Auspost\Model\Postage\Enum\ServiceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $data = $this->_get_cart_items();
        $loggedUser = auth()->user();
        $data['paymentMethods'] = $loggedUser->paymentMethods()->filter(function ($i) {
            return $i->type == 'card';
        });
        $data['client'] = $loggedUser->client;

        return view('site.cart', $data);
    }

    public function processCart(Request $request, $process = null)
    {
        if ($process) {
            $pid = $request->id;
            $qty = @$request->qty ?: 1;

            if ($variant = @$request->variant) {
                if ($process == 'add') {
                    $request->session()->put("cart.{$pid}.{$variant}", $qty);
                } else if ($process == 'remove') {
                    $request->session()->forget("cart.{$pid}.{$variant}");
                }
            }

            if ($process == 'shipping') {
                if ($suburb = $request->get('suburb')) {
                    $request->session()->put("shipping.suburb", $suburb);
                }
                if ($postcode = $request->get('postcode')) {
                    $request->session()->put("shipping.postcode", $postcode);
                }
                if ($address = $request->get('address')) {
                    $request->session()->put("shipping.address", $address);
                }
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

        $data['cart_total'] = $data['cart_shipping'] = 0;
        $shipping['weight'] = $shipping['length'] = $shipping['width'] = $shipping['height'] = 0;
        $data['items'] = [];

        foreach ($items as $k => $variants) {
            foreach ($variants as $variant_id => $qty) {
                $product = Product::find($k);
                $variant = ProductVariant::with('sizeshade')->find($variant_id);
                if ($product) {
                    $data['cart_total'] += $total = ($qty * $variant->sizeshade->price);

//                    Shipping Parcel Measures
                    $shipping['weight'] += $product->weight;
                    $shipping['length'] += $product->length;
                    $shipping['width'] += $product->width;
                    $shipping['height'] += $product->height;

                    $data['items'][$k][$variant_id] = [
                        'name' => $variant->name,
                        'thumb' => $product->default_thumb,
                        'slug' => $product->slug,
                        'qty' => $qty,
                        'unitprice' => $variant->sizeshade->price,
                        'total' => $total,
                    ];
                }
            }
        }

        $fastWay = new FastwayHelper();
        if ($fastWay->isEnabled && $shippingSession = \request()->session()->get('shipping', false)) {
            $pickupFrom = env('FASTWAY_PICKUP_SUBURB');
            $shippingPrice = $fastWay->get("/psc/lookup/{$pickupFrom}/{$shippingSession['suburb']}/{$shippingSession['postcode']}", [
                'WeightInKg' => $shipping['weight'],
                'LengthInCm' => $shipping['length'],
                'WidthInCm' => $shipping['width'],
                'HeightInCm' => $shipping['height'],
                'FullAddress' => $shippingSession['address'],
            ]);
            try {
                $data['cart_shipping'] = @$shippingPrice->cheapest_service->totalprice_normal;
            }catch(\Exception $e){}
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
                'name' => $loggedUser->name,
                'description' => $data['client']['businessName']
            ]);
            $loggedUser->addPaymentMethod($request->paymentMethodId);

            $stripeCharge = $loggedUser->charge(
                ($order->total * 100), $request->paymentMethodId
            );


            $order->paymentid = $stripeCharge->id;
            $order->responseinfos = $stripeCharge;
            $order->user_id = $loggedUser->id;
            $order->save();

            foreach ($cartSession['items'] as $pid => $product) {
                foreach ($product as $variant => $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_variant_id' => $variant,
                        'quantity' => $item['qty'],
                        'unitprice' => $item['unitprice'],
                    ]);
                }
            }

            if (!$loggedUser->client) {
                $client = $order->billing;

                Client::updateOrCreate(['user_id' => $loggedUser->id], $client);
            }

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new OrderReceived($order));
            $request->session()->forget("cart");
            alert()->success('Order Placed Successfully');
            return redirect()->route('cart.thankyou', $order->id);
        } catch (\Exception $e) {
            alert()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function thankyou($id)
    {
        $order = Order::find($id);
        return view('site.thankyou', compact('order'));
    }
}
