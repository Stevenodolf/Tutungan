@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <script>
        $("#wishSaya").css('color', '#000000');
        $("#transaksiSaya").css('color', '#000000');
        $("#notifikasi").css('color', '#000000');
        $("#profil").css('color', '#636363');
        $("#alamat").css('color', '#636363');
        $("#kartu").css('color', '#d5b81b');
        $("#ubahPass").css('color', '#636363');
    </script>
    <div class="content" id="content3">
        <div class="titleWithButton">
            <div class="titleInButton">
                <h2 class="contentBig">Kartu Kredit/Debit</h2>
                <p class="contentSemiBig">Kelola informasi kartu kredit/debit untuk memproses pembayaran.</p>
            </div>
            <div class="buttonContainer">
                <button class="button buttonYellow" onclick="popupTambahCreditDebit();">
                    <img src="{{asset("images/plusBlack.png")}}">
                    <p class="contentNormal">Kredit/Debit</p>
                </button>
            </div>
        </div>
        @foreach($creditDebitList as $list)
            <div class="creditDebit">
                <div class="listCreditDebit">
                    <img src="{{asset('images/' .$list->card_type .'.png')}}"/>
                    <div>
                        <div class="titleWithEmblem">
                            <h3 class="contentBig">{{$list->card_number}}</h3>
                            @if($list->is_utama == 1)
                                <div class="emblem">
                                    <p class="contentSemiNormal" style="color: white;">Utama</p>
                                </div>
                            @endif
                        </div>
                        <div class="keterangan">
                            <div class="section">
                                <p class="contentSemiNormal">{{$list->card_valid_month}} / {{$list->card_valid_year}} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buttonSamping">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$list->id}}">
                        @if($list->is_utama == 0)
                            <button type="submit" formaction="{{url('/akunSaya/utamaKartu')}}">Atur Sebagai Utama</button>
                        @endif
                        <button type="submit" formaction="{{url('/akunSaya/hapusKartu')}}">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach


{{--        <div class="creditDebit">--}}
{{--            <div class="listCreditDebit">--}}
{{--                <img src="{{asset('images/dummyCreditCard.png')}}"/>--}}
{{--                <div>--}}
{{--                    <div class="titleWithEmblem">--}}
{{--                        <h3>**** **** **** 1234</h3>--}}
{{--                        <div class="emblem">--}}
{{--                            <p class="contentSemiNormal" style="color: white;">Utama</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="keterangan">--}}
{{--                        <div class="section">--}}
{{--                            <p class="contentNormal">06 / 23</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="buttonSamping">--}}
{{--                <button>Atur Sebagai Utama</button>--}}
{{--                <button>Hapus</button>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div class="blackContainer" id="tambahCreditDebit">
        <div class="popUpTambahCreditDebit">
            <div class="title">
                <h2>Tambah Kartu Kredit/Debit</h2>
                <button id="closeTambahCreditDebit">
                    <img src="{{asset('images/close.png')}}"/>
                </button>
            </div>
            <form method="post" action="{{url('/akunSaya/postKartu')}}">
                {{ csrf_field() }}
                <div class="section">
                    <div class="sectionInput">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Nomor Kartu</p>
                        <div style="width: 100%">
                            <input type="text" name="cardNumber">
                            <div class="creditCardSelection">
                                <label>
                                    <input type="radio" name="creditCardType" value="mastercard" checked>
                                    <img src="{{asset('images/mastercard.png')}}">
                                </label>
                                <label>
                                    <input type="radio" name="creditCardType" value="visa">
                                    <img src="{{asset('images/visa.png')}}">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="sectionInput">
                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">Masa Berlaku</p>
                        <input style="width: 20%;" type="text" name="month">
                        <p class="contentSemiNormal" style="color: #747474;margin: 0 5px">/</p>
                        <input style="width: 20%;" type="text" name="year">
                    </div>
{{--                    <div class="sectionInput">--}}
{{--                        <p class="contentSemiNormal" style="color: #747474;width: 150px;">CVV</p>--}}
{{--                        <input style="width: 20%;" type="text">--}}
{{--                    </div>--}}
                </div>
                <div class="buttonSimpan">
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
