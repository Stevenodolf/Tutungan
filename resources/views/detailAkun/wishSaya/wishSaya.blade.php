@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <script>
        $("#wishSaya").css('color', '#d5b81b');
        $("#transaksiSaya").css('color', '#000000');
        $("#notifikasi").css('color', '#000000');
        $("#profil").css('color', '#636363');
        $("#alamat").css('color', '#636363');
        $("#kartu").css('color', '#636363');
        $("#ubahPass").css('color', '#636363');
    </script>

    <div class="contentV2">
        <div class="filterSection">
            <div class="upperSection">
                {{ csrf_field() }}
                <form id="filter0" class="filter" method="get" action="{{ route('getWishSaya') }}">
                    <input type="hidden" name="filter" value="0">
                    <button type="submit" class="contentSemiBig filterContent">Semua</button>
                </form>
                <form id="filter1" class="filter" method="get" action="{{ route('getWishSaya') }}">
                    <input type="hidden" name="filter" value="1">
                    <button type="submit" class="contentSemiBig filterContent">Menunggu Verifikasi</button>
                </form>
                <form id="filter2" class="filter" method="get" action="{{ route('getWishSaya') }}">
                    <input type="hidden" name="filter" value="2">
                    <button type="submit" class="contentSemiBig filterContent">Menunggu Pembayaran</button>
                </form>
                <form id="filter3" class="filter" method="get" action="{{ route('getWishSaya') }}">
                    <input type="hidden" name="filter" value="3">
                    <button type="submit" class="contentSemiBig filterContent">Sedang Berjalan</button>
                </form>
                <form id="filter4" class="filter" method="get" action="{{ route('getWishSaya') }}">
                    <input type="hidden" name="filter" value="4">
                    <button type="submit" class="contentSemiBig filterContent">Diproses</button>
                </form>
                <form id="filter5" class="filter" method="get" action="{{ route('getWishSaya') }}">
                    <input type="hidden" name="filter" value="5">
                    <button type="submit" class="contentSemiBig filterContent">Selesai</button>
                </form>
                <form id="filter6" class="filter" method="get" action="{{ route('getWishSaya') }}">
                    <input type="hidden" name="filter" value="6">
                    <button type="submit" class="contentSemiBig filterContent">Dibatalkan</button>
                </form>
                <script>
                    $("#filter" + {{ $filter }}).css('border-top-color', '#d5b81b');
                </script>
            </div>
            <div class="lowerSection">
                <form class="searchbar">
                    <input type="text" placeholder="Cari Wish yang kamu buat di sini">
                    <button><img src="{{asset('images/search.png')}}"></button>
                </form>
            </div>
        </div>
        <div class="wishSection">
            @php
                $idx = 1;
            @endphp
            @foreach($wishes as $wish)
                <div class="wishCell">
                    <div class="wishCellContent">
                    <div class="header">
                        <p class="contentSmall textWishMaker">Oleh: {{ $wish->getCreatedByRelation->username }}</p>
                        @if($wish->status_wish_id >= 3)
                            <p class="contentSmall"><span id="approved{{ $idx }}"></span> - <span id="deadline{{ $idx }}"></span></p>
                            <script>
                                var approvedDate = "{{ $wish->approved_at }}";
                                approvedDate = approvedDate.replace(/\s/g, 'T');
                                var deadlineDate = "{{ $wish->deadline }}";
                                deadlineDate = deadlineDate.replace(/\s/g, 'T');
                                document.getElementById("approved" + {{ $idx }}).innerHTML = moment(approvedDate).format('DD MMM YYYY');
                                document.getElementById("deadline" + {{ $idx }}).innerHTML = moment(deadlineDate).format('DD MMM YYYY');
                            </script>
                        @endif
                        @if($wish->status_wish_id == 5)
                            <p class="statusGreen">{{ $wish->getStatusWishRelation->name }}</p>
                        @elseif($wish->status_wish_id == 6)
                            <p class="statusRed">{{ $wish->getStatusWishRelation->name }}</p>
                        @else
                            <p class="statusYellow">{{ $wish->getStatusWishRelation->name }}</p>
                        @endif
                    </div>
                    <div class="detail">
                        <a href="wish/{{ $wish->id }}"><img src="{{asset('uploads/'.json_decode($wish->image)[0])}}" /></a>
                        <div class="detailContent">
                            <div class="wishInfo">
                                <a href="wish/{{ $wish->id }}"><p class="contentSemiNormal wishName">{{ $wish->name }}</p></a>
                                @if($wish->status_wish_id <= 2)
                                    <p class="contentSmall">Pesanan anda: {{ $wish->curr_qty }} item</p> {{-- Harusnya menampilkan jumlah pesanan sesuai transaksi--}}
                                @else
                                    @php
                                        $user_order = 0;
                                    @endphp
                                    @foreach($transactions as $transaction)
                                        @php
                                            if($transaction->wish_id == $wish->id){
                                                $user_order += $transaction->qty;
                                            }
                                        @endphp
                                    @endforeach
                                    <p class="contentSmall">Pesanan anda: {{ $user_order }} item</p> {{-- Harusnya menampilkan jumlah pesanan sesuai transaksi--}}
                                @endif
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    @if($wish->status_wish_id == 5)
                                        <p id="currentPro{{ $idx }}" class="contentBig textCurrentProgressGreen">{{ $wish->curr_qty }}</p>
                                    @elseif($wish->status_wish_id == 6)
                                        <p id="currentPro{{ $idx }}" class="contentBig textCurrentProgressRed">{{ $wish->curr_qty }}</p>
                                    @else
                                        <p id="currentPro{{ $idx }}" class="contentBig textCurrentProgressYellow">{{ $wish->curr_qty }}</p>
                                    @endif
                                    <p class="contentBig">/</p>
                                    <p id="targetPro{{ $idx }}" class="contentBig">{{ $wish->target_qty }}</p>
                                </div>
                                @php
                                    $currentPro = $wish->curr_qty;
                                    $targetPro = $wish->target_qty;
                                    $progress = ($currentPro/$targetPro)*100;
                                @endphp
                                @if($wish->status_wish_id == 5)
                                    <div class="barProgress totalBarGreen">
                                        <div class="currentBar currentBarGreen" style="width: {{ $progress }}%"></div>
                                    </div>
                                @elseif($wish->status_wish_id == 6)
                                    <div class="barProgress totalBarRed">
                                        <div class="currentBar currentBarRed" style="width: {{ $progress }}%"></div>
                                    </div>
                                @else
                                    <div class="barProgress totalBarYellow">
                                        <div class="currentBar currentBarYellow" style="width: {{ $progress }}%"></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        @if($wish->status_wish_id == 2)
                            <form method="post" action="{{ url("/buy/".$wish->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="wish_id" value="{{$wish->id}}">
                                <input type="hidden" name="qty" value="{{$wish->curr_qty}}">
                                <button type="submit" id="buttonBayar" class="button buttonWhiteGreen">Bayar</button>
                            </form>
                        @elseif($wish->status_wish_id == 3)
                            <a href="/wish/{{ $wish->id }}" class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</a>
                        @endif
                    </div>
                </div>
            </div>
                @php
                    $idx += 1;
                @endphp
            @endforeach

{{--            <div class="wishCell">--}}
{{--                <div class="wishCellContent">--}}
{{--                    <div class="header">--}}
{{--                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>--}}
{{--                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>--}}
{{--                        <p class="statusYellow">Menunggu Verifikasi</p>--}}
{{--                    </div>--}}
{{--                    <div class="detail">--}}
{{--                        <img src="{{asset('images/wish/wish1.jpg')}}" />--}}
{{--                        <div class="detailContent">--}}
{{--                            <div class="wishInfo">--}}
{{--                                <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>--}}
{{--                                <p class="contentSmall">Pesanan anda: 20 item</p>--}}
{{--                            </div>--}}
{{--                            <div class="progressIndicator">--}}
{{--                                <p class="contentSmall">Kontribusi Wish</p>--}}
{{--                                <div class="progressNumber">--}}
{{--                                    <p class="contentBig textCurrentProgress">20</p>--}}
{{--                                    <p class="contentBig">/</p>--}}
{{--                                    <p class="contentBig">100</p>--}}
{{--                                </div>--}}
{{--                                <div class="barProgress">--}}
{{--                                    <div class="currentBar"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>--}}
{{--                        <p class="contentSemiBig separator">|</p>--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="wishCell">--}}
{{--                <div class="wishCellContent">--}}
{{--                    <div class="header">--}}
{{--                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>--}}
{{--                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>--}}
{{--                        <p class="statusYellow">Menunggu Pembayaran</p>--}}
{{--                    </div>--}}
{{--                    <div class="detail">--}}
{{--                        <img src="{{asset('images/wish/wish2.jpg')}}" />--}}
{{--                        <div class="detailContent">--}}
{{--                            <div class="wishInfo">--}}
{{--                                <p class="contentSemiNormal">Celana Panjang Pria Murah</p>--}}
{{--                                <p class="contentSmall">Pesanan anda: 500 item</p>--}}
{{--                            </div>--}}
{{--                            <div class="progressIndicator">--}}
{{--                                <p class="contentSmall">Kontribusi Wish</p>--}}
{{--                                <div class="progressNumber">--}}
{{--                                    <p class="contentBig textCurrentProgress">500</p>--}}
{{--                                    <p class="contentBig">/</p>--}}
{{--                                    <p class="contentBig">1000</p>--}}
{{--                                </div>--}}
{{--                                <div class="barProgress">--}}
{{--                                    <div class="currentBar" style="width: 50%"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>--}}
{{--                        <p class="contentSemiBig separator">|</p>--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="wishCell">--}}
{{--                <div class="wishCellContent">--}}
{{--                    <div class="header">--}}
{{--                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>--}}
{{--                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>--}}
{{--                        <p class="statusYellow">Sedang Berjalan</p>--}}
{{--                    </div>--}}
{{--                    <div class="detail">--}}
{{--                        <img src="{{asset('images/wish/wish3.jpg')}}" />--}}
{{--                        <div class="detailContent">--}}
{{--                            <div class="wishInfo">--}}
{{--                                <p class="contentSemiNormal">Piring Cina Putih Ringan Murah</p>--}}
{{--                                <p class="contentSmall">Pesanan anda: 50 item</p>--}}
{{--                            </div>--}}
{{--                            <div class="progressIndicator">--}}
{{--                                <p class="contentSmall">Kontribusi Wish</p>--}}
{{--                                <div class="progressNumber">--}}
{{--                                    <p class="contentBig textCurrentProgress">150</p>--}}
{{--                                    <p class="contentBig">/</p>--}}
{{--                                    <p class="contentBig">200</p>--}}
{{--                                </div>--}}
{{--                                <div class="barProgress">--}}
{{--                                    <div class="currentBar" style="width: 75%"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>--}}
{{--                        <p class="contentSemiBig separator">|</p>--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="wishCell">--}}
{{--                <div class="wishCellContent">--}}
{{--                    <div class="header">--}}
{{--                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>--}}
{{--                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>--}}
{{--                        <p class="statusYellow">Diproses</p>--}}
{{--                    </div>--}}
{{--                    <div class="detail">--}}
{{--                        <img src="{{asset('images/wish/wish3.jpg')}}" />--}}
{{--                        <div class="detailContent">--}}
{{--                            <div class="wishInfo">--}}
{{--                                <p class="contentSemiNormal">Piring Cina Putih Ringan Murah</p>--}}
{{--                                <p class="contentSmall">Pesanan anda: 50 item</p>--}}
{{--                            </div>--}}
{{--                            <div class="progressIndicator">--}}
{{--                                <p class="contentSmall">Kontribusi Wish</p>--}}
{{--                                <div class="progressNumber">--}}
{{--                                    <p class="contentBig textCurrentProgress">200</p>--}}
{{--                                    <p class="contentBig">/</p>--}}
{{--                                    <p class="contentBig">200</p>--}}
{{--                                </div>--}}
{{--                                <div class="barProgress">--}}
{{--                                    <div class="currentBar" style="width: 100%; color: #57B793"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>--}}
{{--                        <p class="contentSemiBig separator">|</p>--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="wishCell">--}}
{{--                <div class="wishCellContent">--}}
{{--                    <div class="header">--}}
{{--                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>--}}
{{--                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>--}}
{{--                        <p class="statusGreen">Selesai</p>--}}
{{--                    </div>--}}
{{--                    <div class="detail">--}}
{{--                        <img src="{{asset('images/wish/wish3.jpg')}}" />--}}
{{--                        <div class="detailContent">--}}
{{--                            <div class="wishInfo">--}}
{{--                                <p class="contentSemiNormal">Piring Cina Putih Ringan Murah</p>--}}
{{--                                <p class="contentSmall">Pesanan anda: 50 item</p>--}}
{{--                            </div>--}}
{{--                            <div class="progressIndicator">--}}
{{--                                <p class="contentSmall">Kontribusi Wish</p>--}}
{{--                                <div class="progressNumber">--}}
{{--                                    <p class="contentBig textCurrentProgress" style="color: #57B793">200</p>--}}
{{--                                    <p class="contentBig">/</p>--}}
{{--                                    <p class="contentBig">200</p>--}}
{{--                                </div>--}}
{{--                                <div class="barProgress">--}}
{{--                                    <div class="currentBar" style="width: 100%; background: #57B793"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>--}}
{{--                        <p class="contentSemiBig separator">|</p>--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="wishCell">--}}
{{--                <div class="wishCellContent">--}}
{{--                    <div class="header">--}}
{{--                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>--}}
{{--                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>--}}
{{--                        <p class="statusRed">Dibatalkan</p>--}}
{{--                    </div>--}}
{{--                    <div class="detail">--}}
{{--                        <img src="{{asset('images/wish/wish3.jpg')}}" />--}}
{{--                        <div class="detailContent">--}}
{{--                            <div class="wishInfo">--}}
{{--                                <p class="contentSemiNormal">Piring Cina Putih Ringan Murah</p>--}}
{{--                                <p class="contentSmall">Pesanan anda: 50 item</p>--}}
{{--                            </div>--}}
{{--                            <div class="progressIndicator">--}}
{{--                                <p class="contentSmall">Kontribusi Wish</p>--}}
{{--                                <div class="progressNumber">--}}
{{--                                    <p class="contentBig textCurrentProgress" style="color: #DC354F">150</p>--}}
{{--                                    <p class="contentBig">/</p>--}}
{{--                                    <p class="contentBig">200</p>--}}
{{--                                </div>--}}
{{--                                <div class="barProgress" style="background: #FBEBEF">--}}
{{--                                    <div class="currentBar" style="width: 75%; background: #DC354F"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>--}}
{{--                        <p class="contentSemiBig separator">|</p>--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
