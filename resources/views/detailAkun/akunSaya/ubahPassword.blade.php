@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <script>
        $("#wishSaya").css('color', '#000000');
        $("#transaksiSaya").css('color', '#000000');
        $("#notifikasi").css('color', '#000000');
        $("#profil").css('color', '#636363');
        $("#alamat").css('color', '#636363');
        $("#kartu").css('color', '#636363');
        $("#ubahPass").css('color', '#d5b81b');
    </script>
    <div class="content" id="content4">
        <div class="title">
            <h2 class="contentBig">Ubah Password</h2>
            <p class="contentSemiBig">Demi keamanan akun Anda, mohon tidak menyebarkan password Anda ke orang lain.</p>
        </div>
        <form class="changePassword" method="post" action="{{url('/akunSaya/ubahpass')}}">
            {{ csrf_field() }}
            <div class="section">
                <div class="sectionInput">
                    <p class="contentSemiNormal" style="color: #747474;width: 150px;">Password Sekarang</p>
                    <div>
                        <input type="password" name="oldPassword">
                        <a class="contentSemiNormal" style="color: #D5B81B;" href="{{url('/forgotPassword')}}">Lupa Password?</a>
                    </div>
                </div>
                <div class="sectionInput">
                    <p class="contentSemiNormal" style="color: #747474;width: 150px;">Password Baru</p>
                    <input type="password" name="newPassword">
                </div>
                <div class="sectionInput">
                    <p class="contentSemiNormal" style="color: #747474;width: 150px;">Ulangi Password Baru</p>
                    <input type="password" name="confirmPassword">
                </div>
            </div>
            <button class="button buttonYellow" type="submit">Ubah Password</button>
        </form>
    </div>
@endsection
