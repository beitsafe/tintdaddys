<div class="modal-instance block">
    <a class="btn btn-outline-light modal-trigger" href="#">
        <span class="btn__text">
            Order Details
        </span>
    </a>
    <div class="modal-container">
        <div class="modal-content">
            <section class=" feature-large bg-dark border--round text-white">
                <div class="row">
                    <div class="col-4">
                        <div class="">
                            <img alt="image" src="{{asset('frontend/branding/oz-window-logo.png')}}"/>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col">
                                <h2 class="type--underline my-0 text-white-50">Order Details</h2>
                                <p class="my-0"><strong class="text-white-50">Date:</strong> {{$order->created_at->format('jS \\of F Y')}}</p>
                                <p class="my-0"><strong class="text-white-50">Invoice Number:</strong> {{$order->invoiceno}}</p>
                                <p class="my-0"><strong class="text-white-50">Total:</strong> ${{ number_format($order->total,2) }}</p>
                                <p class="my-0"><strong class="text-white-50">Instructions:</strong> {{$order->instructions}}</p>
                                <h2 class="my-0 type--underline text-white-50">Items:</h2>
                                <table class="table text-white table-dark">
                                    <thead class="bg-dark">
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col" class="text-center">Quantity</th>
                                        <th scope="col" class="text-right">Unit Price</th>
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
                                        <tr>
                                            <td>{{ @$name }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-right">${{ number_format($item->total,2) }}</td>
                                        </tr>
                                    @endforeach
                                    @if($order->shippingfee)
                                        <tr>
                                            <td class="text-right" colspan="2">Shipping</td>
                                            <td class="text-right">${{ number_format($order->shippingfee,2) }}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
