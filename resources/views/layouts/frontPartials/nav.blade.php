<div class="nav-container">
    <div class="via-1611891954310" via="via-1611891954310" vio="tintdaddys">
        <div class="bar bar--sm visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-3 col-md-2">
                        <a href="{{url('/')}}">
                            <img class="logo logo-dark" alt="logo" src="{{asset('frontend/branding/oz-window-logo.png')}}">
                            <img class="logo logo-light" alt="logo" src="{{asset('frontend/branding/oz-window-logo.png')}}"> </a>
                    </div>
                    <div class="col-9 col-md-10 text-right">
                        <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs hidden-sm"> <i class="icon icon--sm stack-interface stack-menu"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <nav id="menu1" class="bar bar-1 hidden-xs bg--dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-2 hidden-xs">
                        <div class="bar__module">
                            <a href="{{url('/')}}">
                                <img class=" logo-light" alt="logo" src="{{asset('frontend/branding/oz-window-logo.png')}}"></a>
                        </div>
                    </div>
                    <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                        <div class="bar__module">
                            <ul class="menu-horizontal text-left">
                                <li>
                                    <a href="/">
                                        Home
                                    </a>
                                </li>
                                <li class="dropdown"> <span class="dropdown__trigger">
                                        Products
                                    </span>
                                    <div class="dropdown__container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="dropdown__content row w-100">
                                                    <div class="col-lg-3">
                                                        <h5 class="xs-menu-text">Brand 1</h5>
                                                        <ul class="menu-vertical">
                                                            <li> <a class="xs-menu-text" href="{{url('product')}}">Product 1</a> </li>
                                                            <li> <a class="xs-menu-text" href="{{url('product')}}">Product 2</a> </li>
                                                            <li> <a class="xs-menu-text" href="{{url('product')}}">Product 3</a> </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <h5 class="xs-menu-text">Brand 2</h5>
                                                        <ul class="menu-vertical">
                                                            <li> <a class="xs-menu-text" href="{{url('product')}}">Product 1</a> </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <h5 class="xs-menu-text">Brand 3</h5>
                                                        <ul class="menu-vertical">
                                                            <li> <a class="xs-menu-text" href="{{url('product')}}">Product 1</a> </li>
                                                            <li> <a class="xs-menu-text" href="{{url('product')}}">Product 2</a> </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <ul class="menu-vertical">
                                                            <li> <a class="btn btn--sm btn--outline type--uppercase" href="{{url('products')}}">All Products</a> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="about">
                                        About
                                    </a>
                                </li>
                                <li>
                                    <a href="faqs">
                                        Faqs
                                    </a>
                                </li>
                                <li>
                                    <a href="contact">
                                        Contact
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="bar__module">
                            @guest
                                @if (Route::has('login'))
                                    <a class="btn btn--sm btn--primary type--uppercase" href="{{url('login')}}">
                                        <span class="btn__text">Account Login</span>
                                    </a>
                                @endif
                            @else
                                <li class="dropdown list-no-bullets">
                                    <span class="dropdown__trigger btn btn--sm btn--primary text-white type--uppercase">
                                        {{ Auth::user()->name }}
                                        <i class="icon icon-Arrow-Down text-white"></i>
                                    </span>
                                    <div class="dropdown__container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="dropdown__content col-lg-2">
                                                    <ul class="menu-vertical">
                                                        <li>
                                                            <a href="{{asset('dashboard')}}">Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{asset('cart')}}">Cart</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
