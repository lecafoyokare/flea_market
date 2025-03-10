@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/address.css')}}">
@endsection

@section('content')
<main class="main">
    <div class="address">
        <div class="address_form">
            <h2 class="address_ttl">
                    住所の変更
            </h2>
            <form id="address_form" action="/purchase/address/update?id={{$item_id->id}}" method="POST">
            @csrf
                <div class="address_form_item">
                    <span>郵便番号</span>
                    <input type="text" name="postal_code">
                </div>
                <div class="address_form_item">
                    <span>住所</span>
                    <input type="text" name="address">
                </div>
                <div class="address_form_item">
                    <span>建物名</span>
                    <input type="text" name="building_name">
                </div>
            </form>
            <div class="address_form_btn">
                <input form="address_form" type="submit" value="更新する">
            </div>
        </div>
    </div>
</main>
@endsection