@extends('layouts.master')

@section('content')

    <section class="space--lg bg--dark">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-7 col-lg-6">
                    <div class="slider border--round boxed--border" data-paging="true" data-arrows="true">
                        <ul class="slides">
                            @foreach($product->resources as $resource)
                                <li>
                                    <img src="{{ asset("storage/".$resource->filepath) }}"
                                         alt="{{ $resource->altvalue }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <h2>{{$product->name}}</h2>
                    <div class="text-block">
                        @auth()
                            <span class="h4 inline-block">${{$product->price}}</span>
                        @endauth
                    </div>
                    <p>{!! $product->shortDescription !!}</p>
                    <ul class="accordion accordion-2 accordion--oneopen">
                        <li>
                            <div class="accordion__title"><span class="h5">Specifications</span></div>
                            <div class="accordion__content">
                                <ul class="bullets">
                                    <li><span>Frequence Response: 25KHz — 24,000KHz</span></li>
                                    <li><span>DAB+ / FM / AM</span></li>
                                    <li><span>16,000 mAh Internal Rehcargable Battery</span></li>
                                    <li><span>10 Watts</span></li>
                                </ul>
                            </div>
                        </li>
                        <li class="active">
                            <div class="accordion__title"><span class="h5">Dimensions</span></div>
                            <div class="accordion__content">
                                <ul>
                                    <li><span>Product: 3.5”W X 3.0”H X 3.0”D</span></li>
                                    <li><span>Packaging: 7”W X 6”H X 5”D </span></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title"><span class="h5">Shipping Info</span></div>
                            <div class="accordion__content">
                                <p> Generally ships between 2 - 4 working days from order confirmation. Orders only
                                    confirmed once payment has successfully processed. NOTE: When using services such as
                                    Skrill, payments can take longer to process (approx. 4 days). </p>
                            </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-4">
                            <input type="number" name="quantity" placeholder="QTY" min="1" max="100" required>
                        </div>
                        <div class="col-8">
                            <button type="button" class="btn w-100 btn--primary add-to-cart" data-id="{{ $product->id }}" data-name="{{ $product->name }}">Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
