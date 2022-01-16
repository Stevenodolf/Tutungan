@extends('layoutKosong.app')

@section('head')
    <script src="{{ asset('js/src/forgotPassword/forgotPassword.js') }}"></script>
@endsection

@section('content')
    <div class="login" style="background-image: url({{asset('images/forgotPassEmail.png')}})">
        <div class="loginContainer">
            <div class="title" style="flex-direction: column;align-items: normal;">
                <h1>Lupa Password</h1>
                <p class="">Masukan email yang terdaftar untuk lupa password.</p>
            </div>
            <form class="section" method="POST">
                {{ csrf_field() }}
                <div class="field"style="margin-bottom: 50px;">
                    <p class="">Email</p>
                    <input name="email" type="text" id="email" placeholder="ex:youremail@tutungan.com" required>
                </div>
                <button class="buttonMasuk" type="submit">
                    <p class="contentSemiBig">Lupa Password</p>
                </button>
            </form>
        </div>
    </div>
@endsection
