@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <script>
        $("#wishSaya").css('color', '#000000');
        $("#transaksiSaya").css('color', '#d5b81b');
        $("#notifikasi").css('color', '#000000');
    </script>

    <div class="contentV2">
        <div class="filterSection">
            <div class="upperSection">
                {{ csrf_field() }}
                <form id="filter7" class="filter" method="get" action="{{ route('getTransaksiSaya') }}">
                    <input type="hidden" name="filter" value="7">
                    <button type="submit" class="contentSemiBig filterContent">Semua</button>
                </form>
                <form id="filter1" class="filter" method="get" action="{{ route('getTransaksiSaya') }}">
                    <input type="hidden" name="filter" value="1">
                    <button type="submit" class="contentSemiBig filterContent">Menunggu Pembayaran</button>
                </form>
                <form id="filter2" class="filter" method="get" action="{{ route('getTransaksiSaya') }}">
                    <input type="hidden" name="filter" value="2">
                    <button type="submit" class="contentSemiBig filterContent">Menunggu Tenggat Waktu</button>
                </form>
                <form id="filter3" class="filter" method="get" action="{{ route('getTransaksiSaya') }}">
                    <input type="hidden" name="filter" value="3">
                    <button type="submit" class="contentSemiBig filterContent">Sedang Diproses</button>
                </form>
                <form id="filter4" class="filter" method="get" action="{{ route('getTransaksiSaya') }}">
                    <input type="hidden" name="filter" value="4">
                    <button type="submit" class="contentSemiBig filterContent">Sedang Dikirim</button>
                </form>
                <form id="filter5" class="filter" method="get" action="{{ route('getTransaksiSaya') }}">
                    <input type="hidden" name="filter" value="5">
                    <button type="submit" class="contentSemiBig filterContent">Sampai Tujuan</button>
                </form>
                <form id="filter6" class="filter" method="get" action="{{ route('getTransaksiSaya') }}">
                    <input type="hidden" name="filter" value="6">
                    <button type="submit" class="contentSemiBig filterContent">Dibatalkan</button>
                </form>
                <script>
                    $("#filter" + {{ $filter }}).css('border-top-color', '#d5b81b');
                </script>
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
                                <p id="processed{{ $idx }}" class="contentSmall textWishProcessed">Tenggat waktu Wish: <span id="deadline{{ $idx }}" class="textWishProcessed"></span></p>
                                <script>
                                    var createdDate = "{{ $transaction->created_at }}";
                                    createdDate = createdDate.replace(/\s/g, 'T');
                                    var deadlineDate = "{{ $transaction->getWishRelation->deadline }}";
                                    deadlineDate = deadlineDate.replace(/\s/g, 'T');
                                    document.getElementById("created" + {{ $idx }}).innerHTML = moment(createdDate).format('DD MMM YYYY');
                                    document.getElementById("deadline" + {{ $idx }}).innerHTML = moment(deadlineDate).format('DD MMM YYYY');
                                </script>
                            </div>
                            <div class="statusSection">
                                @if($transaction->status_transaksi_id == 5)
                                    <p class="statusGreen">{{ $transaction->getTransactionStatusRelation->name }}</p>
                                @elseif($transaction->status_transaksi_id == 6)
                                    <p class="statusRed">{{ $transaction->getTransactionStatusRelation->name }}</p>
                                @elseif($transaction->status_transaksi_id == 2)
                                    <p class="contentSemiNormal dayIndicator"><span id="day{{ $idx }}"></span> Hari Lagi</p>
                                    <script>
                                        var deadline = "{{ $transaction->getWishRelation->deadline }}"
                                        deadline = deadline.replace(/\s/g, 'T');
                                        var formattedDeadline = Tick.helper.date(deadline)
                                        var today = Tick.helper.date()

                                        document.getElementById("day" + {{ $idx }}).innerHTML = Tick.helper.duration(today, formattedDeadline, ['d']);
                                    </script>
                                    <p class="statusYellow">{{ $transaction->getTransactionStatusRelation->name }}</p>
                                @else
                                    <p class="statusYellow">{{ $transaction->getTransactionStatusRelation->name }}</p>
                                @endif
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
                                    <p class="contentSemiNormal totalPrice">Rp{{number_format($transaction->total_payment, 0, ',', '.')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="edit">
                            @if($transaction->status_transaksi_id == 1)
                                <p class="contentSemiNormal buttonOnEdit" onclick="window.location='{{ url("/buy/".$transaction->getWishRelation->id)}}'">Bayar</p>
                            @else
                                <p class="contentSemiNormal buttonOnEdit" onclick="window.location='{{ url("/transaksisaya/detailtransaksi/".$transaction->id)}}'">Lihat Detail Transaksi</p>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                    $idx += 1;
                @endphp
            @endforeach
    </div>
@endsection
