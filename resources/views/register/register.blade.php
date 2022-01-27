@extends('layoutKosong.app')

@section('head')
    <script src="{{ secure_asset('js/src/register/register.js') }}"></script>
@endsection

@section('content')
    <body style="background-image: url({{secure_asset('images/daftar1.png')}});background-size: cover;background-repeat: no-repeat; ">
    <nav class="navbar" style="justify-content: center;position: absolute">
        <a href="{{secure_url("/")}}" style="cursor: pointer;" class="logo">
            <img src="{{secure_asset('images/tutunganLogo.png')}}">
        </a>
    </nav>
    <main style="min-height: 100vh;">
        <div class="firstRegister">
            <div class="registerContainer">
                <form method="POST" action="{{secure_url('/register')}}" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    <h1 class="contentSemiExtraBig">Daftar</h1>
                    <p class="contentSemiBig textBelowTitle">Sudah punya akun? <a class="masuk" href="{{route('getLogin')}}" style="color: #D5B81B;cursor: pointer">Masuk</a></p>
                    <div class="section">
                        <p class="contentSemiBig question">Username</p>
                        <input type="text" id="username" name="username" required/>
                    </div>
                    <div class="section">
                        <p class="contentSemiBig question">Email</p>
                        <input type="text" id="email" name="email" required/>
                    </div>
                    <div class="section">
                        <p class="contentSemiBig question">Phone Number</p>
                        <input type="text" id="pnumber" name="pnumber" required/>
                    </div>
                    <div class="section">
                        <p class="contentSemiBig question">Date of Birth</p>
                        <div style="display: flex;justify-content: space-between;">
                            <select id ="day" name = "day" >
                            </select>
                            <select  id ="month" name = "month" onchange="change_month(this)">
                            </select>
                            <select id ="year" name = "year" onchange="change_year(this)">
                            </select>
                        </div>
                    </div>
                    <div class="section">
                        <p class="contentSemiBig question">Gender</p>
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>Choose Gender</option>
                            <option value="1">Pria</option>
                            <option value="2">Wanita</option>
                        </select>
                    </div>
                    <div class="section">
                        <p class="contentSemiBig question">Password</p>
                        <input type="password" id="password" name="password" required/>
                    </div>
                    <div class="section">
                        <p class="contentSemiBig question">Re-enter Password</p>
                        <input type="password" id="password2" name="password2" required/>
                    </div>
                    <div class="section">
                        @if($errors->any())
                            <div class="alert" style="color:red" role="alert">
                                <strong class="contentNormal"> {{$errors->first()}}</strong>
                            </div>
                        @endif
                        <button id="buttonSubmit" type="submit">
                            <p class="contentNormal">Daftar</p>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </main>
    </body>

@endsection
