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
            <form class="cart-form">
                <div class="row">
                    @foreach($items as $id => $item)
                        <div class="col-md-4 cart-item" data-pid="{{$id}}" data-unitprice="{{ $item['unitprice'] }}">
                            <div class="product">
                                <span class="label">QTY: {{ $item['qty'] }}</span>
                                <img alt="{{ $item['name'] }}" src="{{ $item['thumb'] }}"/>
                                <div>
                                    <h5>{{ $item['name'] }}</h5>
                                    <span> 18MP DSLR Camera</span>
                                </div>
                                <div>
                                    <span class="h4 inline-block">${{ $item['total'] }}</span>
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
                                    <a class="btn btn-sm btn--primary">Edit billing details</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Name:</p>
                                <p>Phone:</p>
                                <p>Email:</p>
                                <p>Company:</p>
                                <p>Delivery Address:</p>
                            </div>

                            <div class="col-md-12 mt--1">
                                <label>Additional instructions (optional):</label>
                                <textarea rows="4" name="instructions"></textarea>
                            </div>
                        </div>
                        <!--end of row-->
                    </div>
                    <div class="col-md-6">
                        <div class="boxed boxed--border">
                            <div class="row">
                                <div class="col-6">
                                    <span class="h5">Cart Subtotal:</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span>${{$cart_total}}</span>
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
                                    <span class="h5">${{ $cart_total }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col text-right text-center-xs">
                                <button type="submit" class="btn btn--primary type--uppercase">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of row-->
                <!--end of row-->
            </form>
            <!--end checkout form-->
        </div>
        <!--end of container-->
    </section>
@stop
