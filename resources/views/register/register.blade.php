@extends('layoutKosong.app')

@section('head')
    <script src="{{ asset('js/src/register/register.js') }}"></script>
@endsection

@section('content')
    <div class="firstRegister" style="background-image: url({{asset('images/daftar1.png')}})">
        <div class="registerContainer">
            <form method="POST" action="register">
                <h1>Daftar</h1>
                <p class="contentSemiBig">Sudah punya akun? <span style="color: #D5B81B;cursor: pointer">Masuk</span></p>
                <div class="section">
                    <p class="contentSemiBig">Username</p>
                    <input type="text" id="username" name="username"/>
                </div>
                <div class="section">
                    <p class="contentSemiBig">Email</p>
                    <input type="text" id="email" name="email"/>
                </div>
                <div class="section">
                    <p class="contentSemiBig">Password</p>
                    <input type="password" id="password" name="password"/>
                </div>
                <div class="section">
                    <p class="contentSemiBig">Re-enter Password</p>
                    <input type="password" id="password2" name="password2"/>
                </div>
                <div class="section">
                    <button>
                        <p class="contentNormal">Daftar</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
