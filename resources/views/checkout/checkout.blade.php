@extends('layoutPolos.app')

@section('head')
    <script src="{{ asset('js/src/checkout/checkout.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="checkout">
            <div class="row">
                <div class="columnA">
                    <p class="contentExtraBig">Checkout</p>
                    <p class="contentBig">Alamat Pengiriman</p>
                    <div class="information">
                        <p class="contentSemiBig">Steven Odolf Yuwono</p>
                        <p class="contentSemiBig">082123456789</p>
                        <p class="contentSemiBig">
                            Jl. Budi Raya No.21, RT.1/RW.5, Kb. Jeruk,<br>
                            Kec. Kb. Jeruk, Kota Jakarta Barat,<br>
                            Daerah Khusus Ibukota Jakarta 11530
                        </p>
                    </div>
                    <div class="itemDetail">
                        <div class="productDetail">
                            <div class="detail">
                                <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                                <div>
                                    <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                    <p class="contentSmall">5 Box</p>
                                    <p class="contentNormal">Rp250.000</p>
                                </div>
                            </div>
                            <div class="shipmentDetail">
                                <p class="contentSemiNormal">Pilih Pengiriman</p>
                                <select>
                                    <option value="">Pengiriman</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="productDetail">
                            <div class="detail">
                                <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                                <div>
                                    <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                    <p class="contentSmall">5 Box</p>
                                    <p class="contentNormal">Rp250.000</p>
                                </div>
                            </div>
                            <div class="shipmentDetail">
                                <p class="contentSemiNormal">Pilih Pengiriman</p>
                                <select>
                                    <option value="">Pengiriman</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                        <div class="productDetail">
                            <div class="detail">
                                <img src="{{asset('images/dummyProduct.jpeg')}}"/>
                                <div>
                                    <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>
                                    <p class="contentSmall">5 Box</p>
                                    <p class="contentNormal">Rp250.000</p>
                                </div>
                            </div>
                            <div class="shipmentDetail">
                                <p class="contentSemiNormal">Pilih Pengiriman</p>
                                <select>
                                    <option value="">Pengiriman</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columnB">
                    <div class="total">
                        <h2>Ringkasan</h2>
                        <div class="ringkasanHarga">
                            <div class="section">
                                <p class="contentSemiNormal">Total Harga</p>
                                <p class="contentSemiNormal">Rp.250.000</p>
                            </div>
                            <div class="section">
                                <p class="contentSemiNormal">Origin to Indonesia</p>
                                <p class="contentSemiNormal">Rp.100.000</p>
                            </div>
                            <div class="section">
                                <p class="contentSemiNormal">Indonesia to User</p>
                                <p class="contentSemiNormal">Rp.20.000</p>
                            </div>
                            <div class="section">
                                <p class="contentSemiNormal">Asuransi</p>
                                <p class="contentSemiNormal">Rp.2.500</p>
                            </div>
                        </div>
                        <div class="ringkasanTotal">
                            <p class="contentSemiNormal">Total Tagihan</p>
                            <p class="contentSemiNormal" style="color: red">Rp147.500</p>
                        </div>

                        <button id="pilihPembayaran">Pilih Pembayaran</button>
                    </div>
                </div>
            </div>

            <div class="blackContainer" id="blackContainer">
                <div class="paymentPopup" id="paymentPopup">
                    <div class="title">
                        <h1>Pembayaran</h1>
                        <button id="closePopup">
                            <img src="{{asset('images/close.png')}}"/>
                        </button>
                    </div>
                    <div class="section">
                        <div class="subSection">
                            <p class="contentSemiBig">Metode Pembayaran</p>
                            <p class="contentSemiNormal" style="color: rgba(49, 53, 59, 0.5);cursor: pointer">Lihat Semua</p>
                        </div>
                        <div class="subSection2">
                            <img src="{{asset('images/bca.png')}}">
                            <p class="contentSemiBig">BCA Virtual Account</p>
                        </div>
                    </div>
                    <div class="section" style="padding-top: 15px;border-top: 2px solid rgba(49, 53, 59, 0.3);">
                        <p class="contentSemiBig">Ringkasan Pembayaran</p>
                        <div class="subSection">
                            <p class="contentSemiNormal" style="color: rgba(49, 53, 59, 0.5);">Total Pembayaran</p>
                            <p class="contentSemiNormal" style="color: #FF0000;font-weight: bold;">Rp.250.000</p>
                        </div>
                        <button id="bayar">Bayar</button>
                    </div>

                </div>
                <div class="pembayaranVerifikasi" id="pembayaranVerifikasi">
                    <div class="section">
                        <img src="{{asset('images/checkGreen.png')}}">
                        <h2>Pembayaran Terverifikasi</h2>
                    </div>
                    <button id="kembaliBeranda">Kembali Ke Beranda</button>
                </div>
            </div>
        </div>
    </div>
@endsection
