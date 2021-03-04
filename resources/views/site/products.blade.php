@extends('layouts.master')

@section('content')

    <section class="bg--dark py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Products</h1>
                    <hr>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="bg--dark space--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="masonry masonry--tiles">
                        <div class="masonry-filter-container d-flex align-items-center">
                            <span>Category:</span>
                            <div class="masonry-filter-holder">
                                <div class="masonry__filters" data-filter-all-text="All Categories"></div>
                            </div>
                        </div>
                        <div class="masonry__container row">
                            @foreach($products as $product)
                                <div class="masonry__item col-md-4" data-masonry-filter="{{$product->category->name}}">
                                    <div class="product product--tile bg--secondary text-center">
                                        <a href="{{url('product/'.$product->slug)}}">
                                            <img class="bg-white" alt="Image"
                                                 src="storage/{{@$product->resources->first()->filepath}}" />
                                        </a>
                                        <a class="block" href="{{route('product.view',$product)}}">
                                            <div>
                                                <h5>{{$product->name}}</h5>
                                                <span>{!! $product->shortDescription !!}</span>
                                            </div>
                                            <div>
                                                @role('approved')
                                                    <span class="h4 inline-block">${{$product->price}}</span>
                                                @else

                                                @endrole
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end masonry container-->
                    </div>
                    <!--end masonry-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

@stop
