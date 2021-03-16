@extends('layouts.master')

@section('content')

    <section class="bg--dark py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Cart</h1>
                    <hr>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="bg--dark">
        <div class="container">
            <div id="empty-cart" class="col-12 text-center">
                <h4>No items in your cart !!!</h4>
                <a href="{{ route('product.list') }}" class="btn btn-sm btn--primary">Go to Shopping</a>
            </div>
            {{ Form::open(['route' => 'cart.store','id'=>'cart-form']) }}
            <div class="row">
                @foreach($items as $id => $product)
                    @if(isset($product['name']))
                        @php
                            $item = $product;
                        @endphp
                        <div class="col-md-4 cart-item" data-pid="{{$id}}" data-unitprice="{{ $item['unitprice'] }}">
                            <div class="product">
                                <div class="product__controls row">
                                    <div class="col-3">
                                        <span class="label top-0 ml-auto">QTY:</span>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-number">
                                            <input class="h-2em" type="number" name="quantity" placeholder="Quantity" value="{{ $item['qty'] }}" min="1" max="100"/>
                                            <div class="input-number__controls">
                                                <span class="input-number__increase" data-trigger="change-qty" data-value="+"><i class="stack-up-open"></i></span>
                                                <span class="input-number__decrease" data-trigger="change-qty" data-value="-"><i class="stack-down-open"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-right">
                                        <button class="checkmark checkmark--cross bg--error top-0 remove-cart"></button>
                                    </div>
                                </div>
                                <img alt="{{ $item['name'] }}" src="{{ $item['thumb'] }}"/>
                                <div>
                                    <h5>{{ $item['name'] }}</h5>
                                </div>
                                <div>
                                    <span class="h4 inline-block row-total">${{ $item['total'] }}</span>
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach($product as $variant => $item)
                            <div class="col-md-4 cart-item" data-pid="{{$id}}" data-variant="{{$variant}}" data-unitprice="{{ $item['unitprice'] }}">
                                <div class="product">
                                    <div class="product__controls row">
                                        <div class="col-3">
                                            <span class="label top-0 ml-auto">QTY:</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-number">
                                                <input class="h-2em" type="number" name="quantity" placeholder="Quantity" value="{{ $item['qty'] }}" min="1" max="100"/>
                                                <div class="input-number__controls">
                                                    <span class="input-number__increase" data-trigger="change-qty" data-value="+"><i class="stack-up-open"></i></span>
                                                    <span class="input-number__decrease" data-trigger="change-qty" data-value="-"><i class="stack-down-open"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 text-right">
                                            <button class="checkmark checkmark--cross bg--error top-0 remove-cart"></button>
                                        </div>
                                    </div>
                                    <img alt="{{ $item['name'] }}" src="{{ $item['thumb'] }}"/>
                                    <div>
                                        <h5>{{ $item['name'] }}</h5>
                                    </div>
                                    <div>
                                        <span class="h4 inline-block row-total">${{ $item['total'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>

            <hr>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <h4>Billing Details</h4>
                        </div>
                        <div class="col">
                            <div class="float-right">
                                <button type="button" id="toggle-billing-fields" class="btn btn-sm btn--primary px-5">Edit billing details</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                {{ Form::label('client_firstname', 'Name:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[firstName]', request()->session()->get('shippingTo.ContactName'), ['data-shipping-name'=>'ContactName','class' => 'form-control billing-field', "readonly" ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('client_phone', 'Phone:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[phone]', request()->session()->get('shippingTo.PhoneNumber'), ['data-shipping-name'=>'PhoneNumber','class' => 'form-control billing-field', "readonly" ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('client_email', 'Email:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[email]', request()->session()->get('shippingTo.Email'), ['data-shipping-name'=>'Email','class' => 'form-control billing-field', "readonly" ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('client_business', 'Business:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[businessName]', old('client.businessName', @$client->businessName), ['class' => 'form-control billing-field', "readonly" ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('client_address', 'Delivery Address:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[address]', request()->session()->get('shippingTo.Address.StreetAddress'), ['data-shipping-name'=>'Address.StreetAddress','class' => 'form-control billing-field','id'=>'shipping-address','placeholder'=>'Address', "readonly" ]) }}
                                    {{ Form::text('client[city]', request()->session()->get('shippingTo.Address.Locality'), ['data-shipping-name'=>'Address.Locality','class' => 'form-control billing-field','id'=>'shipping-suburb','placeholder'=>'Locality', "readonly" ]) }}
                                    {{ Form::text('client[suburb]', request()->session()->get('shippingTo.Address.StateOrProvince'), ['data-shipping-name'=>'Address.StateOrProvince','class' => 'form-control billing-field','id'=>'shipping-suburb','placeholder'=>'Suburb', "readonly" ]) }}
                                    {{ Form::text('client[postcode]', request()->session()->get('shippingTo.Address.PostalCode'), ['data-shipping-name'=>'Address.PostalCode','class' => 'form-control billing-field','id'=>'shipping-postcode','placeholder'=>'Postcode', "readonly" ]) }}
                                    {{ Form::select('client[country]',\App\Models\Client::COUNTRIES, request()->session()->get('shippingTo.Address.Country'), ['data-shipping-name'=>'Address.Country','class' => 'form-control billing-field mt-3','id'=>'shipping-postcode', "readonly" ]) }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt--1">
                            <label>Additional instructions (optional):</label>
                            {{ Form::textarea('instructions', old('instructions'), ["rows" => 4]) }}
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <div class="col-md-6">
                    <div class="boxed boxed--border">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="mb-0">Payment Methods</h3>
                                    </div>
                                    <div class="col text-right">
                                        <img class="image--xxs mr-auto" alt="stripe logo" src="{{asset('frontend/branding/Powered by Stripe - white.png')}}">
                                    </div>
                                </div>
                                <p>Use stored card, or enter new card details below</p>

                                <ul class="list-group bg--dark">
                                    @foreach($paymentMethods as $paymentMethod)
                                        @php
                                            $card = $paymentMethod->card;
                                        @endphp
                                        <li class="list-group-item bg--dark d-flex align-items-center border-0 p-0 mb-3">
                                            <div class="input-radio mr-3">
                                                {{--                                            <span class="input__label">Option 1</span>--}}
                                                <input id="paymentMethod-{{ $loop->iteration }}" type="radio" name="paymentMethodId" value="{{ $paymentMethod->id }}"/>
                                                <label for="paymentMethod-{{ $loop->iteration }}"></label>
                                            </div>
                                            <i class="fab fa-2x fa-cc-{{ $card->brand }} mr-3"></i>
                                            <span class="h4 mb-0 mr-5">×××× ×××× ×××× {{ $card->last4 }}</span>
                                            <span class="h5 mb-0">{{ str_pad($card->exp_month, 2, 0, STR_PAD_LEFT) }} / {{ $card->exp_year }}</span>
                                            {{--                                         at Expires: --}}
                                        </li>
                                        <hr>
                                    @endforeach
                                </ul>
                                <div id="card-element" style="height: 30px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="cart-totals mb--1 pos-relative">
                        <div class="pos-absolute w-100 h-100 spinner">
                            <div class="overlay"></div>
                            <div class="loader"></div>
                        </div>
                        <div class="boxed boxed--border">
                            <div class="row">
                                <div class="col-6">
                                    <span class="h5">Cart Subtotal:</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span id="cart-subtotal">${{$cart_total}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span class="h5">Shipping (US):</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span id="cart-shippingfee">$0</span>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-6">
                                    <span class="h5">Total:</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="h5" id="cart-total">${{ $cart_total }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col text-right text-center-xs">
                            <button id="card-button" type="button" class="btn btn--primary type--uppercase w-100">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of row-->
            <!--end of row-->
        {{ Form::close() }}
        <!--end checkout form-->
        </div>
        <!--end of container-->
    </section>
@stop

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        const stripe = Stripe('{{ env('STRIPE_KEY') }}'),
            elements = stripe.elements(),
            $cardButton = $('#card-button'),
            $cardForm = $('#cart-form'),
            cardElement = elements.create('card', {
                hidePostalCode: true,
                style: {
                    base: {
                        iconColor: '#ed3833',
                        color: '#FFFFFF',
                        lineHeight: '40px',
                        fontWeight: 300,
                        fontSize: '15px',

                        '::placeholder': {
                            color: '#CFD7E0',
                        },
                    },
                }
            });

        cardElement.mount('#card-element');

        $(document).ready(function () {
            $cardButton.on('click', async (e) => {
                $cardButton.attr('disabled', 'disabled').html('<i class="fa fa-spin fa-spinner"></i> Processing...');
                if ($('[name="paymentMethodId"]').length > 0 && $('[name="paymentMethodId"]:checked').val()) {
                    $cardForm.submit();
                    return;
                }
                const {paymentMethod, error} = await stripe.createPaymentMethod('card', cardElement);

                if (error) {
                    toastr.error(error.message);
                    $cardButton.removeAttr('disabled').html('Checkout');
                } else {
                    $cardForm.append($('<input type="hidden" name="paymentMethodId">').val(paymentMethod.id));
                    $cardForm.submit();
                }
            });

            $('#toggle-billing-fields').on('click', function (e) {
                $cardForm.find('.billing-field').removeAttr('readonly');
                $cardForm.find('.billing-field:eq(0)').focus();
            });
        });
    </script>
@endpush
