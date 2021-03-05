<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.frontPartials.head')

    @yield('seo')

    @include('layouts.frontPartials.css')

</head>
<body data-smooth-scroll-offset="77">

@include('layouts.frontPartials.nav')

<div class="main-container">

    @yield('content')

    @include('layouts.frontPartials.footer')
</div>

@include('layouts.frontPartials.scripts')
@stack('scripts')
</body>

</html>
