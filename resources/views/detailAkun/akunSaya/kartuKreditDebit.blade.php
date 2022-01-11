@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <div class="content" id="content3">
        <div class="titleWithButton">
            <div class="titleInButton">
                <h2>Kartu Kredit/Debit</h2>
                <p class="contentSemiBig">Kelola informasi kartu kredit/debit untuk memproses pembayaran.</p>
            </div>
            <div class="buttonContainer">
                <button onclick="popupTambahCreditDebit();">
                    <img src="{{asset("images/plusBlack.png")}}">
                    <p class="contentNormal">Kartu Kredit/Debit</p>
                </button>
            </div>
        </div>

        <div class="creditDebit">
            <div class="listCreditDebit">
                <img src="{{asset('images/dummyCreditCard.png')}}"/>
                <div>
                    <div class="titleWithEmblem">
                        <h3>**** **** **** 7890</h3>
                        <div class="emblem">
                            <p class="contentSemiNormal" style="color: white;">Utama</p>
                        </div>
                    </div>
                    <div class="keterangan">
                        <div class="section">
                            <p class="contentNormal">06 / 23</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttonSamping">
                <button>Atur Sebagai Utama</button>
                <button>Hapus</button>
            </div>
        </div>

        <div class="creditDebit">
            <div class="listCreditDebit">
                <img src="{{asset('images/dummyCreditCard.png')}}"/>
                <div>
                    <div class="titleWithEmblem">
                        <h3>**** **** **** 1234</h3>
                        <div class="emblem">
                            <p class="contentSemiNormal" style="color: white;">Utama</p>
                        </div>
                    </div>
                    <div class="keterangan">
                        <div class="section">
                            <p class="contentNormal">06 / 23</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttonSamping">
                <button>Atur Sebagai Utama</button>
                <button>Hapus</button>
            </div>
        </div>
    </div>
@endsection
