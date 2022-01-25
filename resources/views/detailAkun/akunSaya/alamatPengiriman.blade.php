@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <script>
        $("#wishSaya").css('color', '#000000');
        $("#transaksiSaya").css('color', '#000000');
        $("#notifikasi").css('color', '#000000');
        $("#profil").css('color', '#636363');
        $("#alamat").css('color', '#d5b81b');
        $("#kartu").css('color', '#636363');
        $("#ubahPass").css('color', '#636363');
    </script>

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
        @foreach($alamat as $alamats)
            <div class="alamatPengiriman">
                <div class="listAlamat">
                    <div class="titleWithEmblem">
                        <h3>{{$alamats->address_label}}</h3>
                        @if($alamats->is_main == '1')
                            <div class="emblem">
                                <p class="contentSemiNormal" style="color: white;">Utama</p>
                            </div>
                        @endif
                    </div>
                    <div class="keterangan">
                        <div class="section">
                            <div class="sectionText">
                                <p class="contentNormal" style="color: #636363;width: 150px">Nama Lengkap</p>
                                <p class="contentNormal">{{$alamats->fullname}}</p>
                            </div>
                            <div class="sectionText">
                                <p class="contentNormal" style="color: #636363;width: 150px">Telepon</p>
                                <p class="contentNormal" >{{$alamats->phone_number}}</p>
                            </div>
                            <div class="sectionText">
                                <p class="contentNormal" style="color: #636363;width: 150px">Alamat</p>
                                <p class="contentNormal" style="width: 250px">{{$alamats->address_detail}}</p>
                            </div>
                        </div>
                        @if($alamats->is_temp == '1')
                            <div class="section">
                                <img src="{{asset('images/checkmarkYellow.png')}}"/>
                            </div>
                        @else
                            <form class="section" method="POST" action="{{url('/akunSaya/postTempAlamatPengiriman')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$alamats->id}}">
                                <button type="submit">Pilih</button>
                            </form>
                        @endif

                    </div>
                    <form class="buttonBawah" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$alamats->id}}">
                        <button type="button" onclick="popupUbahAlamat({{$alamats->id}});">Ubah</button>
                        <button type="submit" formaction="{{url('/akunSaya/hapusAlamatPengiriman')}}">Hapus</button>
                        @if($alamats->is_main != '1')
                            <button type="submit" formaction="{{url('/akunSaya/postUtamaAlamatPengiriman') }}">Atur Sebagai Alamat Utama</button>
                        @endif

                    </form>
                </div>
            </div>
        @endforeach

{{--        <div class="alamatPengiriman">--}}
{{--            <div class="listAlamat">--}}
{{--                <div class="titleWithEmblem">--}}
{{--                    <h3>Dormitory</h3>--}}
{{--                </div>--}}
{{--                <div class="keterangan">--}}
{{--                    <div class="section">--}}
{{--                        <div class="sectionText">--}}
{{--                            <p class="contentNormal" style="color: #636363;width: 150px">Nama Lengkap</p>--}}
{{--                            <p class="contentNormal">Steven Yuwono</p>--}}
{{--                        </div>--}}
{{--                        <div class="sectionText">--}}
{{--                            <p class="contentNormal" style="color: #636363;width: 150px">Telepon</p>--}}
{{--                            <p class="contentNormal" >62812345678</p>--}}
{{--                        </div>--}}
{{--                        <div class="sectionText">--}}
{{--                            <p class="contentNormal" style="color: #636363;width: 150px">Alamat</p>--}}
{{--                            <p class="contentNormal" style="width: 250px">Jl. Ir. Soekarno No. 69, RT 04 RW 20 Kota Surakarta - Pasar Kliwon Jawa Tengah 57752</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="section">--}}
{{--                        <button>Pilih</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="buttonBawah">--}}
{{--                    <button>Ubah</button>--}}
{{--                    <button>Hapus</button>--}}
{{--                    <button>Atur Sebagai Alamat Utama</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div class="blackContainer" id="tambahAlamat">
        <div class="popUpTambahAlamat">
            <div class="title">
                <h1>Tambah Alamat</h1>
                <button id="closeTambahAlamat">
                    <img src="{{asset('images/close.png')}}"/>
                </button>
            </div>
            <form method="post" action="{{'/akunSaya/postAlamatPengiriman'}}">
                {{ csrf_field() }}
                <div class="section">
                    <h4>Kontak Penerima</h4>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Nama Lengkap</p>
                        <input type="text" name="fullname">
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Telepon</p>
                        <input type="text" name="phoneNumber">
                    </div>
                </div>
                <div class="section">
                    <h4>Detail Alamat</h4>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Label Alamat</p>
                        <input type="text" name="labelAlamat">
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Provinsi</p>
                        <select id="provinsi" name="provinsi">
                            <option value="">Pilih Provinsi</option>
                            @foreach($provinsi as $provinsis)
                                <option value="{{$provinsis->id}}">{{$provinsis->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kota/Kabupaten</p>
                        <select id="kota" name="kota">
                            <option value="">Pilih Kota/Kabupaten</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kecamatan</p>
                        <select id="kecamatan" name="kecamatan">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kode Pos</p>
                        <input type="text" name="kodePos">
                    </div>
                    <div class="sectionInputSelect" style="align-items: flex-start;">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Alamat Lengkap</p>
                        <textarea name="detilAlamat"></textarea>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Catatan Kurir</p>
                        <input type="text" name="note">
                    </div>
                </div>
                <div class="buttonSimpan">
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="blackContainer" id="ubahAlamat">
        <div class="popUpTambahAlamat">
            <div class="title">
                <h1>Ubah Alamat</h1>
                <button id="closeUbahAlamat">
                    <img src="{{asset('images/close.png')}}"/>
                </button>
            </div>
            <form method="post" action="{{'/akunSaya/postUbahAlamatPengiriman'}}">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="ubahId" value="">
                <div class="section">
                    <h4>Kontak Penerima</h4>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Nama Lengkap</p>
                        <input type="text" name="ubahFullname" id="ubahFullname">
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Telepon</p>
                        <input type="text" name="ubahPhoneNumber" id="ubahPhoneNumber">
                    </div>
                </div>
                <div class="section">
                    <h4>Detail Alamat</h4>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Label Alamat</p>
                        <input type="text" name="ubahLabelAlamat" id="ubahLabelAlamat">
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Provinsi</p>
                        <select id="ubahProvinsi" name="ubahProvinsi">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kota/Kabupaten</p>
                        <select id="ubahKota" name="ubahKota">
                            <option value="">Pilih Kota/Kabupaten</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kecamatan</p>
                        <select id="ubahKecamatan" name="ubahKecamatan">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Kode Pos</p>
                        <input type="text" name="ubahKodePos" id="ubahKodePos">
                    </div>
                    <div class="sectionInputSelect" style="align-items: flex-start;">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Alamat Lengkap</p>
                        <textarea name="ubahDetilAlamat" id="ubahDetilAlamat"></textarea>
                    </div>
                    <div class="sectionInputSelect">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Catatan Kurir</p>
                        <input type="text" name="ubahNote" id="ubahNote">
                    </div>
                </div>
                <div class="buttonSimpan">
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
