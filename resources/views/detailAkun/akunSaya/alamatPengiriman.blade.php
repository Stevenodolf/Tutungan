@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <div class="content" id="content2">
        <div class="titleWithButton">
            <div class="titleInButton">
                <h2>Alamat Pengiriman</h2>
                <p class="contentSemiBig">Kelola daftar alamat untuk pengiriman barang pesanan Anda.</p>
            </div>
            <div class="buttonContainer">
                <button onclick="popupTambahAlamat();">
                    <img src="{{asset("images/plusBlack.png")}}">
                    <p class="contentNormal">Alamat</p>
                </button>
            </div>
        </div>
        <div class="alamatPengiriman">
            <div class="listAlamat">
                <div class="titleWithEmblem">
                    <h3>Rumah</h3>
                    <div class="emblem">
                        <p class="contentSemiNormal" style="color: white;">Utama</p>
                    </div>
                </div>
                <div class="keterangan">
                    <div class="section">
                        <div class="sectionText">
                            <p class="contentNormal" style="color: #636363;width: 150px">Nama Lengkap</p>
                            <p class="contentNormal">Steven Yuwono</p>
                        </div>
                        <div class="sectionText">
                            <p class="contentNormal" style="color: #636363;width: 150px">Telepon</p>
                            <p class="contentNormal" >62812345678</p>
                        </div>
                        <div class="sectionText">
                            <p class="contentNormal" style="color: #636363;width: 150px">Alamat</p>
                            <p class="contentNormal" style="width: 250px">Jl. Ir. Soekarno No. 69, RT 04 RW 20 Kota Surakarta - Pasar Kliwon Jawa Tengah 57752</p>
                        </div>
                    </div>
                    <div class="section">
                        <img src="{{asset('images/checkmarkYellow.png')}}"/>
                    </div>
                </div>
                <div class="buttonBawah">
                    <button>Ubah</button>
                    <button>Hapus</button>
                </div>
            </div>
        </div>
        <div class="alamatPengiriman">
            <div class="listAlamat">
                <div class="titleWithEmblem">
                    <h3>Dormitory</h3>
                </div>
                <div class="keterangan">
                    <div class="section">
                        <div class="sectionText">
                            <p class="contentNormal" style="color: #636363;width: 150px">Nama Lengkap</p>
                            <p class="contentNormal">Steven Yuwono</p>
                        </div>
                        <div class="sectionText">
                            <p class="contentNormal" style="color: #636363;width: 150px">Telepon</p>
                            <p class="contentNormal" >62812345678</p>
                        </div>
                        <div class="sectionText">
                            <p class="contentNormal" style="color: #636363;width: 150px">Alamat</p>
                            <p class="contentNormal" style="width: 250px">Jl. Ir. Soekarno No. 69, RT 04 RW 20 Kota Surakarta - Pasar Kliwon Jawa Tengah 57752</p>
                        </div>
                    </div>
                    <div class="section">
                        <button>Pilih</button>
                    </div>
                </div>
                <div class="buttonBawah">
                    <button>Ubah</button>
                    <button>Hapus</button>
                    <button>Atur Sebagai Alamat Utama</button>
                </div>
            </div>
        </div>
    </div>
@endsection
