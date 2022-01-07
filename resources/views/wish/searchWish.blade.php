@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/wish/searchWish.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer" style="background: #F2F2F2;">
        <div class="cariWish">
            <div class="filter">
                <h3>Filter</h3>
                <div class="content">
                    <div class="section">
                        <h4>Kategori</h4>
                        <div class="subSection">
                            <div class="checkboxText">
                                <input type="checkbox">
                                <p class="contentNormal">Elektronik</p>
                            </div>
                            <div class="checkboxText">
                                <input type="checkbox">
                                <p class="contentNormal">Komputer dan Aksesoris</p>
                            </div>
                            <div class="checkboxText">
                                <input type="checkbox">
                                <p class="contentNormal">Handphone dan Aksesoris</p>
                            </div>
                            <div class="checkboxText">
                                <input type="checkbox">
                                <p class="contentNormal">Pakaian Pria</p>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h4>Harga</h4>
                        <div class="subSection">
                            <div class="textInput">
                                <p class="contentNormal">Min</p>
                                <input type="text" placeholder="Rp Harga Minimum">
                            </div>
                            <div class="textInput">
                                <p class="contentNormal">Maks</p>
                                <input type="text" placeholder="Rp Harga Maksimum">
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h4>Kekurangan Kontribusi</h4>
                        <div class="subSection">
                            <div class="textInput">
                                <p class="contentNormal">Min</p>
                                <input type="text" placeholder="Rp Harga Minimum">
                            </div>
                            <div class="textInput">
                                <p class="contentNormal">Maks</p>
                                <input type="text" placeholder="Rp Harga Maksimum">
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h4>Kategori</h4>
                        <div class="subSection">
                            <div class="checkboxText">
                                <input type="checkbox">
                                <p class="contentNormal"><1 hari</p>
                            </div>
                            <div class="checkboxText">
                                <input type="checkbox">
                                <p class="contentNormal">1-3 hari</p>
                            </div>
                            <div class="checkboxText">
                                <input type="checkbox">
                                <p class="contentNormal">4-7 hari</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hasilPencarian">
                <div class="topTab">
                    <div class="section">
                        <img src="{{asset("images/explore.png")}}">
                        <p class="contentNormal">Hasil pencarian untuk "<strong>sepatu</strong>"</p>
                    </div>
                    <div class="section">
                        <p class="contentNormal">Urutkan berdasarkan: </p>
                        <select>
                            <option>Harga Terendah</option>
                            <option>Harga Tertinggi</option>
                        </select>
                    </div>
                </div>
                <div class="hasil">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
