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
                            <span class="h5">{{@$client->name}}</span>
                            <span>{{@$client->businessName}}</span>
                            <span class="label">Approved</span>
                        </div>
                        <hr>
                        <div class="text-block">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-profile;hidden">Profile</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-orders;hidden">My Orders</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-warranty;hidden" class="warrenty-tab-link">Warranties</a>
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
                        <div id="account-orders" class="hidden account-tab">
                            @include('auth.dashboard.partials.orderTab')
                        </div>
                        <div id="account-warranty" class="hidden account-tab">
                            @include('auth.dashboard.partials.warrantyTab')
                        </div>
                        <div id="account-password" class="hidden account-tab">
                            <h2>Password</h2>
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
                            <h2>Delete Account</h2>
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
