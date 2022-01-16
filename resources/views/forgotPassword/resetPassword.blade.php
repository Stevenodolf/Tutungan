@extends('layoutKosong.app')

@section('head')
    <script src="{{ asset('js/src/forgotPassword/resetPassword.js') }}"></script>
@endsection

@section('content')
    <div class="login" style="background-image: url({{asset('images/forgotPassReset.png')}})">
        <div class="loginContainer">
            <div class="title" style="flex-direction: column;align-items: normal;">
                <h1>Lupa Password</h1>
                <p class="">Masukan email yang terdaftar untuk lupa password.</p>
            </div>
            <form class="section" method="POST" action="{{url('/resetPassword')}}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">
                    <p class="">Email</p>
                    <input name="email" type="email" id="email" required>
                </div>
                <div class="field">
                    <p class="">Password</p>
                    <input name="password" type="password" id="password" required>
                </div>
                <div class="field">
                    <p class="">Confirm Password</p>
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
@endsection
