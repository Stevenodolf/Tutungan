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
                        <div class="list" onclick="bukaBagian(1)>
                            <p class="contentSemiBig">Profil</p>
                        </div>
                        <div class="list" onclick="bukaBagian(2)>
                            <p class="contentSemiBig">Alamat Pengiriman</p>
                        </div>
                        <div class="list" onclick="bukaBagian(3)>
                            <p class="contentSemiBig">Kartu Kredit/Debit</p>
                        </div>
                        <div class="list" onclick="bukaBagian(4)>
                            <p class="contentSemiBig">Ubah Password</p>
                        </div>
                    </div>
                    <div class="list" onclick="window.location='{{ url("/wishsaya")}}'">
                        <img src="{{asset("images/wish.png")}}">
                        <h3>Wish Saya</h3>
                    </div>
                    <div class="list" onclick="window.location='{{ url("/transaksisaya")}}'">
                        <img src="{{asset("images/transaksi.png")}}">
                        <h3>Transaksi Saya</h3>
                    </div>
                    <div class="list">
                        <img src="{{asset("images/notification_outline.png")}}">
                        <h3>Notifikasi</h3>
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
{{--                            <img id="fotoProfil" src="{{asset('images/dummyUser2.png')}}">--}}
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
{{--                            <img src="{{asset("images/plusBlack.png")}}">--}}
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
{{--                                <img src="{{asset('images/checkmarkYellow.png')}}"/>--}}
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
{{--                            <img src="{{asset("images/plusBlack.png")}}">--}}
{{--                            <p class="contentNormal">Kartu Kredit/Debit</p>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="creditDebit">--}}
{{--                    <div class="listCreditDebit">--}}
{{--                        <img src="{{asset('images/dummyCreditCard.png')}}"/>--}}
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
{{--                        <img src="{{asset('images/dummyCreditCard.png')}}"/>--}}
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

    <div class="blackContainer" id="tambahAlamat">
        <div class="popUpTambahAlamat">
            <div class="title">
                <h1>Tambah Alamat</h1>
                <button id="closeTambahAlamat">
                    <img src="{{asset('images/close.png')}}"/>
                </button>
            </div>
            <form>
                <div class="section">
                    <h4>Kontak Penerima</h4>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Nama Lengkap</p>
                        <input type="text">
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Telepon</p>
                        <input type="text">
                    </div>
                </div>
                <div class="section">
                    <h4>Detail Alamat</h4>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Label Alamat</p>
                        <input type="text">
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Provinsi</p>
                        <select>
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kota/Kabupaten</p>
                        <select>
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kecamatan</p>
                        <select>
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kode Pos</p>
                        <select>
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect" style="align-items: flex-start;">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Alamat Lengkap</p>
                        <textarea></textarea>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Catatan Kurir</p>
                        <input type="text">
                    </div>
                </div>
                <div class="buttonSimpan">
                    <button type="submit">Simpan</button>
                </div>

            </form>

        </div>
    </div>

    <div class="blackContainer" id="tambahCreditDebit">
        <div class="popUpTambahCreditDebit">
            <div class="title">
                <h2>Tambah Kartu Kredit/Debit</h2>
                <button id="closeTambahCreditDebit">
                    <img src="{{asset('images/close.png')}}"/>
                </button>
            </div>
            <form>
                <div class="section">
                    <div class="sectionInput">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Nomor Kartu</p>
                        <input type="text">
                    </div>
                    <div class="sectionInput">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Masa Berlaku</p>
                        <input style="width: 20%;" type="text">
                        <p class="contentSemiNormal" style="color: #747474;margin: 0 5px">/</p>
                        <input style="width: 20%;" type="text">
                    </div>
                    <div class="sectionInput">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">CVV</p>
                        <input style="width: 20%;" type="text">
                    </div>
                </div>
                <div class="buttonSimpan">
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
