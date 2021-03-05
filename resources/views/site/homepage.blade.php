@extends('layouts.master')

@section('content')

    <section class="cover cover-features imagebg space--lg" data-overlay="2">
        <div class="background-image-holder">
            <img alt="cover image" src="{{asset('frontend/images/fb-cover_1_opacity20.jpg')}}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-7">
                    <h1 class="type--bold"> Oz Window Films </h1>
                    <p class="lead font-weight-bold"> OZ Window Films is committed to supplying exceptional quality window film to our
                        industry professionals who are experienced and dedicated to their customers. </p>
                    <a class="btn btn--primary" href="{{url('/')}}"> <span class="btn__text">
                    View Products
                </span> </a>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-4 mh-85 d-none d-sm-block">
                    <div class="feature feature-2 boxed boxed--border bg--white">
                        <img class="mw-50 p-0" alt="Global logo" src="{{asset('frontend/branding/global_crop.jpg')}}">
                        <div class="feature__body">
                            <h4> Global Window Films </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mh-85 d-none d-sm-block">
                    <div class="feature feature-2 boxed boxed--border bg--white">
                        <img class="mw-33" alt="Oz Windowfilms logo" src="{{asset('frontend/branding/oz-window-logo.png')}}">
                        <div class="feature__body">
                            <h4> OZ Window Films </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mh-85 d-none d-sm-block">
                    <div class="feature feature-2 boxed boxed--border bg--white">
                        <img class="mw-50" alt="luxe logo" src="{{asset('frontend/branding/LuxeLogo_0819_200x98.png')}}">
                        <div class="feature__body">
                            <h4> Luxe Lightwrap </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center bg--primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="text-block"> <i class="icon icon--lg icon-Mail-3 color--dark"></i>
                        <h4>Lorem Ipsum</h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-block"> <i class="icon icon--lg icon-Air-Balloon color--dark"></i>
                        <h4>Lorem Ipsum</h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-block"> <i class="icon icon--lg icon-Bacteria color--dark"></i>
                        <h4>Lorem Ipsum</h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-block"> <i class="icon icon--lg icon-Fingerprint-2 color--dark"></i>
                        <h4>Lorem Ipsum</h4>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="switchable feature-large bg--dark">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-lg-5">
                    <div class="switchable__text">
                        <h2>Lorum Ipsum</h2>
                        <p class="lead"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </P>
                        <P>Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxed boxed--lg boxed--border">
                        <div class="feature feature-2"> <i class="icon icon-Clock-Back color--primary"></i>
                            <div class="feature__body">
                                <h5>Lorum Ipsum</h5>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                            </div>
                        </div>
                        <div class="feature feature-2"> <i class="icon icon-Duplicate-Window color--primary"></i>
                            <div class="feature__body">
                                <h5>Lorum Ipsum</h5>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                            </div>
                        </div>
                        <div class="feature feature-2"> <i class="icon icon-Life-Jacket color--primary"></i>
                            <div class="feature__body">
                                <h5>Lorum Ipsum</h5>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                            </div>
                        </div>
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
            <div class="row">
                <div class="col-md-10 col-lg-8">
                    <div class="text-center">
                        <h2>Subscribe to our newsletter</h2>
                    </div>
                    <form class="row">
                        <div class="col-md-8"> <input type="email" name="email" placeholder="Email Address"> </div>
                        <div class="col-md-4"> <button type="submit" class="btn btn--primary type--uppercase">Subscribe</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
