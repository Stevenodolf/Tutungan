@extends('layoutKosong.app')

@section('head')
    <script src="{{ asset('js/src/login/login.js') }}"></script>
@endsection

@section('content')
    <div class="login" style="background-image: url({{asset('images/masuk.png')}})">
        <div class="loginContainer">
            <div class="title">
                <h1>Masuk</h1>
            </div>
            <form class="section" method="POST">
                {{ csrf_field() }}
                <div class="field">
                    <p class="">Email</p>
                    <input name="email" type="text" id="email" placeholder="ex:youremail@tutungan.com" required>
                </div>
                <div class="field">
                    <p class="">Password</p>
                    <input name="password" type="password" id="password" required>
                    <div class="lupaPass">
                        <a href="{{url('/forgotPassword')}}" class="contentSemiBig">Lupa password?</a>
                    </div>
                </div>
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
@endsection
