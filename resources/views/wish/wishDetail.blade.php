@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/wish/wishDetail.js') }}"></script>
@endsection

@section('content')
    <div class="wishDetail">
        <div class="row">
            <div class="column">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper bigPicture">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset('images/dummyProduct.jpeg')}}" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('images/dummyProduct.jpeg')}}" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('images/dummyProduct.jpeg')}}" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('images/dummyProduct.jpeg')}}" />
                        </div>
                    </div>
                </div>
                <div thumbsSlider="" class="swiper listPicture">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset('images/dummyProduct.jpeg')}}" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('images/dummyProduct.jpeg')}}" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('images/dummyProduct.jpeg')}}" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{asset('images/dummyProduct.jpeg')}}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="product">
                    <h3>{{$wish_name}}</h3>
                    <h5>Requested By {{$wish_created_by}}</h5>
                    <div class="barWithText">
                        <div class="textProgress">
                            <p>{{$wish_curr_qty}}/{{$wish_target_qty}}</p>
                        </div>
                        <div class="progressBar"></div>
                    </div>
                    <div class="price">
                        <h2>Rp{{$wish_price}}/box</h2>
                    </div>
                    <div class="information">
                        <div class="row" style="display: flex;align-items: center;">
                            <div class="columnA">
                                <h4>Ship From:</h4>
                            </div>
                            <div class="columnB">
                                <h4>{{$wish_origin}}</h4>
                            </div>
                        </div>
                        <div class="row" style="display: flex;align-items: center;flex-wrap: wrap;">
                            <div class="columnA">
                                <h4>Shipping to user:</h4>
                            </div>
                            <div class="columnB">
                                <img class="imgShip" src="{{asset('images/jne.png')}}">
                                <img class="imgShip" src="{{asset('images/posIndo.png')}}">
                                <img class="imgShip" src="{{asset('images/j&t.png')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="columnA">
                                <h4>Protection:</h4>
                            </div>
                            <div class="columnB" style="color: #F5D108;">
                                <h4 style="cursor: pointer">See detail here</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columnA">
                                <h4>Website Origin:</h4>
                            </div>
                            <div class="columnB">
                                <h4>https://www.tokopedia.com/maskerm-1
                                    /masker-medis-earloop-putih-m-4ply-surgical-mask-isi-50-pcs?
                                    src=topads</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column" style="display: flex;justify-content: center;">
                <div class="checkout">
                    <div class="variant">
                        <h2>Pilih Variant</h2>
                        <select>
                            <option value="" selected>Pilih Warna</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                        <select>
                            <option value="" selected>Pilih Ukuran</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="total">
                        <h2>Atur Jumlah</h2>
                        <div class="inputTotal">
                            <input type="number">
                            <p>Stok {{$wish_stock}}</p>
                        </div>
                        <p>Min. pembelian 5</p>
                    </div>
                    <div class="buttonCheckout">
                        <button class="addKeranjang">
                            <img class="plus" src="{{asset('images/plusBlack.png')}}"/>
                            <p>Keranjang</p>
                        </button>
                        <button class="buyNow">
                            <p>Beli Langsung</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="productDetail">
            <div class="title">
                <h2>Product Detail</h2>
            </div>
            <div class="content">
                {{--CONTOH AJA--}}
                <p>KEMENKES RI AKD 21603120593</p>
                <br>
                <br>
                <p>Warna Masker Putih</p>
                <br>
                <br>
                <p>Ukuran Masker : 17 x 9,5cm</p>
                <br>
                <br>
                <p>[1 Karton = 40 Box Masker]</p>
                <br>
                <br>
                <p>[1 Box = 50 Pcs Masker] - Harga tertera adalah harga untuk 1 Box</p>
                <br>
                <br>
                <p>Keunggulan:</p>
                <p>- Terdiri dari 4 lapisan masker, namun tetap nyaman dan mudah bernapas</p>
                <p>- Lapisan ke-3 terbuat dari meltblown atau Bacterial Filtration Efficiency</p>
                <p>- Bahan non-woven (tidak mudah menyerap air)</p>
                <p>- Model tali Earloop yang elastis serta kuat tidak mudah putus</p>
                <p>- Dapat digunakan untuk para tenaga medis</p>
                <p>- Kawat hidung yang dapat disesuaikan dan nyaman digunakan untuk waktu yang lama</p>
                <br>
                <br>
                <p>M+ Surgical Mask adalah masker medis yang memiliki 4 lapisan filtrasi yang efektif
                    menyaring Virus / Bakteri / Kuman, serta nyaman untuk penggunaan jangka waktu yang lama.
                </p>
                <br>
                <br>
                <p>Terbuat dari bahan non-woven sehingga tidak mudah menyerap air. Dilengkapi tali earloop
                    yang elastis serta kawat penyangga hidung yang fleksibel agar nyaman saat masker ini digunakan.</p>
                <br>
                <br>
                <p>Masker ini cocok untuk penggunaan kepada petugas medis maupun penggunaan
                    harian dengan perlindungan yang maksimal.</p>
                <br>
                <br>
                <p>Stay safe , be well with M+</p>
                {{--end of CONTOH AJA--}}
            </div>
        </div>
    </div>


    <div class="forYou">
        <h1>For You</h1>
        <div class="row">
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="wish">
                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                    <div class="timeLeft">
                        <p>Tersisa 5 Hari Lagi</p>
                    </div>
                    <div class="content">
                        <p>Laci lapis 3 warna biru merk lion star</p>
                        <h3>Rp 15.000/pcs</h3>
                        <div class="barWithText">
                            <div class="textProgress">
                                <p>7500/15000</p>
                            </div>
                            <div class="progressBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
