@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/home/home.js') }}"></script>
@endsection

@section('content')

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
        <div class="banner">
            <img src="{{asset('images/lastMinute.png')}}"/>
        </div>

        <div class="lastMinute">
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
                </div>
            </div>
        </div>
    </div>

    <div class="category">
        <div class="swiper categorySwipe">
            <div class="swiper-wrapper">
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
                </div>
            </div>
            <div class="swiper-button-next nextCategory"></div>
            <div class="swiper-button-prev prevCategory"></div>
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
