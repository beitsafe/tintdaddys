@extends('layouts.master')

@section('content')

    <section class="text-center bg--dark">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8">
                    <h1>Simple Centered</h1>
                    <p class="lead"> Stack's visual style is simple yet distinct, making it an ideal starting point for
                        your project whether it be a basic marketing site, or multi-page company presence. </p>
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
                            <li class="col-md-3 col-6"> <img alt="Image" class="image--xxs" src="img/partner-1.png"> </li>
                            <li class="col-md-3 col-6"> <img alt="Image" class="image--xxs" src="img/partner-2.png"> </li>
                            <li class="col-md-3 col-6"> <img alt="Image" class="image--xxs" src="img/partner-3.png"> </li>
                            <li class="col-md-3 col-6"> <img alt="Image" class="image--xxs" src="img/partner-4.png"> </li>
                            <li class="col-md-3 col-6"> <img alt="Image" class="image--xxs" src="img/partner-5.png"> </li>
                            <li class="col-md-3 col-6"> <img alt="Image" class="image--xxs" src="img/partner-6.png"> </li>
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
                    <h4>Meet Stack HTML Template</h4>
                    <p class="lead"> Stack is a robust, multipurpose template built with reuse and modularity at the core. Blending contemporary styling with beautiful markup, Stack forms the ideal starting point to website projects of any kind. </p>
                    <p> Stack ships with over 140 content layouts, including 30 tailored niche homepages (from startup landing page to restaurant, portfolio and more) showcasing just a glimpse of what is possible with the detailed block and element library — from working social media feeds, contact forms and subscription blocks to fullscreen lightbox galleries and filterable portfolios, Stack is infinitely reusable, the ideal go-to template for your client projects. </p>
                    <p> Each of Stack’s 240+ interface blocks are powered by the vast collection of customisable elements. This modular system empowers developers to create their own blocks quickly and easily leaving more time for layout and interface experimentation. </p>
                </div>
                <div class="col-md-6">
                    <div class="boxed boxed--lg boxed--border bg--secondary"> <img alt="image" src="img/cowork-6.jpg" class="border--round">
                        <h5>Save Development Time</h5>
                        <p> Drastically reduce the time it takes to move from initial concept to production-ready with Stack and Variant Page Builder. Your clients will love you for it! </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="imagebg parallax" data-overlay="4">
        <div class="background-image-holder"> <img alt="background" src="{{asset('frontend/images/window-tinting.jpg')}}"> </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cta cta-1 cta--horizontal boxed boxed--border text-center-xs">
                        <div class="row justify-content-center p-5">
                            <div class="col-lg-3">
                                <h4>Let's get you started</h4>
                            </div>
                            <div class="col-lg-4">
                                <p class="lead"> Start building pages in your browser </p>
                            </div>
                            <div class="col-lg-4 text-center">
                                <a class="btn btn--primary type--uppercase" href="#"> <span class="btn__text">
                                    Try Builder
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
                <div class="col">
                    <div class="slider" data-paging="true">
                        <ul class="slides">
                            <li class="col-md-6 col-12">
                                <div class="project-thumb">
                                    <a href="#"> <img alt="Image" class="border--round" src="img/work-6.jpg"> </a>
                                    <h4>Nike Active</h4> <span>Print Marketing</span> </div>
                            </li>
                            <li class="col-md-6 col-12">
                                <div class="project-thumb">
                                    <a href="#"> <img alt="Image" class="border--round" src="img/work-2.jpg"> </a>
                                    <h4>Get Lost in Thailand</h4> <span>Print Marketing</span> </div>
                            </li>
                            <li class="col-md-6 col-12">
                                <div class="project-thumb">
                                    <a href="#"> <img alt="Image" class="border--round" src="img/work-3.jpg"> </a>
                                    <h4>M&amp;D Stairs Company</h4> <span>Branding &amp; Identity</span> </div>
                            </li>
                            <li class="col-md-6 col-12">
                                <div class="project-thumb">
                                    <a href="#"> <img alt="Image" class="border--round" src="img/work-4.jpg"> </a>
                                    <h4>Blossom Naturals</h4> <span>Branding &amp; Identity</span> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
