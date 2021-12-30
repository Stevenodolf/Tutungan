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
            <form class="section">
                <div class="field">
                    <p class="">Email</p>
                    <input name="email" type="text" id="email" placeholder="ex:youremail@tutungan.com" required>
                </div>
                <div class="field">
                    <p class="">Password</p>
                    <input name="password" type="password" id="password" required>
                    <div class="lupaPass">
                        <button>
                            <p class="contentSemiBig">Lupa password?</p>
                        </button>
                    </div>
                </div>
                <button class="buttonMasuk" type="submit" action="{{ url('/home')}}">
                    <p class="contentSemiBig">Masuk</p>
                </button>
            </form>
            <div class="daftarSection">
                <p class="contentSemiBig">Baru di Tutungan?</p>
                <button>
                    <p class="contentSemiBig">Daftar</p>
                </button>
            </div>
        </div>
    </div>
@endsection
