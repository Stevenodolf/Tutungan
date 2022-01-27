@extends('layoutKosong.app')

@section('head')
    <script src="{{ secure_asset('js/src/forgotPassword/forgotPassword.js') }}"></script>
@endsection

@section('content')
    <body style="background-image: url({{secure_asset('images/forgotPassEmail.png')}});background-size: cover;background-repeat: no-repeat; ">
    <nav class="navbar" style="justify-content: center;position: absolute">
        <a href="{{secure_url("/")}}" style="cursor: pointer;" class="logo">
            <img src="{{secure_asset('images/tutunganLogo.png')}}">
        </a>
    </nav>
    <main style="min-height: 100vh;">
        <div class="login">
            <div class="loginContainer">
                <div class="title" style="flex-direction: column;align-items: normal;">
                    <h1 class="contentSemiExtraBig">Lupa Password</h1>
                    <p class="contentSemiBig secondaryText">Masukan email yang terdaftar untuk lupa password.</p>
                </div>
                <form class="section" method="POST">
                    {{ csrf_field() }}
                    <div class="field"style="margin-bottom: 50px;">
                        <p class="contentSemiBig secondaryText">Email</p>
                        <input name="email" type="text" id="email" placeholder="ex:youremail@tutungan.com" required>
                    </div>
                    <button class="buttonMasuk" type="submit">
                        <p class="contentSemiBig">Lupa Password</p>
                    </button>
                </form>
            </div>
        </div>
    </main>
    </body>
@endsection
