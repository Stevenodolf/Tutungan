<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">



    <title>Tutungan</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logoWithoutText.ico')}}" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/filepond/filepond.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/filepond/filepond-plugin-image-preview.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/script/flip/flip.min.css' ) }}" rel="stylesheet">

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
    <!-- Flip	-->
    <script src="{{ asset('js/script/flip/flip.min.js') }}"></script>
    <!-- Moment	-->
    <script src="{{ asset('js/script/moment/moment-with-locales.min.js') }}"></script>
    <!-- Content -->
    @yield('head')

</head>
<body>
<div id="app">
    <div style="margin: 0 8%">
        <div class="navbar">
            <div class="logo" onclick="window.location='{{ url("/")}}'">
                <img src="{{asset('images/tutunganLogo.png')}}">
            </div>
            @guest
                <div class="locationSection" onclick="openLoginPopup();">
                    <img src="{{asset('images/location.png')}}">
                    <div class="contentSemiNormal locationText">
                        <p>Dikirim ke</p>
                        <p>Indonesia</p>
                    </div>
                </div>
            @else
                @php
                    $name = $addressNavbar->fullname;
                    $name = explode(' ', $name);

                    $firstName = $name[0];
                    $lastName = (isset($name[count($name)-1])) ? $name[count($name)-1] : '';
                @endphp
                <a href="{{url('/akunSaya/alamatpengiriman')}}" class="locationSection">
                    <img src="{{asset('images/location.png')}}">
                    <div class="contentSemiNormal locationText">
                        <p style="color: grey">Dikirim ke</p>
                        <p>{{$firstName}} {{$lastName}}</p>
                    </div>
                </a>
            @endguest
            <form method="GET" class="searchbar" action="/search">
                <input type="text" name="search" value="{{old('search')}}" placeholder="Search here...">
                <button type="submit"><img src="{{asset('images/search.png')}}"></button>
            </form>
{{--            <div class="dropdownKeranjang">--}}
{{--                <button class="buttonWithImage" onclick="window.location='{{ url("/cart")}}'"><img src="{{asset('images/shopping-cart.png')}}"></button>--}}
{{--                <div class="dropdownList">--}}
{{--                    <div class="title">--}}
{{--                        <p class="contentSemiNormal">Keranjang Anda</p>--}}
{{--                        <button>--}}
{{--                            <p class="contentSemiNormal">Lihat Semua</p>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="content">--}}
{{--                        <div class="sectionPicture">--}}
{{--                            <img src="{{asset('images/dummyProduct.jpeg')}}">--}}
{{--                            <div class="sectionText">--}}
{{--                                <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgic...</p>--}}
{{--                                <p class="contentSmall">5 pcs</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="section">--}}
{{--                            <p class="contentSemiNormal">Rp50.000</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="dropdownNotifikasi">--}}
{{--                <button class="buttonWithImage"><img src="{{asset('images/bell.png')}}"></button>--}}
{{--                <div class="dropdownList">--}}
{{--                    <div class="title">--}}
{{--                        <p class="contentSemiNormal">Notifikasi</p>--}}
{{--                        <button>--}}
{{--                            <p class="contentSemiNormal">Lihat Semua</p>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="content">--}}
{{--                        <img src="{{asset('images/dummyProduct.jpeg')}}">--}}
{{--                        <div class="sectionText">--}}
{{--                            <p class="contentSemiNormal" style="font-weight: bolder;margin-bottom: 5px;">Transaksi Dibatalkan</p>--}}
{{--                            <p class="contentSemiNormal">Transaksi anda telah dibatalkan, ketuk untuk lihat lebih lanjut.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="content">--}}
{{--                        <img src="{{asset('images/dummyProduct.jpeg')}}">--}}
{{--                        <div class="sectionText">--}}
{{--                            <p class="contentSemiNormal" style="font-weight: bolder;margin-bottom: 5px;">Pesanan sudah sampai tujuan!</p>--}}
{{--                            <p class="contentSemiNormal">Terima kasih sudah menggunakan layanan Tutungan!</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            @guest
                <button class="buttonWithImage" onclick="openLoginPopup();"><img src="{{asset('images/shopping-cart.png')}}"></button>
                <button class="buttonWithImage" onclick="openLoginPopup();"><img src="{{asset('images/bell.png')}}"></button>
                <div class="buttonLoginRegister">
                    <button class="buttonLogin" onclick="openLoginPopup();">Masuk</button>
                    <form method="GET" action="{{url('/register')}}">
                        <button type="submit" class="buttonRegister">Daftar</button>
                    </form>
                </div>
            @else
                <div class="dropdownKeranjang" id="parentDropdownKeranjang">
                    <button class="buttonWithImage" id="buttonDropdownKeranjang" onclick="openKeranjangDropdown()"><img src="{{asset('images/shopping-cart.png')}}"></button>
                    <div class="dropdownList" id="dropdownKeranjang">
                        <div class="title">
                            <p class="contentSemiNormal">Keranjang Anda</p>
                            <button onclick="window.location='{{ url("/cart")}}'">
                                <p class="contentSemiNormal">Lihat Semua</p>
                            </button>
                        </div>
                        @if ($cart_items->isEmpty())
                            <div class="content">
                                <p class="contentSemiNormal">Keranjang kosong.</p>
                            </div>
                        @else
                            @foreach ($cart_items as $cart_item)
                                <a class="content" href="{{ url('/wish/'.$cart_item->wish_id)}}">
                                    <div class="sectionPicture">
                                        <img src="{{asset('uploads/'.json_decode($cart_item->getWishRelation->image)[0])}}"/>
                                        <div class="sectionText">
                                            <p class="contentSemiNormal">{{$cart_item->getWishRelation->name}}</p>
                                            <p class="contentSmall">{{$cart_item->qty}} pcs</p>
                                        </div>
                                    </div>
                                    <div class="section">
                                        <p class="contentSemiNormal">Rp {{number_format($cart_item->total_price, 0, ',', '.')}}</p>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="dropdownNotifikasi" id="parentDropdownNotifikasi">
                    <button class="buttonWithImage" id="buttonDropdownNotif" onclick="openNotifDropdown()"><img src="{{asset('images/bell.png')}}"></button>
                    <div class="dropdownList" id="dropdownNotif">
                        <div class="title">
                            <p class="contentSemiNormal">Notifikasi</p>
                            <button onclick="window.location='{{ url("/notifikasi")}}'">
                                <p class="contentSemiNormal">Lihat Semua</p>
                            </button>
                        </div>
                        @if ($notifs->isEmpty())
                            <div class="content">
                                <p class="contentSemiNormal">Tidak ada notifikasi.</p>
                            </div>
                        @else
                            @foreach ($notifs as $notif)
                                @if ($notif->is_read == 0)
                                    <div class="content">
                                        <img src="{{asset('images/dummyProduct.jpeg')}}">
                                        <div class="sectionText">
                                            <p class="contentSemiNormal" style="font-weight: bolder;margin-bottom: 5px;">{{$notif->getNotificationRelation->title}}</p>
                                            <p class="contentSemiNormal">{{$notif->getNotificationRelation->subtitle}}</p>
                                            {{-- waktu notifikasi --}}
                                        </div>
                                    </div>
                                @else {{-- kalau notifikasi belum di baca --}}
                                    <div class="content">
                                        <img src="{{asset('images/dummyProduct.jpeg')}}">
                                        <div class="sectionText">
                                            <p class="contentSemiNormal" style="font-weight: bolder;margin-bottom: 5px;">{{$notif->getNotificationRelation->title}}</p>
                                            <p class="contentSemiNormal">{{$notif->getNotificationRelation->subtitle}}</p>
                                            {{-- waktu notifikasi --}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <form action="{{url('/createWish')}}">
                    <button type="submit" class="contentSemiNormal buttonAddWish button buttonYellow">
                        <img src="{{asset('images/plusBlack.png')}}">
                        Wish
                    </button>
                </form>
                <div class="dropdownProfil" id="parentDropdownProfil">
                    <button class="buttonUser" id="buttonDropdownUser" onclick="openUserDropdown();">
                        @if($user->image)
                            <img src="{{asset('uploads/profile/'. $user->image)}}">
                        @else
                            <img src="{{asset('images/dummyUser2.png')}}">
                        @endif
                        <p class="contentNormal">{{$user->username}}</p>
                        <img id="arrowUser" src="{{asset('images/arrowDownBlack.png')}}">
                    </button>
                    <div class="dropdownList" id="dropdownList">
                        <a href="{{ url('/akunSaya/profil' )}}">
                            <p class="contentSemiNormal">Akun Saya</p>
                        </a>
                        <a href="{{ url('/wishsaya') }}">
                            <p class="contentSemiNormal">Wish Saya</p>
                        </a>
                        <a href="{{ url('/transaksisaya') }}">
                            <p class="contentSemiNormal">Transaksi Saya</p>
                        </a>
                        <a href="{{ url('/logout') }}">
                            <p class="contentSemiNormal">Logout</p>
                        </a>
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
            <h1 class="contentSemiExtraBig">Masuk</h1>
            <button id="closeLogin">
                <img src="{{asset('images/close.png')}}"/>
            </button>
        </div>
        <form class="loginSection" method="POST" action="{{route('postLogin')}}">
            {{ csrf_field() }}
            <div class="field">
                <p class="contentSemiBig">Email</p>
                <input name="email" type="text" id="email" placeholder="ex:youremail@tutungan.com" required>
            </div>
            <div class="field">
                <p class="contentSemiBig">Password</p>
                <input name="password" type="password" id="password" required>
                <div class="lupaPass">
                    <a href="{{url('/forgotPassword')}}"><p class="contentSemiNormal">Lupa password?</p></a>
                </div>
            </div>
            <button class="buttonMasuk" type="submit">
                <p class="contentBig">Masuk</p>
            </button>
        </form>
        <div class="daftarSection">
            <p class="contentSemiBig">Baru di Tutungan?</p>
            <a href="{{url('/register')}}">
                <p class="contentSemiBig">Daftar</p>
            </a>
        </div>
    </div>
</div>
