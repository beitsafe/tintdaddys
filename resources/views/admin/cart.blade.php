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
                    <div class="col-md-4">
                        <div class="product">
                            <span class="label">QTY: 1</span>
                            <img alt="Image" src="{{asset('frontend/images/HTB1oISFnuSSBuNjy0Flq6zBpVXav.jpg')}}" />
                            <div>
                                <h5>Canon 550D</h5>
                                <span> 18MP DSLR Camera</span>
                            </div>
                            <div>
                                <span class="h4 inline-block">$849</span>
                            </div>
                        </div>
                    </div>
                    <!--end item-->
                    <div class="col-md-4">
                        <div class="product">
                            <span class="label">QTY: 1</span>
                            <img alt="Image" src="{{asset('frontend/images/HTB1oISFnuSSBuNjy0Flq6zBpVXav.jpg')}}" />
                            <div>
                                <h5>Microsoft Surface</h5>
                                <span> 256GB Core i7</span>
                            </div>
                            <div>
                                <span class="h4 inline-block">$1399</span>
                            </div>
                        </div>
                    </div>
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
                                    <span>$989.98</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span class="h5">Shipping (US):</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span>$39</span>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-6">
                                    <span class="h5">Total:</span>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="h5">$1,028.98</span>
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
