@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <div class="contentV2">
        <div class="transactionDetailSection">
            <div class="header">
                <div class="headerContent">
                    <div class="buttonKembali">
                        <img src="{{asset('images/arrowLeftBlack.png')}}">
                        <p class="contentSemiBig text">Kembali</p>
                    </div>
                    <div class="indicator">
                        <p class="noTransaksi">No. Transaksi: 0501221234567890</p>
                        <p class="statusGreen">Selesai</p>
                    </div>
                </div>
            </div>
            <div class="sectionAfterHeader">
                <div class="sectionContent">
                    <p class="contentSemiBig title">Progres Wish dan Pengiriman</p>
                    <div class="contentAfterTitle1">
                        <div class="leftSection">
                            <div class="information">
                                <p class="contentSmall infoType">Kurir</p>
                                <p class="contentSmall infoDetail">JNE- Reguler</p>
                            </div>
                            <div class="information">
                                <p class="contentSmall infoType">No. Resi</p>
                                <p class="contentSmall infoDetail">TJR1234567890123</p>
                            </div>
                            <div class="information">
                                <p class="contentSmall infoType">Alamat</p>
                                <div class="infoDetailAlamat">
                                    <p class="contentSmall infoDetail">Steven Yuwono</p>
                                    <p class="contentSmall infoDetail">62812345678</p>
                                    <p class="contentSmall infoDetail">Jl. Ir. Soekarno No. 69, RT 04 RW 20</p>
                                    <p class="contentSmall infoDetail">Kota Surakarta - Pasar Kliwon</p>
                                    <p class="contentSmall infoDetail">Jawa Tengah</p>
                                    <p class="contentSmall infoDetail">57752</p>
                                </div>
                            </div>
                        </div>
                        <div class="rightSection">
                            <div class="rightSectionContent">
                                <div class="shipmentStatus">
                                    <p class="contentSmall date">4 Feb 2021, 14:45</p>
                                    <div class="dot"></div>
                                    <div class="shipmentStatusDetail">
                                        <p class="contentSmall title">Transaksi Selesai</p>
                                        <p class="contentSmall detail">Wish ditutup</p>
                                    </div>
                                </div>
                                <div class="shipmentStatus">
                                    <p class="contentSmall date">4 Feb 2021, 14:45</p>
                                    <div class="dot"></div>
                                    <div class="shipmentStatusDetail">
                                        <p class="contentSmall title">Pesanan sudah diterima</p>
                                        <p class="contentSmall detail">Diterima oleh Steven Yuwono</p>
                                    </div>
                                </div>
                                <div class="shipmentStatus">
                                    <p class="contentSmall date">2 Feb 2021, 14:45</p>
                                    <div class="dot"></div>
                                    <div class="shipmentStatusDetail">
                                        <p class="contentSmall title">Pesanan sudah dikirim</p>
                                        <p class="contentSmall detail">Pesanan anda sedang dalam pengiriman oleh kurir</p>
                                    </div>
                                </div>
                                <div class="shipmentStatus">
                                    <p class="contentSmall date">2 Feb 2021, 14:45</p>
                                    <div class="dot"></div>
                                    <div class="shipmentStatusDetail">
                                        <p class="contentSmall title">Pesanan menunggu pickup</p>
                                        <p class="contentSmall detail">Pesanan anda sudah dibungkus dan sedang menunggu
                                            pickup oleh kurir</p>
                                    </div>
                                </div>
                                <div class="shipmentStatus">
                                    <p class="contentSmall date">1 Feb 2021, 14:45</p>
                                    <div class="dot"></div>
                                    <div class="shipmentStatusDetail">
                                        <p class="contentSmall title">Pesanan Wish sampai di gudang</p>
                                        <p class="contentSmall detail">Pesanan Wish sudah sampai di gudang dan dalam proses
                                            pembungkusan</p>
                                    </div>
                                </div>
                                <div class="shipmentStatus">
                                    <p class="contentSmall date">29 Jan 2021, 14:45</p>
                                    <div class="dot"></div>
                                    <div class="shipmentStatusDetail">
                                        <p class="contentSmall title">Pesanan Wish sudah dikirim menuju ke gudang</p>
                                        <p class="contentSmall detail">Pesanan Wish anda sedang dikirim dari sumber pembelian
                                            produk Wish ke gudang</p>
                                    </div>
                                </div>
                                <div class="shipmentStatus">
                                    <p class="contentSmall date">27 Nov 2021, 14:45</p>
                                    <div class="dot"></div>
                                    <div class="shipmentStatusDetail">
                                        <p class="contentSmall title">Wish sedang diproses oleh Admin</p>
                                        <p class="contentSmall detail">Wish sedang diproses oleh Admin ke sumber pembelian
                                            produk Wish</p>
                                    </div>
                                </div>
                                <div class="shipmentStatus">
                                    <p class="contentSmall date">25 Jan 2021, 14:45</p>
                                    <div class="dot"></div>
                                    <div class="shipmentStatusDetail">
                                        <p class="contentSmall title">Pembayaran berhasil diverifikasi</p>
                                        <p class="contentSmall detail">Pembayaran anda telah diterima Tutungan dan sedang
                                            menunggu pemrosesan oleh Admin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sectionAfterHeader">
                <div class="sectionContent">
                    <p class="contentSemiBig title">Detail Wish dan Produk</p>
                    <div class="contentAfterTitle2">
                        <div class="wishCellContent">
                            <div class="cellHeader">
                                <p class="contentSmall textWishMaker">Oleh: Steven Yuwono</p>
                                <p class="contentSmall">1 Jan 2021 - 7 Jan 2021</p>
                            </div>
                            <div class="detail">
                                <img src="{{asset('images/wish/wish1.jpg')}}" />
                                <div class="detailContent">
                                    <div class="wishInfo">
                                        <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                        <p class="contentSmall">Pesanan anda: 20 item</p>
                                    </div>
                                    <div class="contentSemiNormal totalPrice">Rp1.000.000</div>
                                    <div class="progressIndicator">
                                        <p class="contentSmall">Kontribusi Wish</p>
                                        <div class="progressNumber">
                                            <p class="contentBig textCurrentProgress">20</p>
                                            <p class="contentBig">/</p>
                                            <p class="contentBig">100</p>
                                        </div>
                                        <div class="progressBar">
                                            <div class="currentBar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sectionAfterHeader">
                <div class="sectionContent">
                    <p class="contentSemiBig title">Detail Pembayaran</p>
                    <div class="contentAfterTitle3">
                        <div class="leftSection">
                            <div class="paymentInfo">
                                <p class="infoType">Metode Pembayaran</p>
                                <p class="infoDetail">BCA Virtual Account</p>
                            </div>
                            <div class="paymentInfo">
                                <p class="infoType">Total Harga</p>
                                <p class="infoDetail">Rp1.000.000</p>
                            </div>
                            <div class="paymentInfo">
                                <p class="infoType">Biaya Pengiriman</p>
                                <p class="infoDetail">Rp40.000</p>
                            </div>
                            <div class="paymentInfo">
                                <p class="infoType">Diskon Pengiriman</p>
                                <p class="infoDetail">-Rp8.000</p>
                            </div>
                            <div class="totalPayment">
                                <p class="title">Total Pembayaran</p>
                                <p class="totalPaymentDetail">Rp1.032.000</p>
                            </div>
                        </div>
                        <div class="rightSection">
                            <button class="button buttonBlack">Lihat Invoice</button>
                            <button class="button buttonRed">Batalkan Transaksi</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
