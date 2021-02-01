@extends('layouts.master')

@section('content')

    <section class="cover cover-features imagebg space--lg" data-overlay="2">
        <div class="background-image-holder"> <img alt="background" src="img/landing-23.jpg"> </div>
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

@stop
