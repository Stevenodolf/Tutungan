@extends('layouts.app')

@section('head')
    <script src="{{ secure_asset('js/src/keranjang/keranjang.js') }}"></script>
@endsection

@section('content')
    <div class="contentContainer">
        <div class="keranjang">
            <div class="keranjangContent">
                <div class="leftSection">
                    <div class="sectionContent">
                        <div class="header">
                            <p class="contentExtraBig title">Keranjang</p>
                            @if(sizeof($cart_items) != 0)
                                <a href="/cart/deleteAll" class="contentSemiNormal buttonHapusSemua">Hapus Semua</a>
                            @endif
                        </div>
                        <div class="cartItems">
                            @if(count($cart_items) > 0)
                                @php
                                    $idx = 1;
                                @endphp
                                @foreach($cart_items as $cart_item)
                                    <div id="{{ $cart_item->id }}" class="itemCell">
                                        <img class="itemImg" src="{{Storage::disk('s3')->url('uploads/'.json_decode($cart_item->getWishRelation->image)[0])}}" onclick="window.location='{{ secure_url('/wish/'.$cart_item->getWishRelation->id) }}'">
                                        <div class="itemInfo">
                                            <p class="contentSemiBig wishName">{{ $cart_item->getWishRelation->name }}</p>
                                            <p class="contentSemiBig itemTotalPrice">Rp{{number_format($cart_item->total_price, 0, ',', '.')}}</p>
                                        </div>
                                        <div class="editItem">
                                            <form class="editSection" method="post">
                                                {{ @csrf_field() }}
                                                <input type="hidden" name="cart_item_id" value="{{$cart_item->id}}">
                                                <div class="deleteSection">
                                                    {{--                                                <button type="submit" class="buttonDelete" formaction="{{ secure_url('/cart/delete') }}">--}}
                                                    {{--                                                    <img class="buttonImg" src="{{ secure_asset('images/binRed.png') }}">--}}
                                                    {{--                                                </button>--}}
                                                    <button data-role="delete" data-id="{{ $cart_item->id }}" type="button" class="buttonDelete">
                                                        <img class="buttonImg" src="{{ secure_asset('images/binRed.png') }}">
                                                    </button>
                                                </div>
                                                <div class="itemQuantitySection">
                                                    <div class="number-input">
                                                        <button type="submit" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" formaction="{{ secure_url('/cart/update') }}"></button>
                                                        @php
                                                            $curr_qty = $cart_item->getWishRelation->curr_qty;
                                                            $target_qty = $cart_item->getWishRelation->target_qty;
                                                            $stock = $target_qty - $curr_qty;
                                                        @endphp
                                                        <input class="quantity" min="1" max="{{ $stock }}" name="qty" value="{{ $cart_item->qty }}" type="number">
                                                        <button type="submit" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus" formaction="{{ secure_url('/cart/update') }}"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @php
                                        $idx += 1;
                                    @endphp
                                @endforeach
                            @else
                                <div>
                                    <img style="width: 250px;" src="{{ secure_asset('images/emptyCart.png')}}">
                                    <strong class="contentSemiBig">Keranjang Kosong.</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <form class="rightSection" method="post" action="{{ secure_url('/cart') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="total_price" value="{{$cart->total_price}}">
                    <input type="hidden" name="total_qty" value="{{$cart->total_qty}}">
                    <p class="contentSemiNormal title">Total</p>
                    <p class="contentSemiBig cartTotalPrice">Rp{{number_format($cart->total_price, 0, ',', '.')}} ({{ $cart->total_qty }} pcs)</p>
                    @if(sizeof($cart_items) != 0)
                        <button type="submit" class="button buttonYellow buttonBeli">Checkout</button>
                    @else
                        <button type="submit" class="button buttonGrey buttonBeli" disabled>Checkout</button>
                    @endif

                </form>
            </div>
        </div>
    </div>
@endsection
