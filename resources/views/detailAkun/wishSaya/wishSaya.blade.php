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
                    <p class="contentSemiBig">Menunggu Pembayaran</p>
                </div>
                <div class="filter">
                    <p class="contentSemiBig">Sedang Berjalan</p>
                </div>
                <div class="filter">
                    <p class="contentSemiBig">Diproses</p>
                </div>
                <div class="filter">
                    <p class="contentSemiBig">Selesai</p>
                </div>
                <div class="filter" style="border-radius: 0px 5px 0px 0px">
                    <p class="contentSemiBig">Dibatalkan</p>
                </div>
            </div>
            <div class="lowerSection">
                <form class="searchbar">
                    <input type="text" placeholder="Cari Wish yang kamu buat di sini">
                    <button><img src="{{asset('images/search.png')}}"></button>
                </form>
            </div>
        </div>
        <div class="wishSection">
            <div class="wishCell">
                <div class="wishCellContent">
                    <div class="header">
                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>
{{--                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>--}}
                        <p class="statusYellow">Menunggu Verifikasi</p>
                    </div>
                    <div class="detail">
                        <img src="{{asset('images/wish/wish1.jpg')}}" />
                        <div class="detailContent">
                            <div class="wishInfo">
                                <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                <p class="contentSmall">Pesanan anda: 20 item</p>
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p class="contentBig textCurrentProgress">20</p>
                                    <p class="contentBig">/</p>
                                    <p class="contentBig">100</p>
                                </div>
                                <div class="barProgress">
                                    <div class="currentBar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>
                        <p class="contentSemiBig separator">|</p>
                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>
                    </div>
                </div>
            </div>
            <div class="wishCell">
                <div class="wishCellContent">
                    <div class="header">
                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>
{{--                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>--}}
                        <p class="statusYellow">Menunggu Pembayaran</p>
                    </div>
                    <div class="detail">
                        <img src="{{asset('images/wish/wish2.jpg')}}" />
                        <div class="detailContent">
                            <div class="wishInfo">
                                <p class="contentSemiNormal">Celana Panjang Pria Murah</p>
                                <p class="contentSmall">Pesanan anda: 500 item</p>
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p class="contentBig textCurrentProgress">500</p>
                                    <p class="contentBig">/</p>
                                    <p class="contentBig">1000</p>
                                </div>
                                <div class="barProgress">
                                    <div class="currentBar" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>
                        <p class="contentSemiBig separator">|</p>
                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>
                    </div>
                </div>
            </div>
            <div class="wishCell">
                <div class="wishCellContent">
                    <div class="header">
                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>
                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>
                        <p class="statusYellow">Sedang Berjalan</p>
                    </div>
                    <div class="detail">
                        <img src="{{asset('images/wish/wish3.jpg')}}" />
                        <div class="detailContent">
                            <div class="wishInfo">
                                <p class="contentSemiNormal">Piring Cina Putih Ringan Murah</p>
                                <p class="contentSmall">Pesanan anda: 50 item</p>
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p class="contentBig textCurrentProgress">150</p>
                                    <p class="contentBig">/</p>
                                    <p class="contentBig">200</p>
                                </div>
                                <div class="barProgress">
                                    <div class="currentBar" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>
                        <p class="contentSemiBig separator">|</p>
                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>
                    </div>
                </div>
            </div>
            <div class="wishCell">
                <div class="wishCellContent">
                    <div class="header">
                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>
                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>
                        <p class="statusYellow">Diproses</p>
                    </div>
                    <div class="detail">
                        <img src="{{asset('images/wish/wish3.jpg')}}" />
                        <div class="detailContent">
                            <div class="wishInfo">
                                <p class="contentSemiNormal">Piring Cina Putih Ringan Murah</p>
                                <p class="contentSmall">Pesanan anda: 50 item</p>
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p class="contentBig textCurrentProgress">200</p>
                                    <p class="contentBig">/</p>
                                    <p class="contentBig">200</p>
                                </div>
                                <div class="barProgress">
                                    <div class="currentBar" style="width: 100%; color: #57B793"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>
                        <p class="contentSemiBig separator">|</p>
                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>
                    </div>
                </div>
            </div>
            <div class="wishCell">
                <div class="wishCellContent">
                    <div class="header">
                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>
                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>
                        <p class="statusGreen">Selesai</p>
                    </div>
                    <div class="detail">
                        <img src="{{asset('images/wish/wish3.jpg')}}" />
                        <div class="detailContent">
                            <div class="wishInfo">
                                <p class="contentSemiNormal">Piring Cina Putih Ringan Murah</p>
                                <p class="contentSmall">Pesanan anda: 50 item</p>
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p class="contentBig textCurrentProgress" style="color: #57B793">200</p>
                                    <p class="contentBig">/</p>
                                    <p class="contentBig">200</p>
                                </div>
                                <div class="barProgress">
                                    <div class="currentBar" style="width: 100%; background: #57B793"></div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>--}}
{{--                        <p class="contentSemiBig separator">|</p>--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="wishCell">
                <div class="wishCellContent">
                    <div class="header">
                        <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>
                        <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>
                        <p class="statusRed">Dibatalkan</p>
                    </div>
                    <div class="detail">
                        <img src="{{asset('images/wish/wish3.jpg')}}" />
                        <div class="detailContent">
                            <div class="wishInfo">
                                <p class="contentSemiNormal">Piring Cina Putih Ringan Murah</p>
                                <p class="contentSmall">Pesanan anda: 50 item</p>
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p class="contentBig textCurrentProgress" style="color: #DC354F">150</p>
                                    <p class="contentBig">/</p>
                                    <p class="contentBig">200</p>
                                </div>
                                <div class="barProgress" style="background: #FBEBEF">
                                    <div class="currentBar" style="width: 75%; background: #DC354F"></div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="edit">--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>--}}
{{--                        <p class="contentSemiBig separator">|</p>--}}
{{--                        <p class="contentSemiNormal buttonOnEdit">Hapus</p>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
