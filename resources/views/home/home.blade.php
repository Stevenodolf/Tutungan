@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/home/home.js') }}"></script>
@endsection

@section('content')

    <div class="contentContainer">
        <div class="homeCarousel">
            <div class="swiper-container">
                <!-- swiper slides -->
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{asset('images/dummySlide1.png')}}"/>
                    </div>

                    <div class="swiper-slide">
                        <img src="{{asset('images/dummySlide2.png')}}"/>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="lastMinuteSection">
{{--            <div class="banner">--}}
{{--                <img src="{{asset('images/lastMinute.png')}}"/>--}}
{{--            </div>--}}

            <div class="lastMinute" style="background-image: url({{asset('images/lastMinute.png')}})">
                <div class="listWish">
                    <div class="swiper lastMinuteSwipe">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="wish">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}">
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
                            <div class="swiper-slide">
                                <div class="wish">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}">
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
                            <div class="swiper-slide">
                                <div class="wish">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}">
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
                            <div class="swiper-slide">
                                <div class="wish">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}">
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
                            <div class="swiper-slide">
                                <div class="wish">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}">
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
                            <div class="swiper-slide">
                                <div class="wish">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}">
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
                            <div class="swiper-slide">
                                <div class="wish">
                                    <img src="{{asset('images/dummyProduct.jpeg')}}">
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
                            <div class="swiper-slide">
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
                            <div class="swiper-slide">
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
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="category">

            <div class="swiper categorySwipe">
                <div class="swiper-wrapper">
                    @foreach($categories as $category)
                        <div class="swiper-slide">
                            <div class="filter">
                                <img class="imgFilter" src="{{asset($category->image)}}" alt="">
                                <p class="contentNormal">{{$category->name}}</p>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/fashion.png')}}"/>
                            <p>Fashion</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/appliance.png')}}"/>
                            <p>Appliance</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/beauty.png')}}"/>
                            <p>Beauty</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/toysgame.png')}}"/>
                            <p>Toys & Games</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/healthcare.png')}}"/>
                            <p>Health & Personal Care</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/computer.png')}}"/>
                            <p>Computer & Video Games</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/book.png')}}"/>
                            <p>Books</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/fashion.png')}}"/>
                            <p>Fashion</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/appliance.png')}}"/>
                            <p>Appliance</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/beauty.png')}}"/>
                            <p>Beauty</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/toysgame.png')}}"/>
                            <p>Toys & Games</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/healthcare.png')}}"/>
                            <p>Health & Personal Care</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/computer.png')}}"/>
                            <p>Computer & Video Games</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="filter">
                            <img class="imgFilter" src="{{asset('images/book.png')}}"/>
                            <p>Books</p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="swiper-button-prev prevCategory"></div>
            <div class="swiper-button-next nextCategory"></div>
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
                            <div class="wish" onclick="window.location='{{ url("/wish/".$for_you_item->id)}}'">
                                <img src="{{asset('uploads/'.json_decode($for_you_item->image)[0])}}"/>
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
                @endforeach
        @endif
        </div>
    </div>

@endsection
