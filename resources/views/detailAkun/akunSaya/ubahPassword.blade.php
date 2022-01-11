@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <div class="content" id="content4">
        <div class="title">
            <h2>Ubah Password</h2>
            <p class="contentSemiBig">Demi keamanan akun Anda, mohon tidak menyebarkan password Anda ke orang lain.</p>
        </div>
        <div class="changePassword">
            <div class="section">
                <div class="sectionInput" style="align-items: flex-start;">
                    <p class="contentSemiNormal" style="color: #747474;width: 150px;">Password Sekarang</p>
                    <div>
                        <input type="password">
                        <p class="contentSemiNormal" style="color: #D5B81B;">Lupa Password?</p>
                    </div>
                </div>
                <div class="sectionInput">
                    <p class="contentSemiNormal" style="color: #747474;width: 150px;">Password Baru</p>
                    <input type="password">
                </div>
                <div class="sectionInput">
                    <p class="contentSemiNormal" style="color: #747474;width: 150px;">Ulangi Password Baru</p>
                    <input type="password">
                </div>
            </div>
            <button>Ubah Password</button>
        </div>
    </div>
@endsection
