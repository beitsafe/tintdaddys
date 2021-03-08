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
                            <img alt="image" src="{{asset('frontend/branding/oz-window-logo.png')}}" />
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col">
                                <h2 class="type--underline my-0 text-white-50">Order Details</h2>
                                <p class="my-0"><strong class="text-white-50">Date:</strong> {{$order->created_at->format('jS \\of F Y')}}</p>
                                <p class="my-0"><strong class="text-white-50">Invoice Number:</strong> {{$order->invoiceno}}</p>
                                <p class="my-0"><strong class="text-white-50">Total:</strong> ${{$order->subtotal}}</p>
                                <p class="my-0"><strong class="text-white-50">Instructions:</strong> {{$order->instructions}}</p>
                                <h2 class="my-0 type--underline text-white-50">Items:</h2>
                                <table class="table text-white table-dark">
                                    <thead class="bg-dark">
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->items as $item)
                                        @php
                                            $variant = $item->variant;
                                            $product = $variant->product;
                                        @endphp
                                        <tr>
                                            <td>{{ @$variant->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->unitprice }}</td>
                                        </tr>
                                    @endforeach
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
