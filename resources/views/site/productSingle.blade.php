@extends('layouts.master')

@section('content')

    <section class="space--lg bg--dark">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-7 col-lg-6">
                    <div class="slider border--round boxed--border" data-paging="true" data-arrows="true">
                        <ul class="slides">
                            <li> <img alt="Image" src="{{asset('frontend/images/auto+window+tinting-4f884dff-640w.jpg')}}"> </li>
                            <li> <img alt="Image" src="{{asset('frontend/images/male-worker-applying-car-tinting-film-PAXFS2Z.jpg')}}"> </li>
                            <li> <img alt="Image" src="{{asset('frontend/images/window-tinting.jpg')}}"> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <h2>Tivoli Model One</h2>
                    <div class="text-block"> <span class="h4 type--strikethrough inline-block">$549.99</span> <span class="h4 inline-block">$479</span> </div>
                    <p> Tivoli's most popular line of consumer digital radios just got a refresh — expect clearer highs and deeper lows. Massive style upgrade with high-calibre aluminum frame and plush knobs and dials. </p>
                    <ul class="accordion accordion-2 accordion--oneopen">
                        <li>
                            <div class="accordion__title"> <span class="h5">Specifications</span> </div>
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
                            <div class="accordion__title"> <span class="h5">Dimensions</span> </div>
                            <div class="accordion__content">
                                <ul>
                                    <li><span>Product: 3.5”W X 3.0”H X 3.0”D</span></li>
                                    <li><span>Packaging: 7”W X 6”H X 5”D </span></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title"> <span class="h5">Shipping Info</span> </div>
                            <div class="accordion__content">
                                <p> Generally ships between 2 - 4 working days from order confirmation. Orders only confirmed once payment has successfully processed. NOTE: When using services such as Skrill, payments can take longer to process (approx. 4 days). </p>
                            </div>
                        </li>
                    </ul>
                    <form>
                        <div class="col-md-12">
                            <div class="input-select"> <select name="finish">
                                    <option selected="selected" value="Default">Select A Finish</option>
                                    <option value="Small">Wood Grain</option>
                                    <option value="Medium">Brushed Aluminium</option>
                                    <option value="Larger">Gunmetal Grey</option>
                                </select> </div>
                        </div>
                        <div class="col-md-6 col-lg-4"> <input type="text" name="quantity" placeholder="QTY"> </div>
                        <div class="col-md-6 col-lg-8"> <button type="submit" class="btn btn--primary">Add To Cart</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
