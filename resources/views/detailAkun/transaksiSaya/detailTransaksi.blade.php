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
                        <p class="noTransaksi">No. Transaksi: {{ $transaction->id }}</p>
                        @if($transaction->status_transaksi_id == 5)
                            <p class="statusGreen">{{ $transaction->getTransactionStatusRelation->name }}</p>
                        @elseif($transaction->status_transaksi_id == 6)
                            <p class="statusRed">{{ $transaction->getTransactionStatusRelation->name }}</p>
                        @else
                            <p class="statusYellow">{{ $transaction->getTransactionStatusRelation->name }}</p>
                        @endif
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
                                    <p class="contentSmall infoDetail">{{ $transaction->getUserRelation->username }}</p>
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
                                <p class="contentSmall textWishMaker">Oleh: {{ $wish->getCreatedByRelation->username }}</p>
{{--                                <p class="contentSmall">1 Jan 2021 - {{ $wish->deadline }}</p>--}}
                                <p class="contentSmall"><span id="created"></span> - <span id="deadline"></span></p>
                                <script>
                                    var createdDate = "{{ $wish->created_at }}";
                                    createdDate = createdDate.replace(/\s/g, 'T');
                                    var deadlineDate = "{{ $wish->deadline }}";
                                    deadlineDate = deadlineDate.replace(/\s/g, 'T');
                                    document.getElementById("created").innerHTML = moment(createdDate).format('DD MMM YYYY');
                                    document.getElementById("deadline").innerHTML = moment(deadlineDate).format('DD MMM YYYY');
                                </script>
                            </div>
                            <div class="detail">
                                <img src="{{asset('uploads/'.json_decode($wish->image)[0])}}" />
                                <div class="detailContent">
                                    <div class="wishInfo">
                                        <p class="contentSemiNormal">{{ $wish->name }}</p>
                                        <p class="contentSmall">Pesanan anda: {{ $transaction->qty }} item x Rp{{number_format($wish->price, 0, ',', '.')}}</p>
                                    </div>
                                    <div class="contentSemiNormal totalPrice">Rp{{number_format($transaction->total_price, 0, ',', '.')}}</div>
                                    <div class="progressIndicator">
                                        <p class="contentSmall">Kontribusi Wish</p>
                                        <div class="progressNumber">
                                            @if($wish->status_wish_id == 5)
                                                <p class="contentBig textCurrentProgressGreen">{{ $wish->curr_qty }}</p>
                                            @elseif($wish->status_wish_id == 6)
                                                <p class="contentBig textCurrentProgressRed">{{ $wish->curr_qty }}</p>
                                            @else
                                                <p class="contentBig textCurrentProgressYellow">{{ $wish->curr_qty }}</p>
                                            @endif
{{--                                            <p class="contentBig textCurrentProgress">{{ $wish->curr_qty }}</p>--}}
                                            <p class="contentBig">/</p>
                                            <p class="contentBig">{{ $wish->target_qty }}</p>
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
                                <p class="infoDetail">Rp{{number_format($transaction->total_price, 0, ',', '.')}}</p>
                            </div>
                            <div class="paymentInfo">
                                <p class="infoType">Biaya Pengiriman Origin ke Gudang</p>
                                <p class="infoDetail">Rp{{number_format($transaction->total_oti, 0, ',', '.')}}</p>
                            </div>
                            <div class="paymentInfo">
                                <p class="infoType">Biaya Pengiriman Gudang ke Anda</p>
                                <p class="infoDetail">Rp{{number_format($transaction->total_itu, 0, ',', '.')}}</p>
                            </div>
                            <div class="paymentInfo">
                                <p class="infoType">Biaya Administrasi</p>
                                <p class="infoDetail">Rp{{number_format($transaction->total_fee, 0, ',', '.')}}</p>
                            </div>
                            <div class="totalPayment">
                                <p class="title">Total Pembayaran</p>
                                <p class="totalPaymentDetail">Rp{{number_format($transaction->total_payment, 0, ',', '.')}}</p>
                            </div>
                        </div>
                        <div class="rightSection">
                            <button class="button buttonBlack">Lihat Invoice</button>
                            @if($transaction->status_transaksi_id == 6)
                                <button class="button buttonRed">Batalkan Transaksi</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
