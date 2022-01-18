@extends('layoutKosong.app')

@section('head')
    <script src="{{ asset('js/src/register/register.js') }}"></script>
@endsection

@section('content')
    <div class="firstRegister" style="background-image: url({{asset('images/daftar1.png')}})">
        <div class="registerContainer">
            <form method="POST" action="{{route('postRegister')}}" enctype="multipart/form-data">
                @csrf
                {{ csrf_field() }}
                <h1>Daftar</h1>
                <p class="contentSemiBig">Sudah punya akun? <a href="{{route('getLogin')}}" style="color: #D5B81B;cursor: pointer">Masuk</a></p>
                <div class="section">
                    <p class="contentSemiBig">Username</p>
                    <input type="text" id="username" name="username" required/>
                </div>
                <div class="section">
                    <p class="contentSemiBig">Email</p>
                    <input type="text" id="email" name="email" required/>
                </div>
                <div class="section">
                    <p class="contentSemiBig">Phone Number</p>
                    <input type="text" id="pnumber" name="pnumber" required/>
                </div>
                <div class="section">
                    <p class="contentSemiBig">Date of Birth</p>
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
                    <p class="contentSemiBig">Gender</p>
                    <select id="gender" name="gender" required>
                        <option value="" disabled selected>Choose Gender</option>
                        <option value="1">Pria</option>
                        <option value="2">Wanita</option>
                    </select>
                </div>
                <div class="section">
                    <p class="contentSemiBig">Password</p>
                    <input type="password" id="password" name="password" required/>
                </div>
                <div class="section">
                    <p class="contentSemiBig">Re-enter Password</p>
                    <input type="password" id="password2" name="password2" required/>
                </div>
                <div class="section">
                    @if($errors->any())
                        <div style="color:red" role="alert">
                            <strong> {{$errors->first()}}</strong>
                        </div>
                    @endif
                    <button type="submit">
                        <p class="contentNormal">Daftar</p>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
