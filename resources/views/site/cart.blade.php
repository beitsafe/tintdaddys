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
                @foreach($items as $id => $item)
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
                                <span> 18MP DSLR Camera</span>
                            </div>
                            <div>
                                <span class="h4 inline-block row-total">${{ $item['total'] }}</span>
                            </div>
                        </div>
                    </div>
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
                                    {{ Form::text('client[firstname]', old('client.firstname', @$client->name), ['class' => 'form-control billing-field', "readonly" ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('client_phone', 'Phone:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[phone]', old('client.phone', @$client->phone), ['class' => 'form-control billing-field', "readonly" ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('client_email', 'Email:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[email]', old('client.email', @$client->email), ['class' => 'form-control billing-field', "readonly" ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('client_business', 'Business:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[business]', old('client.business', @$client->businessName), ['class' => 'form-control billing-field', "readonly" ]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('client_address', 'Delivery Address:', ['class' => 'col col-form-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::text('client[address]', old('client.address', @$client->address), ['class' => 'form-control billing-field', "readonly" ]) }}
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
                    <div class="boxed boxed--border cart-totals">
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
                                <span>$0</span>
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
                    <div class="boxed boxed--border">
                        <div class="row">
                            <div class="col">
                                <ul class="list-group bg--dark">
                                    @foreach($paymentMethods as $paymentMethod)
                                        @php
                                            $card = $paymentMethod->card;
                                        @endphp
                                    <li class="list-group-item bg--dark">
{{--                                        <input type="checkbox" name="payid" value="{{ $paymentMethod->id }}">--}}
                                        {{ $card->brand }} **** **** **** {{ $card->last4 }} at Expires: {{ $card->exp_month }}/{{ $card->exp_year }}
                                    </li>
                                    @endforeach
                                </ul>
                                <div id="card-element" style="height: 30px;"></div>
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
                $cardForm.find('input.billing-field').removeAttr('readonly');
                $cardForm.find('input.billing-field:eq(0)').focus();
            });
        });
    </script>
@endpush
