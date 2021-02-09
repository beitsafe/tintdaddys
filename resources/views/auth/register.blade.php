@extends('layouts.master')

@section('content')

    <section class="height-70 text-center bg--dark">
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-md-7 col-lg-5">
                    <h2>Register an account</h2>
                    <p class="lead"> Welcome, register a new account in the form below.
                        An admin will respond once the approve process is completed </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input  id="name"
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        autocomplete="name"
                                        autofocus
                                        placeholder="Username">
                            </div>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="col-md-12">
                                <input id="email"
                                       type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       placeholder="Email">
                            </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="col-md-12">
                                <input id="password"
                                       type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Password">
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="col-md-12">
                                <input id="password-confirm"
                                       type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Password confirm">
                            </div>

                            <div class="col-md-12">
                            @captcha
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn--primary type--uppercase"
                                        type="submit">Register</button>
                            </div>
                        </div>
                    </form>

                    <span class="type--fine-print block">Already have an account?
                        <a href="{{url('login')}}">Login</a></span>

                </div>
            </div>
        </div>
    </section>
@endsection
