<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sweetalerts.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/modal.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('icons-1.8.1/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('pro/css/all.css')}}">
</head>
<body>
    <div>
        @include('inc.messages')
        @if(Auth::user())
            @include('sidebar.sidebar')
                <div class="home-section">
                    @include('navbar.navbar')
                    <section class="section-1">
                        @yield('content')
                        @yield('section-1')
                    </section>
                    <section class="section-2">
                        @yield('section-2')
                    </section>
                </div>
        @else
        <div class="home-section" style="left: 0; width: 100%">
            @include('navbar.navbar')
            <section class="section-1">
                @yield('content')
                @yield('section-1')
            </section>
            <section class="section-2">
                @yield('section-2')
            </section>
            <section class="section-3">
                @yield('section-3')
            </section>
        </div>
        @endif
    </div>
@yield('extra-js')
</body>
</html>
