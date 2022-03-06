@extends('layouts.app')

@section('head')
    <script>
        var wishDetail = {deadline: "{{$wish_deadline}}", description: "{{$wish_detail}}"};
    </script>
    <script src="{{ secure_asset('js/src/wish/wishDetail.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        {{-- Wish Detail --}}
        <div class="wishDetail">
            <div class="leftSection">
                <div class="upperSection">
                    <div class="images">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper bigPicture">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($wish_image) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{Storage::disk('s3')->url('uploads/'.$image)}}"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper listPicture">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($wish_image) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{Storage::disk('s3')->url('uploads/'.$image)}}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="generalInfo">
                        <div class="upperInfo">
                            <p class="contentBig title">{{$wish_name}}</p>
                            <div class="requested">
                                <p class="contentSmall label">Direquest oleh</p>
                                <p class="contentSmall name">{{$wish_created_by}}</p>
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p id="currentPro" class="contentBig textCurrentProgressYellow">{{$wish_curr_qty}}</p>
                                    <p class="contentBig">/</p>
                                    <p id="targetPro" class="contentBig">{{$wish_target_qty}}</p>
                                </div>
                                @php
                                    $currentPro = $wish->curr_qty;
                                    $targetPro = $wish->target_qty;
                                    $progress = ($currentPro/$targetPro)*100;
                                @endphp
                                <div class="barProgress totalBarYellow">
                                    <div class="currentBar currentBarYellow" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="middleInfo">
                            <p class="price">Rp{{number_format($wish_price, 0, ',', '.')}}/pcs</p>
                        </div>
                        <div class="lowerInfo">
                            <div class="infoRow">
                                <p class="contentSemiNormal infoType">Pengiriman Dari:</p>
                                <p class="contentSemiNormal infoDetail">{{$wish_origin}}</p>
                            </div>
                            <div class="infoRow">
                                <p class="contentSemiNormal infoType">Pilihan Kurir (IDN):</p>
                                <div class="infoDetail shipping">
                                    <img class="imgShipping" src="{{secure_asset('images/jne.png')}}">
                                    <img class="imgShipping" src="{{secure_asset('images/posIndo.png')}}">
                                    <img class="imgShipping" src="{{secure_asset('images/j&t.png')}}">
                                </div>
                            </div>
                            <div class="infoRow">
                                <p class="contentSemiNormal infoType">Proteksi</p>
                                <div class="contentSemiNormal infoDetail protection">
                                    <div class="protectionItem">
                                        <p class="protectionName">Asuransi</p>
                                        <img class="imgProtection" src="{{secure_asset('images/informationYellow.png')}}">
                                    </div>
                                    <div class="protectionItem">
                                        <p class="protectionName">Aturan Pengembalian Barang</p>
                                        <img class="imgProtection" src="{{secure_asset('images/informationYellow.png')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="infoRow">
                                <p class="contentSemiNormal infoType">Website Asal:</p>
                                <a href="{{ $wish->web_link }}" target="_blank" rel="noopener noreferrer" class="contentSemiNormal infoDetail">Buka Link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lowerSection">
                    <div class="contentBig title">
                        Detail Produk
                    </div>
                    <div id="wishDescription" class="contentSemiNormal sectionContent">
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
                            <input class="quantity" min="1" name="qty" value="1" type="number">
                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                        </div>
                        {{-- <p class="contentSmall stock">Stok: {{ $wish_stock }}</p> --}}
                        <button class="button buttonYellow" type="submit" formaction="{{ secure_url('/wish/'.$wish->id) }}">
                            <img src="{{ secure_asset('images/shopping-cart-add.png' )}}">
                            Tambah ke Keranjang
                        </button>
                        <button class="button buttonBlack" type="submit" formaction="{{ secure_url('/buy/'.$wish->id) }}">Beli Langsung</button>
                    </form>
                </div>
            </div>
        </div>


        {{-- For You --}}
        <div class="forYou">
            <h1 class="forYouTitle">For You</h1>
            @if($for_you == NULL)
                <div class="row">
                    <div class="column">
                        No Wish.
                    </div>
                </div>
            @else
                @php
                    $idx = 1;
                @endphp
                @foreach($for_you as $for_you_item)
                    @php
                        $deadline = strtotime($for_you_item->deadline);
                        $diff = $deadline - time();
                        $time_left = Round($diff / 86400);
                    @endphp
                    @if($loop->index == 0)
                        <div class="row">
                    @endif
                    @if(($loop->iteration-1) % 5 == 0 && $loop->index != 0)
                        </div>
                        <div class="row">
                    @endif
                                <div class="column">
                                    <div class="wish" onclick="window.location='{{ secure_url("/wish/".$for_you_item->id)}}'">
                                        <img src="{{Storage::disk('s3')->url('uploads/'.json_decode($for_you_item->image)[0])}}"/>
                                        <div class="contentNormal timeLeft">
                                            <p>Tersisa {{$time_left}} Hari Lagi</p>
                                        </div>
                                        <div class="content">
                                            <p class="contentSemiNormal">{{Str::of($for_you_item->name)->limit(40)}}</p>
                                            <h3 class="contentNormal">Rp {{number_format($for_you_item->price, 0, ',', '.')}}/pcs</h3>
                                            <div class="progressIndicator">
                                                <div class="textProgress">
                                                    <p class="contentSmall quantityTarget">{{$for_you_item->curr_qty}}/{{$for_you_item->target_qty}}</p>
                                                </div>
                                                @php
                                                    $currentPro = $for_you_item->curr_qty;
                                                    $targetPro = $for_you_item->target_qty;
                                                    $progress = ($currentPro/$targetPro)*100;
                                                @endphp
                                                <div class="barProgress totalBarYellow">
                                                    <div class="currentBar currentBarYellow" style="width: {{ $progress }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @php
                                $idx += 1;
                            @endphp
                            @endforeach
                            @endif
                            </div>
        </div>
    </div>
{{--    @php--}}
{{--        echo $wish->name;--}}
{{--    @endphp--}}
@endsection
