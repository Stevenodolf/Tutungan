@extends('layouts.app')

@section('head')
    <script src="{{ secure_asset('js/src/detailAkun/detailAkun.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer" style="background: #F2F2F2;">
        <div class="detailAkun">
            <div class="sideMenu">
                <div class="profile">
                    @if($user->image)
                        <img src="{{Storage::disk('s3')->url($user->image)}}">
                    @else
                        <img src="{{secure_asset('images/dummyUser2.png')}}">
                    @endif
                    <h3 class="contentNormal">Steven Yuwono</h3>
                </div>
                <div class="menu">
                    <div id="akunSaya" class="list">
                        <img src="{{secure_asset("images/user.png")}}">
                        <h3 class="contentSemiBig">Akun Saya</h3>
                    </div>
                    <div class="subList">
                        <a class="list" href="{{secure_url('/akunSaya/profil')}}" >
                            <p id="profil" class="contentSemiBig">Profil</p>
                        </a>
                        <a class="list" href="{{secure_url('/akunSaya/alamatpengiriman')}}" >
                            <p id="alamat" class="contentSemiBig">Alamat Pengiriman</p>
                        </a>
                        <a class="list" href="{{secure_url('/akunSaya/kartukreditdebit')}}" >
                            <p id="kartu" class="contentSemiBig">Kartu Kredit/Debit</p>
                        </a>
                        <a class="list" href="{{secure_url('/akunSaya/ubahpassword')}}" >
                            <p id="ubahPass" class="contentSemiBig">Ubah Password</p>
                        </a>
                    </div>
                    <div id="wishSaya" class="list" onclick="window.location='{{ secure_url("/wishsaya")}}'">
                        <img src="{{secure_asset("images/wish.png")}}">
                        <h3 class="contentSemiBig">Wish Saya</h3>
                    </div>
                    <div id="transaksiSaya" class="list" onclick="window.location='{{ secure_url("/transaksisaya")}}'">
                        <img src="{{secure_asset("images/transaksi.png")}}">
                        <h3 class="contentSemiBig">Transaksi Saya</h3>
                    </div>
                    <div id="notifikasi" class="list" onclick="window.location='{{ secure_url("/notifikasi")}}'">
                        <img src="{{secure_asset("images/notification_outline.png")}}">
                        <h3 class="contentSemiBig">Notifikasi</h3>
                    </div>
                </div>
            </div>

            @yield('mainContent')
{{--            <div class="content" id="content1" >--}}
{{--                <div class="title">--}}
{{--                    <h2>Profil</h2>--}}
{{--                    <p class="contentSemiBig">Kelola data diri Anda yang akan digunakan dalam situs ini.</p>--}}
{{--                </div>--}}
{{--                <form class="profil" >--}}
{{--                    <div style="display: flex">--}}
{{--                        <div class="profilPict">--}}
{{--                            <img id="fotoProfil" src="{{secure_asset('images/dummyUser2.png')}}">--}}
{{--                            <input accept="image/*" type='file' id="inputProfil" onchange="inputChange()"/>--}}
{{--                            <input type="button" value="Pilih Gambar" onclick="document.getElementById('inputProfil').click();">--}}
{{--                            <p class="contentSemiNormal">Ukuran gambar: maks. 10 MB</p>--}}
{{--                            <p class="contentSemiNormal">Format gambar: .JPG, .JPEG, .PNG</p>--}}
{{--                        </div>--}}
{{--                        <div class="biodata">--}}
{{--                            <h3>Biodata Diri</h3>--}}
{{--                            <div class="section">--}}
{{--                                <p class="contentSemiNormal" style="color: #747474;">Nama</p>--}}
{{--                                <input type="text" value="Steven Yuwono">--}}
{{--                            </div>--}}
{{--                            <div class="section">--}}
{{--                                <p class="contentSemiNormal" style="color: #747474;">Tanggal Lahir</p>--}}
{{--                                <p class="contentSemiNormal" style="font-weight: bold">26 Juni 2000</p>--}}
{{--                            </div>--}}
{{--                            <div class="section">--}}
{{--                                <p class="contentSemiNormal" style="color: #747474;">Nama</p>--}}
{{--                                <select>--}}
{{--                                    <option>Pria</option>--}}
{{--                                    <option>Wanita</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <h3>Kontak</h3>--}}
{{--                            <div class="section">--}}
{{--                                <p class="contentSemiNormal" style="color: #747474;">Email</p>--}}
{{--                                <p class="contentSemiNormal" style="font-weight: bold">stevenyuwono@gmail.com</p>--}}
{{--                            </div>--}}
{{--                            <div class="section">--}}
{{--                                <p class="contentSemiNormal" style="color: #747474;">Nomor HP</p>--}}
{{--                                <p class="contentSemiNormal" style="font-weight: bold">08112345678</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="buttonSimpan">--}}
{{--                        <button type="submit">Simpan</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--            <div class="content" id="content2" style="display: none;">--}}
{{--                <div class="titleWithButton">--}}
{{--                    <div class="titleInButton">--}}
{{--                        <h2>Alamat Pengiriman</h2>--}}
{{--                        <p class="contentSemiBig">Kelola daftar alamat untuk pengiriman barang pesanan Anda.</p>--}}
{{--                    </div>--}}
{{--                    <div class="buttonContainer">--}}
{{--                        <button onclick="popupTambahAlamat();">--}}
{{--                            <img src="{{secure_asset("images/plusBlack.png")}}">--}}
{{--                            <p class="contentNormal">Alamat</p>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="alamatPengiriman">--}}
{{--                    <div class="listAlamat">--}}
{{--                        <div class="titleWithEmblem">--}}
{{--                            <h3>Rumah</h3>--}}
{{--                            <div class="emblem">--}}
{{--                                <p class="contentSemiNormal" style="color: white;">Utama</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="keterangan">--}}
{{--                            <div class="section">--}}
{{--                                <div class="sectionText">--}}
{{--                                    <p class="contentNormal" style="color: #636363;width: 150px">Nama Lengkap</p>--}}
{{--                                    <p class="contentNormal">Steven Yuwono</p>--}}
{{--                                </div>--}}
{{--                                <div class="sectionText">--}}
{{--                                    <p class="contentNormal" style="color: #636363;width: 150px">Telepon</p>--}}
{{--                                    <p class="contentNormal" >62812345678</p>--}}
{{--                                </div>--}}
{{--                                <div class="sectionText">--}}
{{--                                    <p class="contentNormal" style="color: #636363;width: 150px">Alamat</p>--}}
{{--                                    <p class="contentNormal" style="width: 250px">Jl. Ir. Soekarno No. 69, RT 04 RW 20 Kota Surakarta - Pasar Kliwon Jawa Tengah 57752</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="section">--}}
{{--                                <img src="{{secure_asset('images/checkmarkYellow.png')}}"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="buttonBawah">--}}
{{--                            <button>Ubah</button>--}}
{{--                            <button>Hapus</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="alamatPengiriman">--}}
{{--                    <div class="listAlamat">--}}
{{--                        <div class="titleWithEmblem">--}}
{{--                            <h3>Dormitory</h3>--}}
{{--                        </div>--}}
{{--                        <div class="keterangan">--}}
{{--                            <div class="section">--}}
{{--                                <div class="sectionText">--}}
{{--                                    <p class="contentNormal" style="color: #636363;width: 150px">Nama Lengkap</p>--}}
{{--                                    <p class="contentNormal">Steven Yuwono</p>--}}
{{--                                </div>--}}
{{--                                <div class="sectionText">--}}
{{--                                    <p class="contentNormal" style="color: #636363;width: 150px">Telepon</p>--}}
{{--                                    <p class="contentNormal" >62812345678</p>--}}
{{--                                </div>--}}
{{--                                <div class="sectionText">--}}
{{--                                    <p class="contentNormal" style="color: #636363;width: 150px">Alamat</p>--}}
{{--                                    <p class="contentNormal" style="width: 250px">Jl. Ir. Soekarno No. 69, RT 04 RW 20 Kota Surakarta - Pasar Kliwon Jawa Tengah 57752</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="section">--}}
{{--                                <button>Pilih</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="buttonBawah">--}}
{{--                            <button>Ubah</button>--}}
{{--                            <button>Hapus</button>--}}
{{--                            <button>Atur Sebagai Alamat Utama</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="content" id="content3" style="display: none;" >--}}
{{--                <div class="titleWithButton">--}}
{{--                    <div class="titleInButton">--}}
{{--                        <h2>Kartu Kredit/Debit</h2>--}}
{{--                        <p class="contentSemiBig">Kelola informasi kartu kredit/debit untuk memproses pembayaran.</p>--}}
{{--                    </div>--}}
{{--                    <div class="buttonContainer">--}}
{{--                        <button onclick="popupTambahCreditDebit();">--}}
{{--                            <img src="{{secure_asset("images/plusBlack.png")}}">--}}
{{--                            <p class="contentNormal">Kartu Kredit/Debit</p>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="creditDebit">--}}
{{--                    <div class="listCreditDebit">--}}
{{--                        <img src="{{secure_asset('images/dummyCreditCard.png')}}"/>--}}
{{--                        <div>--}}
{{--                            <div class="titleWithEmblem">--}}
{{--                                <h3>**** **** **** 7890</h3>--}}
{{--                                <div class="emblem">--}}
{{--                                    <p class="contentSemiNormal" style="color: white;">Utama</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="keterangan">--}}
{{--                                <div class="section">--}}
{{--                                    <p class="contentNormal">06 / 23</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="buttonSamping">--}}
{{--                        <button>Atur Sebagai Utama</button>--}}
{{--                        <button>Hapus</button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="creditDebit">--}}
{{--                    <div class="listCreditDebit">--}}
{{--                        <img src="{{secure_asset('images/dummyCreditCard.png')}}"/>--}}
{{--                        <div>--}}
{{--                            <div class="titleWithEmblem">--}}
{{--                                <h3>**** **** **** 1234</h3>--}}
{{--                                <div class="emblem">--}}
{{--                                    <p class="contentSemiNormal" style="color: white;">Utama</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="keterangan">--}}
{{--                                <div class="section">--}}
{{--                                    <p class="contentNormal">06 / 23</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="buttonSamping">--}}
{{--                        <button>Atur Sebagai Utama</button>--}}
{{--                        <button>Hapus</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="content" id="content4" style="display: none;">--}}
{{--                <div class="title">--}}
{{--                    <h2>Ubah Password</h2>--}}
{{--                    <p class="contentSemiBig">Demi keamanan akun Anda, mohon tidak menyebarkan password Anda ke orang lain.</p>--}}
{{--                </div>--}}
{{--                <div class="changePassword">--}}
{{--                    <div class="section">--}}
{{--                        <div class="sectionInput" style="align-items: flex-start;">--}}
{{--                            <p class="contentSemiNormal" style="color: #747474;width: 150px;">Password Sekarang</p>--}}
{{--                            <div>--}}
{{--                                <input type="password">--}}
{{--                                <p class="contentSemiNormal" style="color: #D5B81B;">Lupa Password?</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sectionInput">--}}
{{--                            <p class="contentSemiNormal" style="color: #747474;width: 150px;">Password Baru</p>--}}
{{--                            <input type="password">--}}
{{--                        </div>--}}
{{--                        <div class="sectionInput">--}}
{{--                            <p class="contentSemiNormal" style="color: #747474;width: 150px;">Ulangi Password Baru</p>--}}
{{--                            <input type="password">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <button>Ubah Password</button>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>


@endsection
