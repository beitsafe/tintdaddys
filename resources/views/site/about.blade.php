@extends('layouts.master')

@section('seo')
    @include('site.seo.about')
@stop

@section('content')

    <section class="text-center bg--dark">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1>About US</h1>
                    <p class="lead">OZ Window Films is committed to supplying exceptional quality window film to our
                        industry professionals who are experienced and dedicated to their customers.  Our vast
                        experience in the industry, allows us to share our knowledge of the products and technical
                        techniques to our installers, allowing us to provide the service and support you need to grow
                        your business.</p>
                    <p>
                        OZ Window Films provides competitively priced  tools and superior window films, backed by our
                        dedicated sales team and technical support available to all our professional dealers.
                        Global Window Films have a world wide reputation for producing the most reliable, high quality
                        window film available.  Backed by a strong, manufacturer's lifetime warranty, you can rest
                        assured you have made the right choice.</p>
                    <p>
                        OZ Window Films is the factory direct, Authorized Distributor for Global Window Films.  We also
                        proudly supply Australia and New Zealand with many products exclusively available only through us. </p>
                    <img alt="background" src="{{asset('frontend/images/0fde740f4dfdb4b8027c429803509314.jpg')}}">
                </div>
            </div>
        </div>
    </section>
    <section class="bg--primary">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slider slider--inline-arrows slider--arrows-hover text-center" data-arrows="true">
                        <ul class="slides">
                            <li class="col-12 col-sm-4">
                                <div class="col mh-85">
                                    <div class="feature feature-2 boxed boxed--border bg--white">
                                        <img class="mw-50 p-0" alt="logo" src="{{asset('frontend/branding/global_crop.jpg')}}">
                                        <div class="feature__body">
                                            <h4> Global Window Films </h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-12 col-sm-4">
                                <div class="col mh-85 d-none d-sm-block">
                                    <div class="feature feature-2 boxed boxed--border bg--white">
                                        <img class="mw-50" alt="logo" src="{{asset('frontend/branding/ixrtreme_1.png')}}">
                                        <div class="feature__body">
                                            <h4> OZ Window Films </h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-12 col-sm-4">
                                <div class="col mh-85 d-none d-sm-block">
                                    <div class="feature feature-2 boxed boxed--border bg--white">
                                        <img class="mw-50" alt="luxe logo" src="{{asset('frontend/branding/LuxeLogo_0819_200x98.png')}}">
                                        <div class="feature__body">
                                            <h4> Luxe Lightwrap </h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-12 col-sm-4">
                                <div class="col mh-85">
                                    <div class="feature feature-2 boxed boxed--border bg--white">
                                        <img class="mw-50 p-0" alt="logo" src="{{asset('frontend/branding/global_crop.jpg')}}">
                                        <div class="feature__body">
                                            <h4> Global Window Films </h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-12 col-sm-4">
                                <div class="col mh-85 d-none d-sm-block">
                                    <div class="feature feature-2 boxed boxed--border bg--white">
                                        <img class="mw-50" alt="logo" src="{{asset('frontend/branding/ixrtreme_1.png')}}">
                                        <div class="feature__body">
                                            <h4> OZ Window Films </h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-12 col-sm-4">
                                <div class="col mh-85 d-none d-sm-block">
                                    <div class="feature feature-2 boxed boxed--border bg--white">
                                        <img class="mw-50" alt="luxe logo" src="{{asset('frontend/branding/LuxeLogo_0819_200x98.png')}}">
                                        <div class="feature__body">
                                            <h4> Luxe Lightwrap </h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg--dark">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <h4>Oz Window Films</h4>
                    <p class="lead">OZ Window Films is committed to supplying exceptional quality window film to our
                        industry professionals who are experienced and dedicated to their customers.  Our vast
                        experience in the industry, allows us to share our knowledge of the products and technical
                        techniques to our installers, allowing us to provide the service and support you need to grow
                        your business.</p>
                    <p>
                        OZ Window Films provides competitively priced  tools and superior window films, backed by our
                        dedicated sales team and technical support available to all our professional dealers.
                        Global Window Films have a world wide reputation for producing the most reliable, high quality
                        window film available.  Backed by a strong, manufacturer's lifetime warranty, you can rest
                        assured you have made the right choice.</p>
                    <p>
                        OZ Window Films is the factory direct, Authorized Distributor for Global Window Films.  We also
                        proudly supply Australia and New Zealand with many products exclusively available only through us. </p>
                </div>
                <div class="col-md-5 ml-md-3">
                    <div class="boxed boxed--lg boxed--border bg--secondary">
                        <img alt="image" src="{{asset('frontend/branding/global_crop.jpg')}}" class="border--round">
                        <h5>Authorised Distributer</h5>
                        <p>Australias only</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="imagebg parallax" data-overlay="4">
        <div class="background-image-holder">
            <img alt="background" src="{{asset('frontend/images/car-2797169_1280.jpg')}}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cta cta-1 cta--horizontal boxed boxed--border text-center-xs">
                        <div class="row justify-content-center p-5">
                            <div class="col-lg-3">
                                <h4>Let's get you started</h4>
                            </div>
                            <div class="col-lg-4">
                                <p class="lead"> Apply for your account here. </p>
                            </div>
                            <div class="col-lg-4 text-center">
                                <a class="btn btn--primary type--uppercase" href="{{url('register')}}"> <span class="btn__text">
                                Account Application
                            </span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center bg--dark">
        <div class="container">
            <div class="row justify-content-center">
                <h2>Our Installers</h2>
                <div class="col-md-12 col-12 mb-5">
                    <div class="map-container border--round"
                         data-zoom-controls="BOTTOM_RIGHT"
                         data-maps-api-key="AIzaSyBUFJONPML4woNBEInCsiHqhGkZ4rozUaA"
                         data-address="[
                         Australia [nomarker];
                         123 Rathdowne street, Carlton Victoria;
                         71/28 Fortune St, Coomera Qld, 4209]"
                         data-marker-title="Installer"
                         data-map-zoom="4"
                         data-map-style="@include('layouts.frontPartials.mapStyle')"></div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

@stop
