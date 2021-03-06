<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dash</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/enquiries') }}">Enquiries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/faqs') }}">Faqs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/products') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/orders') }}">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/warranties') }}">Warranties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/installers') }}">Installers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/users') }}">Users</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="setupNavDD" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Setup
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.sizeshades.index') }}">Sizes & Shades</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
