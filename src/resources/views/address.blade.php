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
            <form action="">
                <div class="address_form_item">
                    <span>郵便番号</span>
                    <input type="text">
                </div>
                <div class="address_form_item">
                    <span>住所</span>
                    <input type="text">
                </div>
                <div class="address_form_item">
                    <span>建物名</span>
                    <input type="text">
                </div>
            </form>
            <div class="address_form_btn">
                <input type="submit" value="更新する">
            </div>
        </div>
    </div>
</main>
@endsection