@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/purchase.css')}}">
@endsection

@section('content')
<main class="main">
    <div class="purchase">
        <div class="purchase_left">
            <div class="purchase_top">
                <div class="item_img">
                    <img src="{{asset($item->item_img)}}" alt="">
                </div>
                <div class="purchase_top_box">
                    <h2 class="item_name">{{$item->item_name}}</h2>
                    <span class="item_price"><span class="yen">&yen;</span>{{$item->item_price}}</span>
                </div>
            </div>
            <form id="purchase_form" action="/purchase/purchasePost" method="POST">
            @csrf
                <div class="purchase_middle">
                    <h5 class="purchase_middle_ttl">
                        支払い方法
                    </h5>
                    <div class="select-wrapper">
                        <select class="select" name="payment" id="select">
                            <option value="">選択してください</option>
                            <option value="コンビニ払い">コンビニ払い</option>
                            <option value="カード払い">カード払い</option>
                        </select>
                    </div>
                    <span class="error">@error('payment'){{ $message }}@enderror</span>
                </div>
                <div class="purchase_bottom">
                    <div class="purchase_bottom_ttl">
                        <h5>配送先</h5>
                        <a href="/purchase/address/{{$item->id}}">変更する</a>
                    </div>
                    <div class="purchase_bottom_box">
                        <input type="hidden" name="item_id" value="{{$item->id}}">
                        <span class="address">〒 {{$postal_code}}</span>
                        <input type="hidden" name="postal_code" value="{{$postal_code}}">
                        <span>{{$address." ".$building_name}}</span>
                        <input type="hidden" name="address" value="{{$address}}">
                        <input type="hidden" name="building_name" value="{{$building_name}}">
                    </div>
                </div>
            </div>
        </form>
        <div class="purchase_top_right">
            <div class="confirm">
                <div class="price_confirm">
                    <span class="price_confirm_left">
                        商品代金
                    </span>
                    <span class="price_confirm_right">
                        <span class="yen">&yen;</span>{{$item->item_price}}
                    </span>
                </div>
            </div>
            <div class="confirm">
                <div class="payment_confirm">
                    <span class="payment_confirm_left">
                        支払い方法
                    </span>
                    <span class="payment_confirm_right" id="paymentConfirm"></span>
                </div>
            </div>
            <div class="purchase_btn">
                <input form="purchase_form" type="submit" value="購入する">
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="{{asset("js/purchase.js")}}"></script>
@endsection