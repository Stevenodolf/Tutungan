@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/detailAkun/detailAkun.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer" style="background: #F2F2F2;">
        <div class="detailAkun">
            <div class="sideMenu">
                <div class="profile">
                    <img src="{{asset("images/dummyUser.png")}}"/>
                    <h3>Steven Yuwono</h3>
                </div>
                <div class="menu">
                    <div class="list">
                        <img src="{{asset("images/user.png")}}">
                        <h3>Akun Saya</h3>
                    </div>
                    <div class="subList">
                        <div class="list">
                            <p class="contentSemiBig">Profil</p>
                        </div>
                        <div class="list">
                            <p class="contentSemiBig">Alamat Pengiriman</p>
                        </div>
                        <div class="list">
                            <p class="contentSemiBig">Kartu Kredit/Debit</p>
                        </div>
                        <div class="list">
                            <p class="contentSemiBig">Ubah Password</p>
                        </div>
                    </div>
                    <div class="list">
                        <img src="{{asset("images/wish.png")}}">
                        <h3>Wish Saya</h3>
                    </div>
                    <div class="list">
                        <img src="{{asset("images/transaksi.png")}}">
                        <h3>Transaksi Saya</h3>
                    </div>
                    <div class="list">
                        <img src="{{asset("images/notification_outline.png")}}">
                        <h3>Akun Saya</h3>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="title">
                    <h2>Profil</h2>
                    <p class="contentSemiBig">Kelola data diri Anda yang akan digunakan dalam situs ini.</p>
                </div>
                <form class="profil">
                    <div class="profilPict">
                        <img id="fotoProfil" src="{{asset('images/dummyUser2.png')}}">
                        <input accept="image/*" type='file' id="inputProfil" onchange="inputChange()"/>
                        <input type="button" value="Pilih Gambar" onclick="document.getElementById('inputProfil').click();">
                        <p class="contentSemiNormal">Ukuran gambar: maks. 10 MB</p>
                        <p class="contentSemiNormal">Format gambar: .JPG, .JPEG, .PNG</p>
                    </div>
                    <div class="biodata">
                        <h3>Biodata Diri</h3>
                        <div class="section">
                            <p class="contentSemiNormal" style="color: #747474;">Nama</p>
                            <input type="text" value="Steven Yuwono">
                        </div>
                        <div class="section">
                            <p class="contentSemiNormal" style="color: #747474;">Tanggal Lahir</p>
                            <p class="contentSemiNormal" style="font-weight: bold">26 Juni 2000</p>
                        </div>
                        <div class="section">
                            <p class="contentSemiNormal" style="color: #747474;">Nama</p>
                            <select>
                                <option>Pria</option>
                                <option>Wanita</option>
                            </select>
                        </div>
                        <h3>Kontak</h3>
                        <div class="section">
                            <p class="contentSemiNormal" style="color: #747474;">Email</p>
                            <p class="contentSemiNormal" style="font-weight: bold">stevenyuwono@gmail.com</p>
                        </div>
                        <div class="section">
                            <p class="contentSemiNormal" style="color: #747474;">Nomor HP</p>
                            <p class="contentSemiNormal" style="font-weight: bold">08112345678</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
