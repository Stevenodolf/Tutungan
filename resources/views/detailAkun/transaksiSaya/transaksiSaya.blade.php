@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <div class="contentV2">
        <div class="filterSection">
            <div class="upperSection">
                <div class="filter" style="border-top-color: #d5b81b; border-radius: 5px 0px 0px 0px">
                    <p class="contentSemiBig">Semua</p>
                </div>
                <div class="filter">
                    <p class="contentSemiBig">Menunggu Verifikasi</p>
                </div>
                <div class="filter">
                    <p class="contentSemiBig">Menunggu Tenggat Waktu</p>
                </div>
                <div class="filter">
                    <p class="contentSemiBig">Sedang<br>Diproses</p>
                </div>
                <div class="filter">
                    <p class="contentSemiBig">Sedang<br>Dikirim</p>
                </div>
                <div class="filter">
                    <p class="contentSemiBig">Sampai<br>Tujuan</p>
                </div>
                <div class="filter" style="border-radius: 0px 5px 0px 0px">
                    <p class="contentSemiBig">Dibatalkan</p>
                </div>
            </div>
            <div class="lowerSection">
                <form class="searchbar">
                    <input type="text" placeholder="Cari transaksi kamu di sini">
                    <button><img src="{{asset('images/search.png')}}"></button>
                </form>
            </div>
        </div>
        <div class="transactionSection">
            @php
                $idx = 1;
            @endphp
            @foreach($transactions as $transaction)
                <div class="transactionCell">
                    <div class="transactionCellContent">
                        <div class="header">
                            <div class="dateSection">
                                <p class="contentSmall">Transaksi dibuat: <span id="created{{ $idx }}"></span></p>
{{--                                <p id="processed{{ $idx }}" class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>--}}
                                <script>
                                    var createdDate = "{{ $transaction->created_at }}";
                                    createdDate = createdDate.replace(/\s/g, 'T');
                                    document.getElementById("created" + {{ $idx }}).innerHTML = moment(createdDate).format('DD MMM YYYY');
                                </script>
                            </div>
                            <div class="statusSection">
    {{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
                                <p class="statusYellow">{{ $transaction->getTransactionStatusRelation->name }}</p>
                            </div>

                        </div>
                        <div class="detail">
                            <div class="leftSection">
                                <img src="{{asset('uploads/'.json_decode($transaction->getWishRelation->image)[0])}}">
                                <div class="wishInfo">
                                    <p class="contentSemiNormal wishName">{{ $transaction->getWishRelation->name }}</p>
                                    <p class="contentSmall contribution">{{ $transaction->qty }} item x Rp{{number_format($transaction->getWishRelation->price, 0, ',', '.')}}</p>
                                </div>
                            </div>
                            <div class="rightSection">
                                <div class="totalPriceSection">
                                    <p class="contentSmall title">Total Belanja</p>
                                    <p class="totalPrice">Rp{{number_format($transaction->total_payment, 0, ',', '.')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="edit">
                            <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>
                        </div>
                    </div>
                </div>
                @php
                    $idx += 1;
                @endphp
            @endforeach
{{--                <div class="transactionCell">--}}
{{--                    <div class="transactionCellContent">--}}
{{--                        <div class="header">--}}
{{--                            <div class="dateSection">--}}
{{--                                <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>--}}
{{--                                <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>--}}
{{--                            </div>--}}
{{--                            <div class="statusSection">--}}
{{--                                <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
{{--                                <p class="statusYellow">Menunggu Tenggat Waktu</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="detail">--}}
{{--                            <div class="leftSection">--}}
{{--                                <img src="{{asset('images/wish/wish1.jpg')}}">--}}
{{--                                <div class="wishInfo">--}}
{{--                                    <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>--}}
{{--                                    <p class="contentSmall contribution">20 barang x Rp50.000</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="rightSection">--}}
{{--                                <div class="totalPriceSection">--}}
{{--                                    <p class="contentSmall title">Total Belanja</p>--}}
{{--                                    <p class="totalPrice">Rp1.000.000</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="edit">--}}
{{--                            <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="transactionCell">--}}
{{--                    <div class="transactionCellContent">--}}
{{--                        <div class="header">--}}
{{--                            <div class="dateSection">--}}
{{--                                <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>--}}
{{--                                <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>--}}
{{--                            </div>--}}
{{--                            <div class="statusSection">--}}
{{--                                --}}{{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
{{--                                <p class="statusYellow">Sedang Diproses</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="detail">--}}
{{--                            <div class="leftSection">--}}
{{--                                <img src="{{asset('images/wish/wish1.jpg')}}">--}}
{{--                                <div class="wishInfo">--}}
{{--                                    <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>--}}
{{--                                    <p class="contentSmall contribution">20 barang x Rp50.000</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="rightSection">--}}
{{--                                <div class="totalPriceSection">--}}
{{--                                    <p class="contentSmall title">Total Belanja</p>--}}
{{--                                    <p class="totalPrice">Rp1.000.000</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="edit">--}}
{{--                            <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="transactionCell">--}}
{{--                    <div class="transactionCellContent">--}}
{{--                        <div class="header">--}}
{{--                            <div class="dateSection">--}}
{{--                                <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>--}}
{{--                                <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>--}}
{{--                            </div>--}}
{{--                            <div class="statusSection">--}}
{{--                                --}}{{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
{{--                                <p class="statusYellow">Sedang Dikirim</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="detail">--}}
{{--                            <div class="leftSection">--}}
{{--                                <img src="{{asset('images/wish/wish1.jpg')}}">--}}
{{--                                <div class="wishInfo">--}}
{{--                                    <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>--}}
{{--                                    <p class="contentSmall contribution">20 barang x Rp50.000</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="rightSection">--}}
{{--                                <div class="totalPriceSection">--}}
{{--                                    <p class="contentSmall title">Total Belanja</p>--}}
{{--                                    <p class="totalPrice">Rp1.000.000</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="edit">--}}
{{--                            <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="transactionCell">--}}
{{--                    <div class="transactionCellContent">--}}
{{--                        <div class="header">--}}
{{--                            <div class="dateSection">--}}
{{--                                <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>--}}
{{--                                <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>--}}
{{--                            </div>--}}
{{--                            <div class="statusSection">--}}
{{--                                --}}{{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
{{--                                <p class="statusGreen">Sampai Tujuan</p>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="detail">--}}
{{--                            <div class="leftSection">--}}
{{--                                <img src="{{asset('images/wish/wish1.jpg')}}">--}}
{{--                                <div class="wishInfo">--}}
{{--                                    <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>--}}
{{--                                    <p class="contentSmall contribution">20 barang x Rp50.000</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="rightSection">--}}
{{--                                <div class="totalPriceSection">--}}
{{--                                    <p class="contentSmall title">Total Belanja</p>--}}
{{--                                    <p class="totalPrice">Rp1.000.000</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="edit">--}}
{{--                            <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="transactionCell">--}}
{{--                <div class="transactionCellContent">--}}
{{--                    <div class="header">--}}
{{--                        <div class="dateSection">--}}
{{--                            <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>--}}
{{--                            <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>--}}
{{--                        </div>--}}
{{--                        <div class="statusSection">--}}
{{--                            --}}{{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
{{--                            <p class="statusRed">Dibatalkan</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="detail">--}}
{{--                        <div class="leftSection">--}}
{{--                            <img src="{{asset('images/wish/wish1.jpg')}}">--}}
{{--                            <div class="wishInfo">--}}
{{--                                <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>--}}
{{--                                <p class="contentSmall contribution">20 barang x Rp50.000</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="rightSection">--}}
{{--                            <div class="totalPriceSection">--}}
{{--                                <p class="contentSmall title">Total Belanja</p>--}}
{{--                                <p class="totalPrice">Rp1.000.000</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

    </div>
@endsection
