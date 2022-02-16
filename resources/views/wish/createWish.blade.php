@extends('layouts.app')

@section('head')
    <script src="{{ secure_asset('js/src/wish/createWish.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="buatWish">
            <h2 class="contentBig">Buat Wish</h2>
            <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="section">
                    <h4 class="contentSemiBig">Informasi Produk Wish</h4>
                    <div class="sectionInputSelect">
                        <div class="doubleText">
                            <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Nama Produk *</p>
                            <p class="contentSemiNormal" style="color: #747474;">Nama min. 5 kata yang terdiri dari jenis produk, merek, warna, dan keterangan lainnya.</p>
                        </div>
                        <input placeholder="" type="text" name="wishName" required>
                    </div>
                    <div class="sectionInputSelect">
                        <div class="doubleText">
                            <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Kategori Produk *</p>
                            {{--                        <p class="contentSemiNormal" style="color: #747474;">Nama min. 5 kata yang terdiri dari jenis produk, merek, warna, dan keterangan lainnya.</p>--}}
                        </div>
                        <select name="categoryId" required>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
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
                            <input type="hidden" id="quill_html" name="description"/>
                        </div>
                    </div>
                    <div class="sectionInputSelect">
                        <div class="doubleText">
                            <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Foto Produk *</p>
                            <p class="contentSemiNormal" style="color: #747474;">Ukuran gambar: maks. 10 MB</p>
                        </div>
                        <div style="margin-left: 30px;width: 100%">
                            <input type="file" name="wishPicture[]" id="wishPicture" required/>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <h4 class="contentSemiBig">Detail Pembelian Produk Wish</h4>
                    <div class="sectionInputSelect">
                        <div class="doubleText">
                            <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Asal Negara Produk*</p>
                            <p class="contentSemiNormal" style="color: #747474;">Asal negara produk yaitu asal negara dari mana
                                produk akan dikirimkan.</p>
                        </div>
                        <select name="origin" required>
                            @foreach ($origins as $origin)
                                <option value="{{$origin->id}}">{{$origin->name}}</option>
                            @endforeach
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
                        <input placeholder="" type="text" name="webLink" required>
                    </div>
                    <div class="sectionInputSelect">
                        <div class="doubleText">
                            <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Harga Satuan *</p>
                            <p class="contentSemiNormal" style="color: #747474;">Harga satuan yaitu harga per item apabila
                                minimal pembelian tercapai.</p>
                        </div>
                        <input placeholder="" type="number" min="100" name="price" required>
                    </div>
                    <div class="sectionInputSelect">
                        <div class="doubleText">
                            <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Target *</p>
                            <p class="contentSemiNormal" style="color: #747474;">Target yaitu jumlah barang yang ingin dicapai di wish yang akan anda buat.</p>
                        </div>
                        <input placeholder="" type="number" min="1" name="targetQty" required>
                    </div>
                    <div class="sectionInputSelect">
                        <div class="doubleText">
                            <p class="contentSemiNormal" style="color: #747474;font-weight: bold">Jumlah Pembelian *</p>
                            <p class="contentSemiNormal" style="color: #747474;">Jumlah pembelian yaitu jumlah minimal pembelian di wish yang akan anda buat.</p>
                        </div>
                        <input placeholder="" type="number" min="1" name="purchaseQty" required>
                    </div>
                </div>

                <div class="notice">
                    <img src="{{secure_asset('images/notice.png')}}">
                    <h5 class="contentSemiNormal">Proses verifikasi wish akan dilakukan maksimal 1x24 jam setelah Anda mengajukan pembuatan Wish.</h5>
                </div>

                <div class="notice">
                    <img src="{{secure_asset('images/notice.png')}}">
                    <h5 class="contentSemiNormal">Wish anda akan ditampilkan di website ini selama 7 hari (168 jam). Apabila setelah 7 hari target kontribusi Wish anda tercapai, maka Wish anda akan diproses sesuai prosedur.
                        Apabila tidak tercapai, maka Wish akan dibatalkan.</h5>
                </div>

                <div class="buttonKanan">
                    <a href="{{secure_url('/')}}" class="batal">
                        <img src="{{secure_asset('images/closeSmall.png')}}">
                        <p class="contentSemiBig">Batalkan</p>
                    </a>
                    <button class="simpan" type="submit">
                        <img src="{{secure_asset('images/checkBlack.png')}}">
                        <p class="contentSemiBig">Simpan</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
