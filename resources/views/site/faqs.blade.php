@extends('layouts.master')

@section('content')

    <section class="text-center bg--primary">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8">
                    <h1>Frequently Asked Questions</h1>
                    <p class="lead">If you question is not answered below,
                        <a href="{{url('contact')}}">click here</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="switchable bg--dark switchable--switch">
        <div class="container">
            <div class="row justify-content-between">
                <div class="switchable__text col-md-12">
                    <ul class="accordion accordion-2 accordion--oneopen">
                        @foreach($faqs as $faq)
                            <li class="">
                                <div class="accordion__title">
                                    <span class="h5">{{$faq->question}}</span>
                                </div>
                                <div class="accordion__content">
                                    <p> {!! $faq->answer !!} </p> <br>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

@stop
