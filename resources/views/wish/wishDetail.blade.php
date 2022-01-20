@extends('layouts.app')

@section('head')
    <script>
        var wishDetail = {deadline: "{{$wish_deadline}}"}
    </script>
    <script src="{{ asset('js/src/wish/wishDetail.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="wishDetail">
            <div class="leftSection">
                <div class="upperSection">
                    <div class="images">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper bigPicture">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($wish_image) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{asset('uploads/'.$image)}}"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper listPicture">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($wish_image) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{asset('uploads/'.$image)}}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="generalInfo">
                        <div class="upperInfo">
                            <p class="contentBig title">{{$wish_name}}</p>
                            <div class="requested">
                                <p class="contentSmall label">Requested by</p>
                                <p class="contentSmall name">{{$wish_created_by}}</p>
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p id="currentPro" class="contentBig textCurrentProgress">{{$wish_curr_qty}}</p>
                                    <p class="contentBig">/</p>
                                    <p id="targetPro" class="contentBig">{{$wish_target_qty}}</p>
                                </div>
                                <div class="progressBar"></div>
                            </div>
                        </div>
                        <div class="middleInfo">
                            <p class="price">Rp{{number_format($wish_price, 0, ',', '.')}}/box</p>
                        </div>
                        <div class="lowerInfo">
                            <div class="infoRow">
                                <p class="contentSemiNormal infoType">Ship From:</p>
                                <p class="contentSemiNormal infoDetail">{{$wish_origin}}</p>
                            </div>
                            <div class="infoRow">
                                <p class="contentSemiNormal infoType">Shipping to user:</p>
                                <div class="infoDetail shipping">
                                    <img class="imgShipping" src="{{asset('images/jne.png')}}">
                                    <img class="imgShipping" src="{{asset('images/posIndo.png')}}">
                                    <img class="imgShipping" src="{{asset('images/j&t.png')}}">
                                </div>
                            </div>
                            <div class="infoRow">
                                <p class="contentSemiNormal infoType">Protection</p>
                                <div class="contentSemiNormal infoDetail protection">
                                    <div class="protectionItem">
                                        <p class="protectionName">Trade Assurance</p>
                                        <img class="imgProtection" src="{{asset('images/informationYellow.png')}}">
                                    </div>
                                    <div class="protectionItem">
                                        <p class="protectionName">Refund Policy</p>
                                        <img class="imgProtection" src="{{asset('images/informationYellow.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="infoRow">
                                <p class="contentSemiNormal infoType">Website Origin:</p>
                                <p class="contentSemiNormal infoDetail">Open Link</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lowerSection">
                    <div class="contentBig title">
                        Product Detail
                    </div>
                    <div class="sectionContent">
                        {{$wish_detail}}
                    </div>
                </div>
            </div>
            <div class="rightSection">
                <div class="timeSection">
                    <p class="contentSemiNormal title">Sisa Waktu</p>
                    <div class="ticker">
                        <div class="tick" data-did-init="setupTickCountDown" data-credits="false">
                            <div data-repeat="true"
                                 data-layout="horizontal center fit"
                                 data-transform="preset(d, h, m, s) -> delay">
                                <div class="tick-group" data-layout="vertical right">
                                    <div data-key="label"
                                         data-view="text"
                                         class="tick-label"></div>
                                    <div data-key="value"
                                         data-repeat="true"
                                         data-transform="pad(00) -> split -> delay">
                                        <span data-view="flip"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="purchaseSection">
                    <p class="contentSemiNormal title">Atur Jumlah</p>
                    <form method="post" class="purchasing">
                        {{ csrf_field() }}
                        <input type="hidden" name="wish_id" value="{{$wish->id}}">
                        <div class="number-input">
                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                            <input class="quantity" min="1" max="{{$wish_stock}}" name="qty" value="1" type="number">
                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                        </div>
                        <p class="contentSmall stock">Stok: {{ $wish_stock }}</p>
                        <button class="button buttonYellow" type="submit" formaction="{{ url('/wish/'.$wish->id) }}">
                            <img src="{{ asset('images/shopping-cart-add.png' )}}">
                            Tambah ke Keranjang
                        </button>
                        <button class="button buttonBlack" type="submit" formaction="{{ url('/buy/'.$wish->id) }}">Beli Langsung</button>
                    </form>
                </div>
            </div>
        </div>





        <div class="forYou">
            <h1>For You</h1>
            @if($for_you == NULL)
                <div class="row">
                    <div class="column">
                        No Wish.
                    </div>
                </div>
            @else
                @foreach($for_you as $wish)
                    @php
                        $deadline = strtotime($wish->deadline);
                        $diff = $deadline - time();
                        $time_left = Round($diff / 86400);
                    @endphp
                    @if($loop->index == 0)
                        <div class="row">
                            @endif
                            @if(($loop->iteration-1) % 5 == 0 && $loop->index != 0)
                        </div>
                        @if(($loop->iteration-1) != ($loop->count-1))
                            <div class="row">
                                @endif
                                @endif
                                <div class="column">
                                    <div class="wish" onclick="window.location='{{ url("/wish/".$wish->id)}}'">
                                        {{--                                <img src="{{asset($wish->image[0])}}"/>--}}
                                        <img src="{{asset('uploads/'.json_decode($wish->image)[0])}}"/>
                                        <div class="timeLeft">
                                            <p>Tersisa {{$time_left}} Hari Lagi</p>
                                        </div>
                                        <div class="content">
                                            <p>{{Str::of($wish->name)->limit(40)}}</p>
                                            <h3>Rp {{number_format($wish->price, 0, ',', '.')}}/pcs</h3>
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
                            {{--                <div class="row">--}}
                            {{--                    @foreach($for_you as $wish)--}}
                            {{--                        @php--}}
                            {{--                            $deadline = strtotime($wish->deadline);--}}
                            {{--                            $diff = $deadline - time();--}}
                            {{--                            $time_left = Round($diff / 86400);--}}
                            {{--                        @endphp--}}
                            {{--                        <div class="column">--}}
                            {{--                            <div class="wish" onclick="window.location='{{ url("/wish/".$wish->id)}}'">--}}
                            {{--                                <img src="{{asset($wish->image)}}"/>--}}
                            {{--                                <div class="timeLeft">--}}
                            {{--                                    <p>Tersisa {{$time_left}} Hari Lagi</p>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="content">--}}
                            {{--                                    <p>{{$wish->name}}</p>--}}
                            {{--                                    <h3>Rp {{number_format($wish->price, 0, ',', '.')}}/pcs</h3>--}}
                            {{--                                    <div class="barWithText">--}}
                            {{--                                        <div class="textProgress">--}}
                            {{--                                            <p>{{$wish->curr_qty}}/{{$wish->target_qty}}</p>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="progressBar"></div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                    @endforeach--}}
                            {{--                </div>--}}
                            @endif
                            <!-- <div class="row">
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
        </div> -->




                            </div>
        </div>
    </div>
@endsection
