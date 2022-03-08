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
                <div class="agreement">
                    <h1>Tutungan Agreement</h1>
                    <p class="contentSemiNormal">1. Proses verifikasi Wish akan dilakukan maksimal 1x24 jam setelah anda mengajukan pembuatan Wish.</p>
                    <p class="contentSemiNormal">2. Wish Anda akan ditampilkan di website ini selama 7 hari (168 jam). Apabila setelah 7 hari target kontribusi 
                        Wish anda tercapai, maka Wish anda akan diproses sesuai prosedur. Apabila tidak tercapai, maka Wish akan dibatalkan.</p>
                    <p class="contentSemiNormal">3. Walaupun target Wish sudah tercapai namun deadline Wish belum tercapai, User lain masih bisa menambahkan
                         order ke dalam Wish anda dengan harga yang tetap.</p>
                </div>
            </div>
        </div>
    </main>
    </body>
@endsection
