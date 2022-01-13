@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <div class="contentV3">
        <p class="contentBig title">Notifikasi</p>
        <div class="notificationCell">
            <img src="{{asset('images/wish/wish1.jpg')}}">
            <div class="detail">
                <p class="contentSmall date">5 Februari 2021</p>
                <p class="contentSemiNormal title">Transaksi dibatalkan</p>
                <p class="contentSemiNormal subtitle">Transaksi anda telah dibatalkan, ketuk untuk lihat lebih lanjut.</p>
            </div>
        </div>
        <div class="notificationCell">
            <img src="{{asset('images/wish/wish3.jpg')}}">
            <div class="detail">
                <p class="contentSmall date">4 Februari 2021</p>
                <p class="contentSemiNormal title">Pesanan sudah sampai tujuan!</p>
                <p class="contentSemiNormal subtitle">Terima kasih sudah menggunakan layanan Tutungan!</p>
            </div>
        </div>
        <div class="notificationCell">
            <img src="{{asset('images/wish/wish3.jpg')}}">
            <div class="detail">
                <p class="contentSmall date">2 Februari 2021</p>
                <p class="contentSemiNormal title">Pesanan sedang dikirim ke alamatmu!</p>
                <p class="contentSemiNormal subtitle">Woohoo😆 Sebentar lagi produkmu akan datang yayy!</p>
            </div>
        </div>
        <div class="notificationCell">
            <img src="{{asset('images/wish/wish3.jpg')}}">
            <div class="detail">
                <p class="contentSmall date">27 Januari 2021</p>
                <p class="contentSemiNormal title">Pesananmu sedang diproses oleh Admin</p>
                <p class="contentSemiNormal subtitle">Sembari menunggu, yuk lihat-lihat Wish lain yang  membuatmu tertarik!</p>
            </div>
        </div>
        <div class="notificationCell">
            <img src="{{asset('images/wish/wish3.jpg')}}">
            <div class="detail">
                <p class="contentSmall date">25 Januari 2021</p>
                <p class="contentSemiNormal title">Pembayaran berhasil diverifikasi!</p>
                <p class="contentSemiNormal subtitle">Sekarang tinggal menunggu tenggat waktu Wish berakhir nih😆</p>
            </div>
        </div>
        <div class="notificationCell">
            <img src="{{asset('images/wish/wish3.jpg')}}">
            <div class="detail">
                <p class="contentSmall date">25 Januari 2021</p>
                <p class="contentSemiNormal title">Transaksi menunggu pembayaran nihh</p>
                <p class="contentSemiNormal subtitle">Segera selesaikan pembayaranmu agar Wish dapat diproses.</p>
            </div>
        </div>
    </div>
@endsection
