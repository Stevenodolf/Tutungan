<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tutungan</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logoWithoutText.ico')}}" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/script/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/script/proBar/proBar.js') }}"></script>
    <script src="{{ asset('js/src/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Content -->
    @yield('head')
</head>
    @yield('content')
</html>
