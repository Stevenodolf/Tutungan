<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tutungan</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{secure_asset('images/logoWithoutText.ico')}}" />
    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}"></script>
    <script src="{{ secure_asset('js/script/jquery/jquery.js') }}"></script>
    <script src="{{ secure_asset('js/script/swiper/swiper-bundle.min.js') }}"></script>
{{--    <script src="{{ secure_asset('js/script/proBar/proBar.js') }}"></script>--}}
    <script src="{{ secure_asset('js/src/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('font/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('js/script/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Content -->
    @yield('head')
</head>
<body>
<div id="app">
    <div style="margin: 0 120px;">
        <div class="navbar">
            <div class="logo" onclick="window.location='{{ secure_url('/') }}'">
                <img src="{{secure_asset('images/tutunganLogo.png')}}">
            </div>
        </div>
    </div>

    <main style="min-height: 100vh;">
        @yield('content')
    </main>

    <div style="margin: 25px 120px;">
        <div class="footer2">
            <img src="{{secure_asset('images/footer2Left.png')}}">
            <img src="{{secure_asset('images/footer2Right.png')}}">
        </div>
    </div>
</div>
</body>
</html>
