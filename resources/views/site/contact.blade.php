@extends('layouts.master')

@section('content')

    <section class="text-center bg--dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact</h1>
                    <hr>
                </div>
            </div>
            <div class="row justify-content-center">
                <h2>Contact us directly</h2>
            </div>
            <div class="row justify-content-center no-gutters">
                <div class="col-md-8 col-lg-7">
                    <form class="text-left form-email row mx-0"
                          data-success="Thanks for your enquiry, we'll be in touch shortly."
                          data-error="Please fill in all fields correctly."
                          method="POST"
                          action="{{url('send-contact')}}">
                        @csrf
                        <div class="col-md-6">
                            <label>Your Name:</label>
                            <input type="text" name="name" class="validate-required">
                        </div>
                        <div class="col-md-6">
                            <label>Email Address:</label>
                            <input type="email" name="email" class="validate-required validate-email">
                        </div>
                        <div class="col-md-12">
                            <label>Message:</label>
                            <textarea rows="6" name="message" class="validate-required"></textarea>
                        </div>
                        <div class="col-md-6 col-xs-12 mt--1">
                            @captcha
                        </div>
                        <div class="col-md-6 col-xs-12 pull-right mt--1">
                            <button type="submit" class="btn btn--primary type--uppercase">Send Enquiry</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="switchable bg--primary">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-7 col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14100.1506931564!2d153.3698411!3d-27.9314903!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x41992fa5d99c6726!2sOz%20Window%20Films%20%E2%80%8B!5e0!3m2!1sen!2sau!4v1612169032340!5m2!1sen!2sau"
                            width="600"
                            height="450"
                            frameborder="0"
                            style="border:0;"
                            allowfullscreen=""
                            aria-hidden="false"
                            tabindex="0"></iframe>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="switchable__text">
                        <h3>3/9 Technology Dr<br> Arundel QLD 4214</h3>
                        <p class="lead"> E: <a href="#">admin@ozwindowfilm.com.au</a><br> P: (07) 5574 6000 </p>
                        <p class="lead"> Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. </p>
                        <p class="lead"> We are open from 9am — 5pm week days. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
