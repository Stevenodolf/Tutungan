@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/src/keranjang/keranjang.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="keranjang">
            <div class="keranjangContent">
                <div class="leftSection">
                    <div class="sectionContent">
                        <div class="header">
                            <p class="contentExtraBig title">Keranjang</p>
                            <p class="contentSemiNormal buttonHapusSemua">Hapus Semua</p>
                        </div>
                        <div class="cartItems">
                            @foreach($cart_items as $cart_item)
                                <div class="itemCell">
                                <img class="itemImg" src="{{ asset('uploads/'.json_decode($cart_item->getWishRelation->image)[0]) }}">
                                <div class="itemInfo">
                                    <p class="contentSemiBig wishName">{{ $cart_item->getWishRelation->name }}</p>
                                    <p class="contentSemiBig itemTotalPrice">Rp{{number_format($cart_item->total_price, 0, ',', '.')}}</p>
                                </div>
                                <div class="editItem">
                                    <form class="editSection" method="post">
                                        {{ @csrf_field() }}
                                        <div class="deleteSection">
                                            <button type="submit" class="buttonDelete" formaction="{{ url('/cart/delete/'.$cart_item->id) }}">
                                                <img class="buttonImg" src="{{ asset('images/binRed.png') }}">
                                            </button>
                                        </div>
                                        <div class="itemQuantitySection">
                                            <div class="number-input">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                                                @php
                                                    $curr_qty = $cart_item->getWishRelation->curr_qty;
                                                    $target_qty = $cart_item->getWishRelation->target_qty;
                                                    $stock = $target_qty - $curr_qty;
                                                @endphp
                                                <input class="quantity" min="1" max="{{ $stock }}" name="qty" value="{{ $cart_item->qty }}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <form class="rightSection" method="post" action="{{ url('/cart') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="total_price" value="{{$cart->total_price}}">
                    <input type="hidden" name="total_qty" value="{{$cart->total_qty}}">
                    <p class="contentSemiNormal title">Total</p>
                    <p class="contentSemiBig cartTotalPrice">Rp{{number_format($cart->total_price, 0, ',', '.')}} ({{ $cart->total_qty }} pcs)</p>
                    <button type="submit" class="button buttonYellow buttonBeli">Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
