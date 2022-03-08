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
                <h1>Tutungan Agreement</h1>
                <p>1. Proses verifikasi Wish akan dilakukan maksimal 1x24 jam setelah anda mengajukan pembuatan Wish.</p>
                <p>2. Wish Anda akan ditampilkan di website ini selama 7 hari (168 jam). Apabila setelah 7 hari target kontribusi</p>
                <p>   Wish anda tercapai, maka Wish anda akan diproses sesuai prosedur. Apabila tidak tercapai, maka Wish akan dibatalkan.</p>
            </div>
        </div>
    </main>
    </body>
@endsection
