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
            <div class="transactionCell">
                <div class="transactionCellContent">
                    <div class="header">
                        <div class="dateSection">
                            <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>
                            <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>
                        </div>
                        <div class="statusSection">
{{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
                            <p class="statusYellow">Menunggu Verifikasi</p>
                        </div>

                    </div>
                    <div class="detail">
                        <div class="leftSection">
                            <img src="{{asset('images/wish/wish1.jpg')}}">
                            <div class="wishInfo">
                                <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                <p class="contentSmall contribution">20 barang x Rp50.000</p>
                            </div>
                        </div>
                        <div class="rightSection">
                            <div class="totalPriceSection">
                                <p class="contentSmall title">Total Belanja</p>
                                <p class="totalPrice">Rp1.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="transactionCell">
                <div class="transactionCellContent">
                    <div class="header">
                        <div class="dateSection">
                            <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>
                            <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>
                        </div>
                        <div class="statusSection">
                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>
                            <p class="statusYellow">Menunggu Tenggat Waktu</p>
                        </div>

                    </div>
                    <div class="detail">
                        <div class="leftSection">
                            <img src="{{asset('images/wish/wish1.jpg')}}">
                            <div class="wishInfo">
                                <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                <p class="contentSmall contribution">20 barang x Rp50.000</p>
                            </div>
                        </div>
                        <div class="rightSection">
                            <div class="totalPriceSection">
                                <p class="contentSmall title">Total Belanja</p>
                                <p class="totalPrice">Rp1.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="transactionCell">
                <div class="transactionCellContent">
                    <div class="header">
                        <div class="dateSection">
                            <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>
                            <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>
                        </div>
                        <div class="statusSection">
                            {{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
                            <p class="statusYellow">Sedang Diproses</p>
                        </div>

                    </div>
                    <div class="detail">
                        <div class="leftSection">
                            <img src="{{asset('images/wish/wish1.jpg')}}">
                            <div class="wishInfo">
                                <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                <p class="contentSmall contribution">20 barang x Rp50.000</p>
                            </div>
                        </div>
                        <div class="rightSection">
                            <div class="totalPriceSection">
                                <p class="contentSmall title">Total Belanja</p>
                                <p class="totalPrice">Rp1.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="transactionCell">
                <div class="transactionCellContent">
                    <div class="header">
                        <div class="dateSection">
                            <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>
                            <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>
                        </div>
                        <div class="statusSection">
                            {{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
                            <p class="statusYellow">Sedang Dikirim</p>
                        </div>

                    </div>
                    <div class="detail">
                        <div class="leftSection">
                            <img src="{{asset('images/wish/wish1.jpg')}}">
                            <div class="wishInfo">
                                <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                <p class="contentSmall contribution">20 barang x Rp50.000</p>
                            </div>
                        </div>
                        <div class="rightSection">
                            <div class="totalPriceSection">
                                <p class="contentSmall title">Total Belanja</p>
                                <p class="totalPrice">Rp1.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="transactionCell">
                <div class="transactionCellContent">
                    <div class="header">
                        <div class="dateSection">
                            <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>
                            <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>
                        </div>
                        <div class="statusSection">
                            {{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
                            <p class="statusGreen">Sampai Tujuan</p>
                        </div>

                    </div>
                    <div class="detail">
                        <div class="leftSection">
                            <img src="{{asset('images/wish/wish1.jpg')}}">
                            <div class="wishInfo">
                                <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                <p class="contentSmall contribution">20 barang x Rp50.000</p>
                            </div>
                        </div>
                        <div class="rightSection">
                            <div class="totalPriceSection">
                                <p class="contentSmall title">Total Belanja</p>
                                <p class="totalPrice">Rp1.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="transactionCell">
                <div class="transactionCellContent">
                    <div class="header">
                        <div class="dateSection">
                            <p class="contentSmall">Transaksi dibuat: 1 Jan 2022</p>
                            <p class="contentSmall textWishProcessed">Wish diproses: 7 Jan 2022</p>
                        </div>
                        <div class="statusSection">
                            {{--                            <p class="contentSemiNormal dayIndicator">3 Hari Lagi</p>--}}
                            <p class="statusRed">Dibatalkan</p>
                        </div>

                    </div>
                    <div class="detail">
                        <div class="leftSection">
                            <img src="{{asset('images/wish/wish1.jpg')}}">
                            <div class="wishInfo">
                                <p class="contentSemiNormal wishName">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                <p class="contentSmall contribution">20 barang x Rp50.000</p>
                            </div>
                        </div>
                        <div class="rightSection">
                            <div class="totalPriceSection">
                                <p class="contentSmall title">Total Belanja</p>
                                <p class="totalPrice">Rp1.000.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Lihat Detail Transaksi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
