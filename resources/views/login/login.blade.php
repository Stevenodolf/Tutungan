@extends('layoutKosong.app')

@section('head')
    <script src="{{ secure_asset('js/src/login/login.js') }}"></script>
@endsection

@section('content')
    <body style="background-image: url({{secure_asset('images/masuk.png')}});background-size: cover;background-repeat: no-repeat; ">
    <nav class="navbar" style="justify-content: center;position: absolute">
        <a href="{{url("/")}}" style="cursor: pointer;" class="logo">
            <img src="{{secure_asset('images/tutunganLogo.png')}}">
        </a>
    </nav>
    <main style="min-height: 100vh;">
        <div class="login">
            <div class="loginContainer">
                <div class="title">
                    <h1 class="contentSemiExtraBig">Masuk</h1>
                </div>
                <form class="section" method="POST">
                    {{ csrf_field() }}
                    <div class="field">
                        <p class="contentSemiBig">Email</p>
                        <input name="email" type="text" id="email" placeholder="ex:youremail@tutungan.com" required>
                    </div>
                    <div class="field">
                        <p class="contentSemiBig">Password</p>
                        <input name="password" type="password" id="password" required>
                        <div class="lupaPass">
                            <a href="{{url('/forgotPassword')}}" class="contentSemiNormal">Lupa password?</a>
                        </div>
                    </div>
                    @if($errors->any())
                        <div style="color:red" role="alert">
                            <strong> {{$errors->first()}}</strong>
                        </div>
                    @endif
                    <button class="buttonMasuk" type="submit">
                        <p class="contentSemiBig">Masuk</p>
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
    </main>
    </body>
@endsection
