@extends('layouts.master')

@section('content')
    <div role="main" class="main">
        <section class="section section-skew bg-dark-3 mb-2">
            <div class="section-skew-layer section-skew-layer-mobile-right bg-dark-4" data-skew-layer
                 data-skew-layer-value="10%" data-skew-layer-from="left"></div>
            <div class="section-skew-layer section-skew-layer-mobile-right bg-dark-5" data-skew-layer
                 data-skew-layer-value="15%" data-skew-layer-from="left"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="font-weight-semibold text-light mb-0">Order Placed</h2>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mb-3">
            <div class="card bg-light-1">
                <div class="card-header"><h3>Order ID: #{{ $order->invoice }}</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="font-weight-bold mb-3">Billing Info</h4>
                            <div class="form-row">
                                <div class="form-group col">
                                    <div class="d-flex justify-content-between">
                                        <div>{{ $order->billing_name }}</div>
                                        <div>{{ $order->billing['email'] }}</div>
                                        <div>{{ $order->billing['phone'] }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    {{ $order->billing['address'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h4 class="font-weight-bold mb-3">Cart Items</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th width="10%"></th>
                                        <th><strong>Product</strong></th>
                                        <th><strong>Unit Price</strong></th>
                                        <th class="text-center" width="8%"><strong>Quantity</strong></th>
                                        <th class="text-center" width="15%"><strong>Total</strong></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->items as $item)
                                        @php
                                            $product = $item->product;
                                        @endphp
                                        <tr class="cart-item">
                                            <td class="text-center">
                                                <img src="{{ @$product->default_thumb }}" class="img-fluid"
                                                     width="67" alt="{{ $product->name }}"/>
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>${{ $item->unitprice }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-center">${{ $item->total }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right font-weight-bold">Total</td>
                                        <td class="text-center">${{ $order->total }}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
