@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/wish/searchWish.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer" style="background: #F2F2F2;">
        <div class="cariWish">
            <form method="GET" action="" id="filter">
                <div class="filter">
                    <h3>Filter</h3>
                    <div class="content">
                        <div class="section">
                            <h4>Kategori</h4>
                            <div class="subSection">
                                @foreach ($categories as $category)
                                    <div class="checkboxText">
                                        @if(!empty($active_cat))
                                            <input type="checkbox" name="category[]" value="{{$category->id}}" <?php if(in_array($category->id, $active_cat)) echo 'checked="checked"'; ?>>
                                        @else
                                            <input type="checkbox" name="category[]" value="{{$category->id}}">
                                        @endif
                                        <p class="contentNormal">{{$category->name}}</p>
                                    </div>
{{--                                    @if ($category->id == $active_cat)--}}
{{--                                        <div class="checkboxText">--}}
{{--                                            <input type="hidden" name="category" value="{{$category->id}}">--}}
{{--                                            <p class="contentNormal" onclick="document.getElementById('filter').submit();" style="font-weight: bold;">{{$category->name}}</p>--}}
{{--                                        </div>--}}
{{--                                    @else--}}
{{--                                        <div class="checkboxText">--}}
{{--                                            <input type="hidden" name="category" value="{{$category->id}}">--}}
{{--                                            <p class="contentNormal"  onclick="document.getElementById('filter').submit();">{{$category->name}}</p>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
                                @endforeach
                            </div>
                        </div>
                        <div class="section">
                            <h4>Harga</h4>
                            <div class="subSection">
                                <div class="textInput">
                                    <p class="contentNormal">Min</p>
                                    <input type="number" name="min" placeholder="Rp Harga Minimum" value="{{$curr_min}}">
                                </div>
                                <div class="textInput">
                                    <p class="contentNormal">Maks</p>
                                    <input type="number" name="maks" placeholder="Rp Harga Maksimum" value="{{$curr_maks}}">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="section">
                            <h4>Kekurangan Kontribusi</h4>
                            <div class="subSection">
                                <div class="textInput">
                                    <p class="contentNormal">Min</p>
                                    <input type="number" name="kurang_min" placeholder="Minimal Kontribusi">
                                </div>
                                <div class="textInput">
                                    <p class="contentNormal">Maks</p>
                                    <input type="number" name="kurang_maks" placeholder="Maksimal Kontribusi">
                                </div>
                            </div>
                        </div> --}}
                        <div class="section">
                           <h4>Tenggat Waktu</h4>
                           <div class="subSection">
                               <div class="checkboxText">
                                   <input type="radio" name="deadline" value="1">
                                   <p class="contentNormal">< 1 hari</p>
                               </div>
                               <div class="checkboxText">
                                   <input type="radio" name="deadline" value="2">
                                   <p class="contentNormal">1-3 hari</p>
                               </div>
                               <div class="checkboxText">
                                   <input type="radio" name="deadline" value="3">
                                   <p class="contentNormal">4-7 hari</p>
                               </div>
                           </div>
                       </div>
                        <input type="hidden" value="{{$search}}" name="search">
                    </div>
                    <button type="submit" class="button buttonYellow">Apply</button>
                </div>
            </form>

            <div class="hasilPencarian">
                <form method="GET" action="" id="sort">
                    <div class="topTab">
                        <div class="section">
                            <img src="{{asset("images/explore.png")}}">
                            <p class="contentNormal">Hasil pencarian untuk "<strong>{{$search}}</strong>"</p>
                        </div>
                        <div class="section">
                            <p class="contentNormal">Urutkan berdasarkan: </p>
                            <select name="sort" onchange="document.getElementById('sort').submit();">
                                @if ($is_min == 0)
                                    <option value="2">Harga Tertinggi</option>
                                    <option value="1">Harga Terendah</option>
                                @else
                                    <option value="1">Harga Terendah</option>
                                    <option value="2">Harga Tertinggi</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="search" value="{{$search}}">
                    <input type="submit" style="display: none">
                </form>
                <div class="hasil">
                    @if($wishes == NULL OR $wishes->isEmpty())
                        <div class="row">
                            <div class="column">
                                No Wish.
                            </div>
                        </div>
                    @else
                        @foreach($wishes as $wish)
                            @php
                                $deadline = strtotime($wish->deadline);
                                $diff = $deadline - time();
                                $time_left = Round($diff / 86400);
                            @endphp
                            @if($loop->index == 0)
                                <div class="row">
                            @endif
                            @if(($loop->iteration-1) % 4 == 0 && $loop->index != 0)
                                </div>
                                <div class="row">
                            @endif
                            <div class="column">
                                <div class="wish" onclick="window.location='{{ url("/wish/".$wish->id)}}'">
                                    <img src="{{asset('uploads/'.json_decode($wish->image)[0])}}"/>
                                    <div class="timeLeft">
                                        <p>Tersisa {{$time_left}} Hari Lagi</p>
                                    </div>
                                    <div class="content">
                                        <p>{{Str::of($wish->name)->limit(40)}}</p>
                                        <h3>Rp {{number_format($wish->price, 0, ',', '.')}}/pcs</h3>
                                        <div class="progressIndicator">
                                            <div class="textProgress">
                                                <p>{{$wish->curr_qty}}/{{$wish->target_qty}}</p>
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
                                </div>
                            </div>
                        @endforeach
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
