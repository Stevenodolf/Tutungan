<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tutungan</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/filepond/filepond.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/filepond/filepond-plugin-image-preview.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script/jquery/jquery.js')}}"></script>
    <script src="{{ asset('js/src/main.js') }}"></script>
    <!-- Swiper	-->
    <script src="{{ asset('js/script/swiper/swiper-bundle.min.js') }}"></script>
    <!-- Probar	-->
    <script src="{{ asset('js/script/proBar/proBar.js') }}"></script>
    <!-- Quill	-->
    <script src="{{ asset('js/script/quill/quill.js') }}"></script>
    <script src="{{ asset('js/script/quill/image-resize.min.js') }}"></script>
    <script src="{{ asset('js/script/quill/image-drop.min.js') }}"></script>
    <!-- Filepond	-->
    <script src="{{ asset('js/script/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('js/script/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('js/script/filepond/filepond-plugin-file-validate-size.js') }}"></script>
    <script src="{{ asset('js/script/filepond/filepond-plugin-file-encode.js') }}"></script>
    <script src="{{ asset('js/script/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('js/script/filepond/filepond-plugin-file-validate-type.min.js') }}"></script>
    <!-- Content -->
    @yield('head')






</head>
<body>
<div id="app">
    <div style="margin: 0 120px;">
        <div class="navbar">
            <div class="logo" onclick="window.location='{{ url("/")}}'">
                <img src="{{asset('images/tutunganLogo.png')}}">
            </div>
            <div class="locationSection">
                <img src="{{asset('images/location.png')}}">
                <div class="locationText">
                    <p>Dikirim ke</p>
                    <p>Indonesia</p>
                </div>
            </div>
            <form class="searchbar">
                <input type="text" placeholder="Search here...">
                <button><img src="{{asset('images/search.png')}}"></button>
            </form>
            <div class="dropdownKeranjang">
                <button class="buttonWithImage" onclick="window.location='{{ url("/cart")}}'"><img src="{{asset('images/shopping-cart.png')}}"></button>
                <div class="dropdownList">
                    <div class="title">
                        <p class="contentSemiNormal">Keranjang Anda</p>
                        <button>
                            <p class="contentSemiNormal">Lihat Semua</p>
                        </button>
                    </div>
                    <div class="content">
                        <div class="sectionPicture">
                            <img src="{{asset('images/dummyProduct.jpeg')}}">
                            <div class="sectionText">
                                <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgic...</p>
                                <p class="contentSmall">5 pcs</p>
                            </div>
                        </div>
                        <div class="section">
                            <p class="contentSemiNormal">Rp50.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdownNotifikasi">
                <button class="buttonWithImage"><img src="{{asset('images/bell.png')}}"></button>
                <div class="dropdownList">
                    <div class="title">
                        <p class="contentSemiNormal">Notifikasi</p>
                        <button>
                            <p class="contentSemiNormal">Lihat Semua</p>
                        </button>
                    </div>
                    <div class="content">
                        <img src="{{asset('images/dummyProduct.jpeg')}}">
                        <div class="sectionText">
                            <p class="contentSemiNormal" style="font-weight: bolder;margin-bottom: 5px;">Transaksi Dibatalkan</p>
                            <p class="contentSemiNormal">Transaksi anda telah dibatalkan, ketuk untuk lihat lebih lanjut.</p>
                        </div>
                    </div>
                    <div class="content">
                        <img src="{{asset('images/dummyProduct.jpeg')}}">
                        <div class="sectionText">
                            <p class="contentSemiNormal" style="font-weight: bolder;margin-bottom: 5px;">Pesanan sudah sampai tujuan!</p>
                            <p class="contentSemiNormal">Terima kasih sudah menggunakan layanan Tutungan!</p>
                        </div>
                    </div>
                </div>
            </div>

            @guest
                <div class="buttonLoginRegister">
                    <button class="buttonLogin" id="buttonLogin">Masuk</button>
                    <button class="buttonRegister">Daftar</button>
                </div>
            @else
                <button class="buttonAddWish">
                    <img src="{{asset('images/plusBlack.png')}}">
                    Wish
                </button>
                <div class="dropdownProfil">
                    <button class="buttonUser">
                        <img src="{{asset('images/dummyUser.png')}}">
                        <p class="contentNormal">Steven Yuwono</p>
                        <img id="arrowUser" src="{{asset('images/arrowDownBlack.png')}}">
                    </button>
                    <div class="dropdownList">
                        <button>
                            <p class="contentSemiNormal">Akun Saya</p>
                        </button>
                        <button>
                            <p class="contentSemiNormal">Wish Saya</p>
                        </button>
                        <button>
                            <p class="contentSemiNormal">Transaksi Saya</p>
                        </button>
                        <button>
                            <p class="contentSemiNormal">Logout</p>
                        </button>
                    </div>
                </div>
            @endguest

        </div>
    </div>
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Tutungan') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
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
    </nav> --}}

    <main>
        @yield('content')
    </main>
</div>
</body>
</html>

<div class="blackContainer" id="blackContainer">
    <div class="loginPopUp">
        <div class="title">
            <h1>Masuk</h1>
            <button id="closeLogin">
                <img src="{{asset('images/close.png')}}"/>
            </button>
        </div>
        <form class="loginSection">
            <div class="field">
                <p class="">Email</p>
                <input name="email" type="text" id="email" placeholder="ex:youremail@tutungan.com" required>
            </div>
            <div class="field">
                <p class="">Password</p>
                <input name="password" type="password" id="password" required>
                <div class="lupaPass">
                    <button>
                        <p class="">Lupa password?</p>
                    </button>
                </div>
            </div>
            <button class="buttonMasuk" type="submit" action="{{ url('/home')}}">
                <p class="">Masuk</p>
            </button>
        </form>
        <div class="daftarSection">
            <p class="">Baru di Tutungan?</p>
            <button>
                <p class="">Daftar</p>
            </button>
        </div>
    </div>
</div>
