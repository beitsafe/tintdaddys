@extends('layouts.master')

@section('content')

    <section class="bg--dark space--sm">
        <div class="container">
            <div class="row justify-content-center mt-0 mb--2">
                <h1>My Account Details</h1>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="boxed boxed--lg boxed--border">
                        <div class="text-block text-center">
                            <span>
                                <i class="icon icon-Checked-User icon--lg"></i>
                            </span>
                            <span class="h5">{{$client->name}}</span>
                            <span>{{$client->businessName}}</span>
                            <span class="label">Approved</span>
                        </div>
                        <hr>
                        <div class="text-block">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-profile;hidden">Profile</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-billing;hidden">Billing Details</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-orders;hidden">My Orders</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-warranty;hidden">Warranties</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-password;hidden">Password</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-delete;hidden">Delete Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="boxed boxed--lg boxed--border">
                        <div id="account-profile" class="account-tab">
                            @include('auth.dashboard.partials.profileTab')
                        </div>
                        <div id="account-billing" class="hidden account-tab">
                            <h4>Billing Details</h4>
                            <div class="boxed boxed--border bg--secondary">
                                <h5>Payment Methods</h5>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <ul class="list-group bg--dark">
                                            @foreach($paymentMethods as $paymentMethod)
                                                @php
                                                    $card = $paymentMethod->card;
                                                @endphp
                                                <li class="list-group-item bg--dark d-flex align-items-center border-0 p-0 mb-3">
                                                    <div class="input-radio mr-3">
                                                        {{--                                            <span class="input__label">Option 1</span>--}}
                                                        <input id="paymentMethod-{{ $loop->iteration }}" type="radio" name="paymentMethodId" value="{{ $paymentMethod->id }}"/>
                                                        <label for="paymentMethod-{{ $loop->iteration }}"></label>
                                                    </div>
                                                    <i class="fab fa-2x fa-cc-{{ $card->brand }} mr-3"></i>
                                                    <span class="h4 mb-0 mr-5">×××× ×××× ×××× {{ $card->last4 }}</span>
                                                    <span class="h5 mb-0">{{ str_pad($card->exp_month, 2, 0, STR_PAD_LEFT) }} / {{ $card->exp_year }}</span>
                                                    {{--                                         at Expires: --}}
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div id="card-element" style="height: 30px;"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="account-orders" class="hidden account-tab">
                            @include('auth.dashboard.partials.orderTab')
                        </div>
                        <div id="account-warranty" class="hidden account-tab">
                            @include('auth.dashboard.partials.warrantyTab')
                        </div>
                        <div id="account-password" class="hidden account-tab">
                            <h4>Password</h4>
                            <p>Passwords must be at least 6 characters in length.</p>
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <label>Old Password:</label>
                                        <input type="password" name="old-password" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>New Password:</label>
                                        <input type="password" name="new-password" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Retype New Password:</label>
                                        <input type="password" name="new-password-confirm" />
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <button type="submit" class="btn btn--primary type--uppercase">Save Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="account-delete" class="hidden account-tab">
                            <h4>Delete Account</h4>
                            <p>Permanently remove your account using the button below. Warning, this action is permanent.</p>
                            <form>
                                <button type="submit" class="btn bg--error type--uppercase">Delete Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

@endsection
