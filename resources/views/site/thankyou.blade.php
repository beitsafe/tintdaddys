@extends('layouts.master')

@section('content')
    <section class="bg--dark py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Order Placed</h1>
                    <hr>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="bg--dark">
        <div class="container">
            <div class="card bg--dark">
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
                                    {{ $order->billing_address }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h4 class="font-weight-bold mb-3">Cart Items</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered bg--dark">
                                    <thead class="thead-light">
                                    <tr>
                                        <th width="10%"></th>
                                        <th><strong>Product</strong></th>
                                        <th><strong>Unit Price</strong></th>
                                        <th class="text-center" width="8%"><strong>Quantity</strong></th>
                                        <th class="text-right" width="15%"><strong>Total</strong></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->items as $item)
                                        @php
                                            $product = $item->product;
                                            $name = $product->name;
                                            if($size = $item->size){
                                                $name .= " - {$size}";
                                            }
                                            if($shade = $item->shade){
                                                $name .= " * {$shade}";
                                            }
                                        @endphp
                                        <tr class="cart-item">
                                            <td class="text-center">
                                                <img src="{{ @$product->default_thumb }}" class="img-fluid" width="67" alt="{{ $name }}"/>
                                            </td>
                                            <td>{{ $name }}</td>
                                            <td>${{ $item->unitprice }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-right">${{ number_format($item->total,2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right font-weight-bold">Shipping</td>
                                        <td class="text-right">${{ $order->shippingfee }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right font-weight-bold">Total</td>
                                        <td class="text-right">${{ number_format($order->total,2) }}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
