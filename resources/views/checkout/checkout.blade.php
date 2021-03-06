@extends('layoutPolos.app')

@section('head')
    <script>
        var payment = {id: "{{$payment->id}}", total_price: "{{$payment->total_price}}"};
    </script>
    <script src="{{ secure_asset('js/src/checkout/checkout.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="checkout">
            <form method="POST" action="{{ url("/checkout/".$payment->id) }}" enctype="multipart/form-data">
                @csrf
                {{ csrf_field() }}
                <div class="row">
                    <div class="columnA">
                        <p class="contentExtraBig">Checkout</p>
                        <p class="contentBig">Alamat Pengiriman</p>
                        <div class="information">
                            <p class="contentSemiBig">{{ $address->fullname }}</p>
                            <p class="contentSemiBig">{{ $address->phone_number }}</p>
                            <p class="contentSemiBig">{{ $address->address_detail }}</p>
                            <p class="contentSemiBig">{{ $kecamatan->nama }} - {{ $kabupaten->nama }}</p>
                            <p class="contentSemiBig">{{ $provinsi->nama }} {{ $address->kode_pos }}</p>
                        </div>
                        <div class="itemDetail">
                            @php
                                $grand_oti = 0;
                                $grand_itu = 0;
                                $grand_fee = 0;
                                $grand_payment = 0;
                            @endphp
                            @foreach ($payment_items as $payment_item)
                                @php
                                    $grand_oti = $grand_oti + $payment_item->total_oti;
                                    $grand_itu = $grand_itu + $payment_item->total_itu;
                                    $grand_fee = $grand_fee + $payment_item->total_fee;
                                    $grand_payment = $grand_payment + $payment_item->total_price;
                                @endphp
                                <div class="productDetail">
                                    <div class="detail">
                                        <img src="{{Storage::disk('s3')->url('uploads/'.json_decode($payment_item->getWishRelation->image)[0])}}"/>
                                        <div>
                                            <p class="contentSemiNormal wishName">{{$payment_item->getWishRelation->name}}</p>
                                            <p class="contentSmall qty">{{$payment_item->qty}} item</p>
                                            <p class="contentNormal totalPrice">Rp {{number_format($payment_item->total_price, 0, ',', '.')}}</p>
                                        </div>
                                    </div>
                                    <div class="shipmentDetail">
                                        <p class="contentSemiNormal">Pilih Pengiriman</p>
                                        <select class="button buttonYellow" id="pilihEkspedisi" name="domestic_shipper_id">
                                            <option value="">Pengiriman</option>
                                            @foreach ($dshippers as $dshipper)
                                                <option value="{{$dshipper->id}}">{{$dshipper->name}}</option>
                                            @endforeach
                                        </select>
                                        <div id="message"></div>
                                    </div>
                                </div>
                            @endforeach
    {{--                        <div class="productDetail">--}}
    {{--                            <div class="detail">--}}
    {{--                                <img src="{{secure_asset('images/dummyProduct.jpeg')}}"/>--}}
    {{--                                <div>--}}
    {{--                                    <p class="contentSemiNormal">Masker Medis Earloop Putih M+ 4Ply - Surgical Mask Isi 50 Pcs</p>--}}
    {{--                                    <p class="contentSmall">5 Box</p>--}}
    {{--                                    <p class="contentNormal">Rp250.000</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="shipmentDetail">--}}
    {{--                                <p class="contentSemiNormal">Pilih Pengiriman</p>--}}
    {{--                                <select>--}}
    {{--                                    <option value="">Pengiriman</option>--}}
    {{--                                    <option>1</option>--}}
    {{--                                    <option>2</option>--}}
    {{--                                    <option>3</option>--}}
    {{--                                </select>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
                        </div>
                    </div>
                    <div class="columnB">
                        <div class="total">
                            <h2>Ringkasan</h2>
                            <div class="ringkasanHarga">
                                @php
                                    // $oti =  $jumlah_wish * 30000;
                                    // $itu = $jumlah_wish * 20000;
                                    // $admin = $jumlah_wish * 2500;
                                    // $total_payment = $payment->total_price + $oti + $itu + $admin;

                                    $total_payment = $grand_payment + $grand_oti + $grand_itu + $grand_fee;
                                @endphp
                                {{-- <input type="hidden" name="grand_oti" id="grand_oti" value="{{$oti}}">
                                <input type="hidden" name="grand_itu" id="grand_itu" value="{{$itu}}">
                                <input type="hidden" name="grand_itu" id="grand_fee" value="{{$admin}}"> --}}
                                <input type="hidden" name="total_payment" id="total_payment" value="{{$total_payment}}">

                                <div class="section">
                                    <p class="contentSemiNormal">Total Harga</p>
                                    <p class="contentSemiNormal">Rp {{number_format($grand_payment, 0, ',', '.')}}</p>
                                </div>
                                <div class="section">
                                    <p class="contentSemiNormal">Asal Negara ke Indonesia</p>
                                    <p class="contentSemiNormal">Rp {{number_format($grand_oti, 0, ',', '.')}}</p>
                                </div>
                                <div class="section">
                                    <p class="contentSemiNormal">Indonesia ke User</p>
                                    <p class="contentSemiNormal">Rp {{number_format($grand_itu, 0, ',', '.')}}</p>
                                </div>
                                <div class="section">
                                    <p class="contentSemiNormal">Biaya Admin</p>
                                    <p class="contentSemiNormal">Rp {{number_format($grand_fee, 0, ',', '.')}}</p>
                                </div>
                            </div>
                            <div class="ringkasanTotal">
                                <p class="contentSemiNormal">Total Tagihan</p>
                                <p class="contentSemiNormal" style="color: red">Rp {{number_format($total_payment, 0, ',', '.')}}</p>
                            </div>

                            <a class="button buttonYellow" id="pilihPembayaran">Pilih Pembayaran</a>
                        </div>
                    </div>
                </div>

                <div class="blackContainer" id="blackContainer">
                    <div class="paymentPopup" id="paymentPopup">
                        <div class="title">
                            <h1>Pembayaran</h1>
                            <button type="button" id="closePopup">
                                <img src="{{secure_asset('images/close.png')}}"/>
                            </button>
                        </div>
                        <div class="section">
                            <div class="subSection">
                                <p class="contentSemiBig">Metode Pembayaran</p>
                                <a class="contentSemiNormal" style="color: rgba(49, 53, 59, 0.5);cursor: pointer" href="{{url('/akunSaya/kartukreditdebit')}}">Lihat Semua</a>
                            </div>
                            <div class="subSection2">
                                <img src="{{secure_asset('images/'. $card->card_type .'.png')}}">
                                <p class="contentSemiBig">{{ucfirst($card->card_type)}} ({{$card->card_number}})</p>
                            </div>
                        </div>
                        <div class="section" style="padding-top: 15px;border-top: 2px solid rgba(49, 53, 59, 0.3);">
                            <p class="contentSemiBig">Ringkasan Pembayaran</p>
                            <div class="subSection">
                                <p class="contentSemiNormal" style="color: rgba(49, 53, 59, 0.5);">Total Pembayaran</p>
                                <p class="contentSemiNormal" style="color: #FF0000;font-weight: bold;">Rp {{number_format($total_payment, 0, ',', '.')}}</p>
                            </div>
                            <a class="button buttonYellow" id="bayar">Bayar</a>
                        </div>

                    </div>
                    <div class="pembayaranVerifikasi" id="pembayaranVerifikasi">
                        <div class="section">
                            <img src="{{secure_asset('images/checkGreen.png')}}">
                            <h2 class="contentSemiExtraBig">Pembayaran Terverifikasi</h2>
                        </div>
                        <input type="hidden" name="address_id" value="{{ $address->id }}">
                        <button class="button buttonYellow" type="submit" id="kembaliBeranda" type="submit">Kembali Ke Beranda</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
