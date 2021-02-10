<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.backPartials.head')
    @stack('styles')
</head>

<body>
    <div id="app">
        @include('layouts.backPartials.nav')

        <main class="container py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.backPartials.scripts')
    @stack('scripts')
</body>
</html>
