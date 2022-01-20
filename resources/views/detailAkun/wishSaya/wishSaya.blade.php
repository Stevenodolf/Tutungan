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
            @php
                $idx = 1;
            @endphp
            @foreach($wishes as $wish)
                <div class="wishCell">
                    <div class="wishCellContent">
                    <div class="header">
                        <p class="contentSmall textWishMaker">Oleh: {{ $wish->getCreatedByRelation->username }}</p>
                        @if($wish->status_wish_id >= 3)
                            <p class="contentSmall"><span id="created{{ $idx }}"></span> - <span id="deadline{{ $idx }}"></span></p>
                            <script>
                                var createdDate = "{{ $wish->created_at }}";
                                createdDate = createdDate.replace(/\s/g, 'T');
                                var deadlineDate = "{{ $wish->deadline }}";
                                deadlineDate = deadlineDate.replace(/\s/g, 'T');
                                document.getElementById("created" + {{ $idx }}).innerHTML = moment(createdDate).format('DD MMM YYYY');
                                document.getElementById("deadline" + {{ $idx }}).innerHTML = moment(deadlineDate).format('DD MMM YYYY');
                            </script>
                        @endif
                        <p class="statusYellow">{{ $wish->getStatusWishRelation->name }}</p>
                    </div>
                    <div class="detail">
                        <img src="{{asset('uploads/'.json_decode($wish->image)[0])}}" />
                        <div class="detailContent">
                            <div class="wishInfo">
                                <p class="contentSemiNormal">{{ $wish->name }}</p>

                                <p class="contentSmall">Pesanan anda: {{ $wish->curr_qty }} item</p> {{-- Harusnya menampilkan jumlah pesanan sesuai transaksi--}}
                            </div>
                            <div class="progressIndicator">
                                <p class="contentSmall">Kontribusi Wish</p>
                                <div class="progressNumber">
                                    <p id="currentPro{{ $idx }}" class="contentBig textCurrentProgress">{{ $wish->curr_qty }}</p>
                                    <p class="contentBig">/</p>
                                    <p id="targetPro{{ $idx }}" class="contentBig">{{ $wish->target_qty }}</p>
                                </div>
                                <div id="progressBarId{{ $idx }}" class="progressBar{{ $idx }}"></div>
                                <script>
                                    let proBar = new ProBar({
                                        // bgColor: "#C4C4C4",
                                        // color:"#DE3E16",
                                        bgColor: "#FFF09E",
                                        color: "#D5B81B",
                                        speed:0.2,
                                        wrapper:".progressBar{{ $idx }}",
                                        height:10,
                                        classNameBar : "timer",
                                        wrapperId : "progressBarId{{ $idx }}",
                                        finishAnimation : false,
                                        rounded : { // use it to round Corners of Probar.
                                            topLeft : 5,
                                            topRight : 5,
                                            bottomLeft : 5,
                                            bottomRight : 5
                                        },
                                        roundedInternal : { // use it to round Corners of Probar (internal).
                                            topLeft : 5,
                                            topRight : 5,
                                            bottomLeft : 5,
                                            bottomRight : 5
                                        }
                                    });

                                    var current = $("#currentPro").text();
                                    var target = $("#targetPro").text()
                                    var progress = (current/target)*100;
                                    console.log("Current: " + current);
                                    console.log("Target: " + target);
                                    console.log("Progress: " + progress + "%");

                                    proBar.goto(progress);
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="edit">
                        @if($wish->status_wish_id == 2)
                            <p class="contentSemiNormal buttonOnEdit">Bayar</p>
                        @elseif($wish->status_wish_id == 3)
                            <p class="contentSemiNormal buttonOnEdit">Tambah Kontribusi</p>
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
