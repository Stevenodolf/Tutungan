@extends('layoutKosong.app')

@section('head')
    <script src="{{ secure_asset('js/src/register/registerAddress.js') }}"></script>
@endsection

@section('content')
    <div class="secondRegister" style="background-image: url({{secure_asset('images/daftar2.png')}})">
        <div class="registerContainer">
            <h1>Daftar Alamat</h1>
            <div class="section">
                <p class="contentSemiBig">Nama Kamu/Toko</p>
                <input type="text"/>
            </div>
            <div class="section">
                <p class="contentSemiBig">Nomor Telepon</p>
                <input type="text"/>
            </div>
            <div class="section2">
                <p class="contentSemiBig">Provinsi</p>
                <input type="text"/>
            </div>
            <div class="section2">
                <p class="contentSemiBig">Kota/Kabupaten</p>
                <input type="text"/>
            </div>
            <div class="section2">
                <p class="contentSemiBig">Kecamatan</p>
                <input type="text"/>
            </div>
            <div class="section2">
                <p class="contentSemiBig">Kode Pos</p>
                <input type="text"/>
            </div>
            <div class="section">
                <p class="contentSemiBig">Alamat Lengkap</p>
                <textarea class="textBox"></textarea>
            </div>
            <div class="section">
                <button>
                    <p class="contentNormal">Tambah</p>
                </button>
            </div>
            <div style="display: flex;justify-content: center;">
                <p class="contentSemiBig" style="color: #D5B81B;cursor: pointer;">Lewatkan untuk sekarang</p>
            </div>
        </div>
    </div>
@endsection
