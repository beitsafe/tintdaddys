@extends('layouts.master')

@section('content')

    <section class="switchable bg--primary">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-7 col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14100.170159727706!2d153.3697204!3d-27.9313411!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee8d16860caa5cbc!2sTint%20Daddy&#39;s%20Gold%20Coast%2C%20Australia!5e0!3m2!1sen!2sau!4v1611894434986!5m2!1sen!2sau"
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
                        <h3>438 Rathdowne Road<br>Carlton, Victoria 3001</h3>
                        <p class="lead"> E: <a href="#">hello@stack.net</a><br> P: +613 4827 2294 </p>
                        <p class="lead"> Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. </p>
                        <p class="lead"> We are open from 9am — 5pm week days. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center bg--dark">
        <div class="container">
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
                        @captcha
                        <div class="col-md-5 col-lg-4">
                            <button type="submit" class="btn btn--primary type--uppercase">Send Enquiry</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
