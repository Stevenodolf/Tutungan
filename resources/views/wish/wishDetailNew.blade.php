@extends('layouts.app')

@section('head')
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
                                    <p class="contentBig textCurrentProgress">{{$wish_curr_qty}}</p>
                                    <p class="contentBig">/</p>
                                    <p class="contentBig">{{$wish_target_qty}}</p>
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
                        <div class="tick"
                             data-value="Hello World">

                            <span data-view="flip"></span>

                        </div>
                    </div>
                </div>
                <div class="purchaseSection">

                </div>
            </div>
        </div>
    </div>
@endsection
