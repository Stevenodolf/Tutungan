@extends('detailAkun.detailAkunTemplate')

@section('mainContent')
    <script>
        $("#wishSaya").css('color', '#000000');
        $("#transaksiSaya").css('color', '#000000');
        $("#notifikasi").css('color', '#000000');
        $("#profil").css('color', '#d5b81b');
        $("#alamat").css('color', '#636363');
        $("#kartu").css('color', '#636363');
        $("#ubahPass").css('color', '#636363');
    </script>
    <div class="content" id="content1" >
        <div class="title">
            <h2 class="contentBig">Profil</h2>
            <p class="contentSemiBig">Kelola data diri Anda yang akan digunakan dalam situs ini.</p>
        </div>
        <form class="profil" method="post" action="{{secure_url('/akunSaya/editProfil')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="profilContent" style="display: flex">
                <div class="profilPict">
                    @if($user->image)
                        <img id="fotoProfil" src="{{Storage::disk('s3')->url('uploads/'.$user->image)}}">
                    @else
                        <img id="fotoProfil" src="{{secure_asset('images/dummyUser2.png')}}">
                    @endif
                    <input accept="image/*" type="file" id="inputProfil" name="inputProfil" onchange="inputChange()"/>
                    <input type="button" value="Pilih Gambar" onclick="document.getElementById('inputProfil').click();">
                    <p class="contentSemiNormal">Ukuran gambar: maks. 10 MB</p>
                    <p class="contentSemiNormal">Format gambar: .JPG, .JPEG, .PNG</p>
                </div>
                <div class="biodata">
                    <h3 class="contentSemiNormal">Biodata Diri</h3>
                    <div class="section">
                        <p class="contentSemiNormal" style="color: #747474;">Nama</p>
                        <input type="text" name="nama" value="{{$user->username}}">
                    </div>
                    <div class="section">
                        <p class="contentSemiNormal" style="color: #747474;">Tanggal Lahir</p>
                        <p class="contentSemiNormal" style="font-weight: bold"><?php $date = date_create($user->bod); echo date_format($date,"d/m/Y");?></p>
                    </div>
                    <div class="section">
                        <p class="contentSemiNormal" style="color: #747474;">Gender</p>
                        <select name="gender" >
                            <option value="1" <?php if($user->gender=="1") echo 'selected="selected"'; ?>>Pria</option>
                            <option value="2" <?php if($user->gender=="2") echo 'selected="selected"'; ?>>Wanita</option>
                        </select>
                    </div>
                    <h3 class="contentSemiNormal">Kontak</h3>
                    <div class="section">
                        <p class="contentSemiNormal" style="color: #747474;">Email</p>
                        <p class="contentSemiNormal" style="font-weight: bold">{{$user->email}}</p>
                    </div>
                    <div class="section">
                        <p class="contentSemiNormal" style="color: #747474;">Nomor HP</p>
                        <input type="text" name="phoneNumber" value="{{$user->phone_number}}">
{{--                        <p class="contentSemiNormal" style="font-weight: bold">08112345678</p>--}}
                    </div>
                </div>
            </div>
            <div class="buttonSimpan">
                <button class="button buttonYellow" type="submit">
                    <img src="{{ secure_asset('images/checkBlack.png') }}">
                    <p>Simpan</p>
                </button>
            </div>
        </form>
    </div>
@endsection

