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
                            <img src="{{asset($wish_image)}}" />
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
                                <h4>{{$wish_web_link}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($auth)
                <div class="column" style="display: flex;justify-content: center;">
                    <div class="checkout">
                        <form method="POST" action="/wish/{{$wish->id}}" enctype="multipart/form-data">
                            @csrf
                            {{ csrf_field() }}

                            <div class="variant">
                                <input type="hidden" id="wish_id" name="wish_id" value="{{$wish->id}}">
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
                                    <input type="number" id="qty" name="qty">
                                    <p>Stok {{$wish_stock}}</p>
                                </div>
                                <p>Min. pembelian {{$wish_min_order}}</p>
                            </div>
                            @if($errors->any())
                                <div style="color:red" role="alert">
                                    <strong> {{$errors->first()}}</strong>
                                </div>
                            @endif
                            <div class="buttonCheckout">
                                <button class="addKeranjang" type="submit" action={{ url('/wish/add-to-cart')}}>
                                    <img class="plus" src="{{asset('images/plusBlack.png')}}"/>
                                    <p>Keranjang</p>
                                </button>
                                <button class="buyNow">
                                    <p>Beli Langsung</p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        <div class="productDetail">
            <div class="title">
                <h2>Product Detail</h2>
            </div>
            <div class="content">
                {{$wish_detail}}
            </div>
        </div>
    </div>


    <div class="forYou">
        <h1>For You</h1>
        @if($for_you == NULL)
            <div class="column">
                No Wish.
            </div>
        @else
            <div class="row">
                @foreach($for_you as $wish)
                    @php
                        $deadline = strtotime($wish->deadline);
                        $diff = $deadline - time();
                        $time_left = Round($diff / 86400);
                    @endphp
                    <div class="column">
                        <div class="wish" onclick="window.location='{{ url("/wish/".$wish->id)}}'">
                            <img src="{{asset($wish->image)}}"/>
                            <div class="timeLeft">
                                <p>Tersisa {{$time_left}} Hari Lagi</p>
                            </div>
                            <div class="content">
                                <p>{{$wish->name}}</p>
                                <h3>Rp {{$wish->price}}/pcs</h3>
                                <div class="barWithText">
                                    <div class="textProgress">
                                        <p>{{$wish->curr_qty}}/{{$wish->target_qty}}</p>
                                    </div>
                                    <div class="progressBar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        {{-- <div class="row">
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
        </div> --}}




    </div>
@endsection
