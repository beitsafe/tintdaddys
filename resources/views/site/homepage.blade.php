@extends('layouts.master')

@section('content')

    <section class="cover cover-features imagebg space--lg parallax" data-overlay="2">
        <div class="background-image-holder">
            <img alt="background" src="{{asset('frontend/images/What-You-Need-to-Know-About-Same-Day-Window-Tinting-Instant-Windscreens-1024x682.jpg')}}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-7">
                    <h1> Build stylish, lean sites with Stack </h1>
                    <p class="lead"> Stack offers a clean and contemporary look to suit a range of purposes from corporate, tech startup, marketing site to digital storefront. </p>
                    <a class="btn btn--primary type--uppercase" href="#"> <span class="btn__text">
                    View The Demos
                </span> </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature feature-2 boxed boxed--border bg--white"> <i class="icon icon-Clock-Back color--primary"></i>
                        <div class="feature__body">
                            <p> Save time with a multitude of styled components designed to showcase your content </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature feature-2 boxed boxed--border bg--white"> <i class="icon icon-Duplicate-Window color--primary"></i>
                        <div class="feature__body">
                            <p> Construct mockups or production-ready pages in-browser with Variant Page Builder </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature feature-2 boxed boxed--border bg--white"> <i class="icon icon-Life-Jacket color--primary"></i>
                        <div class="feature__body">
                            <p> Take comfort in 6 months included support with a dedicated support forum </p>
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
                        <h4>Mailer Integrations</h4>
                        <p> for marketing campaigns </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-block"> <i class="icon icon--lg icon-Air-Balloon color--dark"></i>
                        <h4>Diverse Icons</h4>
                        <p> from a library over over 1,000 </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-block"> <i class="icon icon--lg icon-Bacteria color--dark"></i>
                        <h4>Modular Design</h4>
                        <p> for maximum flexibility </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="text-block"> <i class="icon icon--lg icon-Fingerprint-2 color--dark"></i>
                        <h4>Modular Design</h4>
                        <p> for maximum flexibility </p>
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
                        <h2>Perfect for bootstrapped startups</h2>
                        <p class="lead"> Launching an attractive and scalable website quickly and affordably is important for modern startups — Stack offers massive value without looking 'bargain-bin'. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="boxed boxed--lg boxed--border">
                        <div class="feature feature-2"> <i class="icon icon-Clock-Back color--primary"></i>
                            <div class="feature__body">
                                <h5>Design Faster</h5>
                                <p> Save time with a multitude of styled components designed to showcase your content </p>
                            </div>
                        </div>
                        <div class="feature feature-2"> <i class="icon icon-Duplicate-Window color--primary"></i>
                            <div class="feature__body">
                                <h5>Rapid Development</h5>
                                <p> Construct mockups or production-ready pages in-browser with Variant Page Builder </p>
                            </div>
                        </div>
                        <div class="feature feature-2"> <i class="icon icon-Life-Jacket color--primary"></i>
                            <div class="feature__body">
                                <h5>Elite Support</h5>
                                <p> Take comfort in 6 months included support with a dedicated support forum </p>
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
                <div class="col-md-10 col-lg-8">
                    <div class="text-center">
                        <h2>Subscribe to our newsletter</h2>
                    </div>
                    <form class="row">
                        <div class="col-md-8"> <input type="email" name="email" placeholder="Email Address"> </div>
                        <div class="col-md-4"> <button type="submit" class="btn btn--primary type--uppercase">Get Started</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
