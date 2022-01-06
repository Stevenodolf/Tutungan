@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/wish/createWish.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="buatWish">
            <h2>Buat Wish</h2>
            <div class="section">
                <h4>Informasi Produk Wish</h4>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Nama Produk *</p>
                        <p class="contentSemiNormal" style="color: #747474;">Nama min. 5 kata yang terdiri dari jenis produk, merek, warna, dan keterangan lainnya.</p>
                    </div>
                    <input placeholder="" type="text">
                </div>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Kategori Produk *</p>
{{--                        <p class="contentSemiNormal" style="color: #747474;">Nama min. 5 kata yang terdiri dari jenis produk, merek, warna, dan keterangan lainnya.</p>--}}
                    </div>
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Deskripsi Produk *</p>
                        <p class="contentSemiNormal" style="color: #747474;">Deskripsi produk berisi informasi yang lebih detil
                            mengenai produk seperti fitur, spesifikasi, ukuran,
                            bahan, dan lainnya. Semakin rinci, maka semakin
                            berguna bagi calon kontributor lain untuk Wish
                            anda.</p>
                    </div>
                    <div style="width: 100%;margin-left: 30px;">
                        <div id="description"></div>
                    </div>
                </div>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Foto Produk *</p>
                        <p class="contentSemiNormal" style="color: #747474;">Ukuran gambar: maks. 10 MB
                            Format gambar: .JPG, .JPEG, .PNG Resolusi gambar: - Minimum 300x300 px
                            - Optimal 700x700 px</p>
                    </div>
                    <div style="margin-left: 30px;width: 100%">
                        <input type="file" id="fotoProduk"/>
                    </div>
                </div>
            </div>

            <div class="section">
                <h4>Detail Pembelian Produk Wish</h4>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Jenis Sumber Pembelian Produk *</p>
{{--                        <p class="contentSemiNormal" style="color: #747474;">Nama min. 5 kata yang terdiri dari jenis produk, merek, warna, dan keterangan lainnya.</p>--}}
                    </div>
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Link Sumber Pembelian Produk *</p>
                        <p class="contentSemiNormal" style="color: #747474;">Link pembelian produk berisi link website/olshop
                            dimana produk Wish-mu dapat kami belikan.
                            Pastikan link tersebut valid dan stok dari barang
                            tersebut tersedia. Apabila sumber pembelian
                            produk berupa akun sosial media, masukkan
                            link menuju profil akun sosial media tersebut.</p>
                    </div>
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Minimal Pembelian *</p>
                        <p class="contentSemiNormal" style="color: #747474;">Minimal pembelian yaitu target jumlah barang
                            yang ingin dicapai dari total kontribusi Wish.
                            Angka yang tertulis disini akan menjadi target
                            jumlah kontribusi Wish.</p>
                    </div>
                    <input placeholder="" type="text">
                </div>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Harga Satuan *</p>
                        <p class="contentSemiNormal" style="color: #747474;">Harga satuan yaitu harga per item apabila
                            minimal pembelian tercapai.</p>
                    </div>
                    <input placeholder="" type="text">
                </div>
                <div class="sectionInputSelect">
                    <div class="doubleText">
                        <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Jumlah Pembelian *</p>
                        <p class="contentSemiNormal" style="color: #747474;">Harga satuan yaitu harga per item apabila
                            minimal pembelian tercapai.</p>
                    </div>
                    <input placeholder="" type="text">
                </div>
            </div>

            <div class="notice">
                <img src="{{asset('images/notice.png')}}">
                <h5>Wish anda akan ditampilkan di website ini selama 7 hari (168 jam). Apabila setelah 7 hari target kontribusi Wish anda tercapai, maka Wish anda akan diproses sesuai prosedur.
                    Apabila tidak tercapai, maka Wish akan dibatalkan.</h5>
            </div>

            <div class="buttonKanan">
                <button class="batal">
                    <img src="{{asset('images/closeSmall.png')}}">
                    <p class="contentSemiBig">Batalkan</p>
                </button>
                <button class="simpan">
                    <img src="{{asset('images/checkBlack.png')}}">
                    <p class="contentSemiBig">Simpan</p>
                </button>
            </div>
        </div>
    </div>
@endsection
