@extends('layoutKosong.app')

@section('content')
    <body style="background-image: url({{secure_asset('images/masuk.png')}});background-size: cover;background-repeat: no-repeat; ">
    <nav class="navbar" style="justify-content: center;position: absolute">
        <a href="{{secure_url("/")}}" style="cursor: pointer;" class="logo">
            <img src="{{secure_asset('images/tutunganLogo.png')}}">
        </a>
    </nav>
    <main style="min-height: 100vh;">
        <div class="login">
            <div class="loginContainer">
                <div class="title">
                    <h1 class="contentSemiExtraBig">Mohon klik link verifikasi yang telah dikirimkan ke email Anda, lalu login kemballi di Tutungan.</h1>
                </div>
            </div>
        </div>
    </main>
    </body>
@endsection
