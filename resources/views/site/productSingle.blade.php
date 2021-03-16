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
                                    <img class="bg-white"
                                         src="{{ asset("storage/".$resource->filepath) }}"
                                         alt="{{ $resource->altvalue }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <h2>{{$product->name}}</h2>
                    <div class="text-block">
                        @can('approved')
                            <span class="h4 inline-block">${{$product->price}}</span>
                        @endcan
                    </div>
                    <p>{!! $product->shortDescription !!}</p>
                    <ul class="accordion accordion-2 accordion--oneopen">
                        <li>
                            <div class="accordion__title"><span class="h5">Extra Info</span></div>
                            <div class="accordion__content">
                                <p>{{$product->body}}</p>
                            </div>
                        </li>
                        <li class="active">
                            <div class="accordion__title"><span class="h5">Dimensions</span></div>
                            <div class="accordion__content">
                                <ul>
                                    <li><span>Length: {{$product->length}}</span></li>
                                    <li><span>Width: {{$product->width}}</span></li>
                                    <li><span>Height: {{$product->height}}</span></li>
                                    <li><span>Weight: {{$product->weight}}</span></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title"><span class="h5">Shipping Info</span></div>
                            <div class="accordion__content">
                                <p>Shipping info here</p>
                            </div>
                        </li>
                    </ul>
                    @role('approved')
                    <div class="row">
                        @if($product->istint)
                            <div class="col-6 mb-2">
                                <label>Size(s):</label>
                                <div class="input-select">
                                    {{ Form::select('size', $sizes, null, ['placeholder'=>'Select Size']) }}
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Shade(s):</label>
                                <div class="input-select">
                                    {{ Form::select('shade', $shades, null, ['placeholder'=>'Select Shade']) }}
                                </div>
                            </div>
                        @endif
                        <div class="col-4">
                            <input type="number" name="quantity" placeholder="QTY" min="1" max="100" required>
                        </div>
                        <div class="col-8">
                            <button type="button" class="btn w-100 btn--primary add-to-cart" data-istint="{{ $product->istint }}" data-id="{{ $product->id }}" data-name="{{ $product->name }}">Add To Cart</button>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </section>

@stop

@push('scripts')
    @include('layouts.backPartials.select2_scripts')
@endpush
