@extends('layouts.master')

@section('content')

    <section class="text-center bg--primary">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8">
                    <h1>Simple Centered</h1>
                    <p class="lead"> Stack's visual style is simple yet distinct, making it an ideal starting point for your project whether it be a basic marketing site, or multi-page company presence. </p>
                </div>
            </div>
        </div>
    </section>
    <section class="switchable bg--dark switchable--switch">
        <div class="container">
            <div class="row justify-content-between">
                <div class="switchable__text col-md-12">
                    <ul class="accordion accordion-2 accordion--oneopen">
                        <li class="active">
                            <div class="accordion__title"> <span class="h5">Code Quality</span> </div>
                            <div class="accordion__content">
                                <p class="lead"> Stack follows the BEM naming convention that focusses on logical code readability that is reflected in both the HTML and CSS. Interactive elements such as accordions and tabs follow the same markup patterns making rapid development easier for developers and beginners alike. </p>
                                <p class="lead"> Add to this the thoughtfully presented documentation, featuring code highlighting, snippets, class customizer explanation and you've got yourself one powerful value package. </p>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title"> <span class="h5">Visual Design</span> </div>
                            <div class="accordion__content">
                                <p class="lead"> Stack offers a clean and contemporary to suit a range of purposes from corporate, tech startup, marketing site to digital storefront. Elements have been designed to showcase content in a diverse yet consistent manner. </p>
                                <p class="lead"> Multiple font and colour scheme options mean that dramatically altering the look of your site is just clicks away — Customizing your site in the included Variant Page Builder makes experimenting with styles and content arrangements dead simple. </p>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title"> <span class="h5">Stack Experience</span> </div>
                            <div class="accordion__content">
                                <p class="lead"> Medium Rare is an elite author known for offering high-quality, high-value products backed by timely and personable support. Recognised and awarded by Envato on multiple occasions for producing consistently outstanding products, it's no wonder over 20,000 customers enjoy using Medium Rare templates. </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@stop
