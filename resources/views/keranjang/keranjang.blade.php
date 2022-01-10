@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/keranjang/keranjang.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="keranjang">
            <h1>Keranjang</h1>
            <div class="row">
                <form method="POST" action="/cart" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    <div class="columnA">
                        <div class="option">
                            <div class="pilihSemua">
                                <input type="checkbox" id="selectAll">
                                <p class="">Pilih Semua</p>
                            </div>
                            <p class="">Hapus</p>
                        </div>
                      @foreach ($cart_items as $cart_item)
                          <div class="keranjangDetail">
                          <input type="checkbox">
                          <div class="productDetail">
                              <div class="detail">
                                  <img src="{{asset($cart_item->getWishRelation->image)}}"/>
                                  <div class="section">
                                      <p class="">{{$cart_item->getWishRelation->name}} x {{$cart_item->qty}}</p>
                                      <p class="">Rp {{number_format($cart_item->total_price, 0, ',', '.')}}</p>
                                  </div>
                              </div>
                              <div class="deleteAdd" onclick="window.location='{{ url("/wish/delete-cart/".$cart_item->id)}}'">
                                  <button>
                                      <img src="{{asset('images/binRed.png')}}">
                                  </button>
                                  <input type="number">
                              </div>
                          </div>
                      </div>
                      @endforeach
                      {{-- <div class="keranjangDetail">
                          <input type="checkbox">
                          <div class="productDetail">
                              <div class="detail">
                                  <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                                  <div class="section">
                                      <p class="">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                      <p class="">Rp250.000</p>
                                    </div>
                                </div>
                                <div class="deleteAdd">
                                    <button>
                                        <img src="{{asset('images/binRed.png')}}">
                                    </button>
                                    <input type="number">
                                </div>
                            </div>
                        </div>
                        <div class="keranjangDetail">
                            <input type="checkbox">
                            <div class="productDetail">
                                <div class="detail">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                                    <div class="section">
                                        <p class="">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                        <p class="">Rp250.000</p>
                                    </div>
                                </div>
                                <div class="deleteAdd">
                                    <button>
                                        <img src="{{asset('images/binRed.png')}}">
                                    </button>
                                    <input type="number">
                                </div>
                            </div>
                        </div>
                        <div class="keranjangDetail">
                            <input type="checkbox">
                            <div class="productDetail">
                                <div class="detail">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                                    <div class="section">
                                        <p class="">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                        <p class="">Rp250.000</p>
                                    </div>
                                </div>
                                <div class="deleteAdd">
                                    <button>
                                        <img src="{{asset('images/binRed.png')}}">
                                    </button>
                                    <input type="number">
                                </div>
                            </div>
                        </div>
                        <div class="keranjangDetail">
                            <input type="checkbox">
                            <div class="productDetail">
                                <div class="detail">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                                    <div class="section">
                                        <p class="">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                        <p class="">Rp250.000</p>
                                    </div>
                                </div>
                                <div class="deleteAdd">
                                    <button>
                                        <img src="{{asset('images/binRed.png')}}">
                                    </button>
                                    <input type="number">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="columnB">
                        <div class="total">
                            <h2>Total</h2>
                            <p class="">Rp {{number_format($cart->total_price, 0, ',', '.')}}</p>
                            <input type="hidden" name="total_price" value="{{$cart->total_price}}">
                            <input type="hidden" name="total_qty" value="{{$cart->total_qty}}">
                            <button type="submit">Checkout</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="forYou">
                <h1>Terakhir Dilihat</h1>
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
        </div>
    </div>
@endsection
