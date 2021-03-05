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
                                                        <h6 class="type--uppercase">Global Film</h6>
                                                        <ul class="list--hover">
                                                            <li><a href="{{url('product/quick-dry-plus')}}">Quick Dry Plus</a></li>
                                                            <li><a href="{{url('product/hp-charcoal-premium')}}">HP Charcoal Premium</a></li>
                                                            <li><a href="{{url('product/qdp-ceramic-charcoal')}}">QDP Ceramic Charcoal</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <h6 class="type--uppercase">Oz Window Films</h6>
                                                        <ul class="list--hover">
                                                            <li><a href="{{url('product/cs-xtreme')}}">Cs Xtreme</a></li>
                                                            <li><a href="{{url('product/hp-xtreme')}}">Hp Xtreme</a></li>
                                                            <li><a href="{{url('product/ir-xtreme')}}">Ir Xtreme</a></li>
                                                            <li><a href="{{url('product/cc-xtreme')}}">Cc Xtreme</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <h6 class="type--uppercase">Luxe Lightwrap</h6>
                                                        <ul class="list--hover">
                                                            <li><a href="{{url('product/luxe-lightwrap')}}">Luxe Lightwrap</a></li>
                                                            <li><a href="{{url('product/luxe-fx-series-honeycomb-1m-length')}}">Lux Fx Honeycomb</a></li>
                                                            <li><a href="{{url('product/luxe-fx-series-carbon-fiber-1m-length')}}">Lux Fx Carbon Fibre</a></li>
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
                                @auth
                                    <li>
                                        <a href="{{ route('cart.index')}}">
                                            Cart
                                            <span class="badge badge-pill badge-primary">
                                                <i class="cartcount"></i> -
                                                <i class="cart-total"></i>
                                            </span>
                                        </a>
                                    </li>
                                @endauth
                                @role('admin')
                                <li>
                                    <a class="btn btn-outline-light" href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i>C.M.S.</a>
                                </li>
                                @endrole
                            </ul>
                        </div>

                        <div class="bar__module">
                            @guest
                                @if (Route::has('login'))
                                    <a class="btn btn--sm btn--primary" href="{{url('login')}}">
                                        <span class="btn__text">Account Login</span>
                                    </a>
                                @endif
                            @else
                                <li class="dropdown list-no-bullets">
                                    <span class="dropdown__trigger btn btn--sm btn--primary text-white">
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
