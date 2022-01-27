@extends('layoutKosong.app')

@section('head')
    <script src="{{ secure_asset('js/src/forgotPassword/resetPassword.js') }}"></script>
@endsection

@section('content')
    <body style="background-image: url({{secure_asset('images/forgotPassReset.png')}});background-size: cover;background-repeat: no-repeat; ">
    <nav class="navbar" style="justify-content: center;position: absolute">
        <a href="{{url("/")}}" style="cursor: pointer;" class="logo">
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
                <form class="section" method="POST" action="{{url('/resetPassword')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="field">
                        <p class="contentSemiBig secondaryText">Email</p>
                        <input name="email" type="email" id="email" required>
                    </div>
                    <div class="field">
                        <p class="contentSemiBig secondaryText">Password</p>
                        <input name="password" type="password" id="password" required>
                    </div>
                    <div class="field">
                        <p class="contentSemiBig secondaryText">Confirm Password</p>
                        <input name="password_confirmation" type="password" id="password_confirmation" required>
                    </div>
                    @if($errors->any())
                        <strong>{{$errors}}</strong>
                    @endif
                    <button class="buttonMasuk" type="submit">
                        <p class="contentSemiBig">Reset Password</p>
                    </button>
                </form>
            </div>
        </div>
    </main>
    </body>

@endsection
