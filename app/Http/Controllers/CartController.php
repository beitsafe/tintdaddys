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
use App\Models\Shade;
use App\Models\Size;
use Auspost;
use Calendar;
use Fontis\Auspost\Api\Postage\Domestic\Parcel\Cost\CalculationParams;
use Fontis\Auspost\Model\Postage\Enum\ServiceCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $data = $this->_get_cart_items();
        $loggedUser = auth()->user();
        $data['paymentMethods'] = $loggedUser->paymentMethods()->filter(function ($i) {
            return $i->type == 'card';
        });
        $data['client'] = $client = $loggedUser->client;

        if ($client && !$request->session()->get("shippingTo")) {
            $shippingTo = [
                'ContactName' => $client->name,
                'PhoneNumber' => $client->phone,
                'Email' => $client->email,
                'Address' => [
                    'StreetAddress' => $client->address,
                    'Locality' => $client->city,
                    'StateOrProvince' => $client->suburb,
                    'PostalCode' => $client->postcode,
                    'Country' => $client->country,
                ],
            ];
            $request->session()->put("shippingTo", $shippingTo);
        }

        return view('site.cart', $data);
    }

    public function processCart(Request $request, $process = null)
    {
        if ($process) {
            $pid = $request->id;
            $qty = @$request->qty ?: 1;
            $productCartId = "cart.{$pid}";

            if ($variant = @$request->variant) {
                $productCartId .= ".{$variant}";
            }

            if ($process == 'add') {
                $request->session()->put($productCartId, $qty);
            } else if ($process == 'remove') {
                $request->session()->forget($productCartId);
            }

            if ($process == 'shipping') {
                $request->session()->put("shippingTo.{$request->get('field')}", $request->get('value'));
            }
        }

        $items = $this->_get_cart_items();

        $result = [
            'items' => $request->session()->get('cart'),
            'cart_total' => $items['cart_total'],
            'shippingfee' => $items['shippingfee'],
            'shippingerror' => $items['shippingerror']
        ];

        return response()->json($result);
    }

    protected function _get_cart_items($postcode = null)
    {
        $items = \request()->session()->get('cart') ?: [];
        $shippingParams['To'] = \request()->session()->get('shippingTo') ?: [];

        $data['shippingerror'] = '';
        $data['cart_total'] = $data['shippingfee'] = 0;
        $data['items'] = [];
        $fastWay = new FastwayHelper();

        foreach ($items as $product_id => $variants) {
            $product = Product::find($product_id);
            if (is_array($variants)) { // If Tint Product
                foreach ($variants as $size_shade => $qty) {
                    list($size_id, $shade_id) = explode('_', $size_shade, 2);

                    $variant = ProductVariant::with(['size', 'shade'])->where(['product_id' => $product_id, 'size_id' => $size_id, 'shade_id' => $shade_id])->first();
                    $data['cart_total'] += $total = ($qty * $variant->price);

                    $data['items'][$product_id][$size_shade] = [
                        'name' => $variant->name,
                        'thumb' => $product->default_thumb,
                        'slug' => $product->slug,
                        'qty' => $qty,
                        'unitprice' => $variant->price,
                        'total' => $total,
                    ];

                    $shippingParams['Items'][] = [
                        'Quantity' => $qty,
                        'PackageType' => 'P',
                        'WeightDead' => $product->weight,
                        'Length' => $product->length,
                        'Width' => $product->width,
                        'Height' => $product->height,
                    ];
                }
            } else {
                $qty = $variants;
                $data['cart_total'] += $total = ($qty * $product->price);

                $data['items'][$product_id] = [
                    'name' => $product->name,
                    'thumb' => $product->default_thumb,
                    'slug' => $product->slug,
                    'qty' => $qty,
                    'unitprice' => $product->price,
                    'total' => $total,
                ];

                if ($product->isShippable()) {
                    $shippingParams['Items'][] = [
                        'Quantity' => $qty,
                        'PackageType' => 'P',
                        'WeightDead' => $product->weight,
                        'Length' => $product->length,
                        'Width' => $product->width,
                        'Height' => $product->height,
                    ];
                }
            }
        }

        if ($fastWay->isEnabled) {
            $shippingPrice = $fastWay->getQuote($shippingParams);

            if ($shippingPrice) {
                $data['shippingfee'] = number_format($shippingPrice->total, 2);
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
        $order->shippingfee = $cartSession['shippingfee'];
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
                if (isset($product['name'])) {
                    $item = $product;
                    OrderItem::create([
                        'order_id' => $order->id,
                        'quantity' => $item['qty'],
                        'product_id' => $pid,
                        'unitprice' => $item['unitprice'],
                    ]);
                } else {
                    foreach ($product as $size_shade => $item) {
                        list($size_id, $shade_id) = explode('_', $size_shade, 2);
                        $size = Size::find($size_id);
                        $shade = Shade::find($shade_id);
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $pid,
                            'size' => $size->name,
                            'shade' => $shade->name,
                            'quantity' => $item['qty'],
                            'unitprice' => $item['unitprice'],
                        ]);
                    }
                }
            }

            if (!$loggedUser->client) {
                $client = $order->billing;

                Client::updateOrCreate(['user_id' => $loggedUser->id], $client);
            }

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new OrderReceived($order));
            $request->session()->forget("cart");
            $request->session()->forget("shippingTo");
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
