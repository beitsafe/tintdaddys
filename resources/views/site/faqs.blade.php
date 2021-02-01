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
                        <li class="active">
                            <div class="accordion__title"> <span class="h5">Question 1</span> </div>
                            <div class="accordion__content">
                                <p class="lead"> Answer </p> <br>
                                <p class="lead"> Continued Here </p>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title"> <span class="h5">Question 2</span> </div>
                            <div class="accordion__content">
                                <p class="lead"> Answer </p> <br>
                                <p class="lead"> Continued Here </p>
                            </div>
                        </li>
                        <li>
                            <div class="accordion__title"> <span class="h5">Question 3</span> </div>
                            <div class="accordion__content">
                                <p class="lead"> Answer </p> <br>
                                <p class="lead"> Continued Here </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@stop
