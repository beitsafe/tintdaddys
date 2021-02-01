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
                            <div class="masonry__item col-md-4"></div>
                            <div class="masonry__item col-md-4" data-masonry-filter="Computing">
                                <div class="product product--tile bg--secondary text-center">
                                    <span class="label">Sale</span>
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-1.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Apple iPad</h5>
                                            <span> 128GB Wifi + Celluar</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block type--strikethrough">$899</span>
                                            <span class="h4 inline-block">$799</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Creative">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-8.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Canon 550D</h5>
                                            <span> 18MP DSLR Camera</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$849</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Accessories">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-2.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Apple Keyboard</h5>
                                            <span> Wireless Bluetooth</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$99</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Accessories">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-12.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Magic Mouse</h5>
                                            <span> Wireless Bluetooth</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$69</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Audio">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-10.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>DALI Xensor 2</h5>
                                            <span> Desktop Speaker</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$269</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Audio">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-5.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Tivoli M1</h5>
                                            <span> Digital Radio</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block type--strikethrough">$479</span>
                                            <span class="h4 inline-block">$399</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Computing">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-4.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Microsoft Surface</h5>
                                            <span> 256GB Core i7</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$1399</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Computing">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-3.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Samsung Ativ</h5>
                                            <span> 256GB Core i5</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$1099</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Computing">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-11.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Apple Macbook</h5>
                                            <span> 128GB Core i5</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$1399</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Creative">
                                <div class="product product--tile bg--secondary text-center">
                                    <span class="label">Sale</span>
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-7.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Wacom Intuos 5</h5>
                                            <span> Drawing Tablet</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block type--strikethrough">$699</span>
                                            <span class="h4 inline-block">$559</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Audio">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-9.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Audison TMA-4</h5>
                                            <span> Bluetooth Headphones</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$279</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                            <div class="masonry__item col-md-4" data-masonry-filter="Creative">
                                <div class="product product--tile bg--secondary text-center">
                                    <a href="{{url('product')}}">
                                        <img alt="Image" src="frontend/img/product-small-6.png" />
                                    </a>
                                    <a class="block" href="{{url('product')}}">
                                        <div>
                                            <h5>Wacom Intuos Pen</h5>
                                            <span> Digital Stylus</span>
                                        </div>
                                        <div>
                                            <span class="h4 inline-block">$89</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
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
