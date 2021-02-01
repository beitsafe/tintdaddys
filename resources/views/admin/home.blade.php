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
                            <span class="h5">Jax Terra</span>
                            <span>Be IT Safe</span>
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
                            <h4>Profile</h4>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Real Name:</label>
                                        <input type="text" name="name" value="Lucas Banks" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Display Name:</label>
                                        <input type="text" name="display-name" value="l_banks" />
                                    </div>
                                    <div class="col-md-12">
                                        <label>Email Address:</label>
                                        <input type="email" name="email" value="l_banks@stack.net" />
                                    </div>
                                    <div class="col-md-12">
                                        <label>Location:</label>
                                        <input type="text" name="location" value="Melbourne" />
                                    </div>
                                    <div class="col-md-12">
                                        <label>Website:</label>
                                        <input type="text" name="website" value="http://mrare.co" />
                                    </div>
                                    <div class="col-md-12">
                                        <label>Bio:</label>
                                        <textarea rows="4" name="bio"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-checkbox input-checkbox--switch">
                                            <input type="checkbox" name="public-profile" />
                                            <label></label>
                                        </div>
                                        <span>Allow my profile to be viewable by guests</span>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <button type="submit" class="btn btn--primary type--uppercase">Save Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="account-billing" class="hidden account-tab">
                            <h4>Billing Details</h4>
                            <div class="boxed boxed--border bg--secondary">
                                <h5>Payment Methods</h5>
                                <hr>
                                <form>
                                    <ul>
                                        <li class="row">
                                            <div class="col-md-6">
                                                <p>
                                                    <span>Card ending in
                                                        <strong class="text-white">4722</strong>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-md-3 text-right text-left-xs">
                                                <button type="submit" class="btn bg--error">Remove</button>
                                            </div>
                                            <div class="col-md-3 text-right text-left-xs">
                                                <button type="submit" class="btn text-white">Edit</button>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <button type="submit" class="btn text-white">Add New Method</button>
                                </form>
                            </div>
                        </div>
                        <div id="account-orders" class="hidden account-tab">
                            <h4>Order Details</h4>
                            <div class="boxed boxed--border bg--secondary">
                                <h5>Coming Soon</h5>

                            </div>
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
