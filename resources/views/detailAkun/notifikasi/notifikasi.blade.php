@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <script>
        $("#wishSaya").css('color', '#000000');
        $("#transaksiSaya").css('color', '#000000');
        $("#notifikasi").css('color', '#d5b81b');
    </script>

    <div class="contentV3">
        <p class="contentBig title">Notifikasi</p>
        <div class="notificationSection">
            @php
                $idx = 1;
            @endphp
            @foreach($notification_wishes as $notification_wish)
                @if($notification_wish->notification_id == 1)
                    <div class="notificationCell" onclick="window.location='{{ url("/wishsaya/")}}'">
                        <img src="{{asset('uploads/'.json_decode($notification_wish->getWishRelation->image)[0])}}">
                        <div class="detail">
                            <p id="created{{ $idx }}" class="contentSmall date"></p>
                            <p class="contentSemiNormal title">{{ $notification_wish->getNotificationRelation->title }}</p>
                            <p class="contentSemiNormal subtitle">{{ $notification_wish->getNotificationRelation->subtitle }}</p>
                        </div>
                        <script>
                            var createdDate = "{{ $notification_wish->created_at }}";
                            createdDate = createdDate.replace(/\s/g, 'T');
                            document.getElementById("created" + {{ $idx }}).innerHTML = moment(createdDate).format('DD MMMM YYYY');
                        </script>
                    </div>
                @else
                    <div class="notificationCell" onclick="window.location='{{ url("/transaksisaya/detailtransaksi/".$notification_wish->transaction_id)}}'">
                        <img src="{{asset('uploads/'.json_decode($notification_wish->getWishRelation->image)[0])}}">
                        <div class="detail">
                            <p id="created{{ $idx }}" class="contentSmall date"></p>
                            <p class="contentSemiNormal title">{{ $notification_wish->getNotificationRelation->title }}</p>
                            <p class="contentSemiNormal subtitle">{{ $notification_wish->getNotificationRelation->subtitle }}</p>
                        </div>
                        <script>
                            var createdDate = "{{ $notification_wish->created_at }}";
                            createdDate = createdDate.replace(/\s/g, 'T');
                            document.getElementById("created" + {{ $idx }}).innerHTML = moment(createdDate).format('DD MMMM YYYY');
                        </script>
                    </div>
                @endif
                @php
                    $idx += 1;
                @endphp
            @endforeach
{{--                <div class="notificationCell">--}}
{{--                    <img src="{{asset('images/wish/wish3.jpg')}}">--}}
{{--                    <div class="detail">--}}
{{--                        <p class="contentSmall date">4 Februari 2021</p>--}}
{{--                        <p class="contentSemiNormal title">Pesanan sudah sampai tujuan!</p>--}}
{{--                        <p class="contentSemiNormal subtitle">Terima kasih sudah menggunakan layanan Tutungan!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="notificationCell">--}}
{{--                    <img src="{{asset('images/wish/wish3.jpg')}}">--}}
{{--                    <div class="detail">--}}
{{--                        <p class="contentSmall date">2 Februari 2021</p>--}}
{{--                        <p class="contentSemiNormal title">Pesanan sedang dikirim ke alamatmu!</p>--}}
{{--                        <p class="contentSemiNormal subtitle">Woohoo😆 Sebentar lagi produkmu akan datang yayy!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="notificationCell">--}}
{{--                    <img src="{{asset('images/wish/wish3.jpg')}}">--}}
{{--                    <div class="detail">--}}
{{--                        <p class="contentSmall date">27 Januari 2021</p>--}}
{{--                        <p class="contentSemiNormal title">Pesananmu sedang diproses oleh Admin</p>--}}
{{--                        <p class="contentSemiNormal subtitle">Sembari menunggu, yuk lihat-lihat Wish lain yang  membuatmu tertarik!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="notificationCell">--}}
{{--                    <img src="{{asset('images/wish/wish3.jpg')}}">--}}
{{--                    <div class="detail">--}}
{{--                        <p class="contentSmall date">25 Januari 2021</p>--}}
{{--                        <p class="contentSemiNormal title">Pembayaran berhasil diverifikasi!</p>--}}
{{--                        <p class="contentSemiNormal subtitle">Sekarang tinggal menunggu tenggat waktu Wish berakhir nih😆</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="notificationCell">--}}
{{--                    <img src="{{asset('images/wish/wish3.jpg')}}">--}}
{{--                    <div class="detail">--}}
{{--                        <p class="contentSmall date">25 Januari 2021</p>--}}
{{--                        <p class="contentSemiNormal title">Transaksi menunggu pembayaran nihh</p>--}}
{{--                        <p class="contentSemiNormal subtitle">Segera selesaikan pembayaranmu agar Wish dapat diproses.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
        </div>
    </div>
@endsection
