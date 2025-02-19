@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
<main class="main">
    <div class="profile">
        <div class="profile_form">
            <h2 class="profile_ttl">
                    プロフィール設定
            </h2>
            <div class="profile_icon_item">
                <div class="profile_icon">
                    <img id="profile-img">
                </div>
                <div class="deco-file">
                    <label>
                        画像を選択する
                        <input type="file" name="file" multiple>
                    </label>
                </div>
            </div>
            <form action="">
                <div class="profile_form_item">
                    <span>ユーザー名</span>
                    <input type="text">
                </div>
                <div class="profile_form_item">
                    <span>郵便番号</span>
                    <input type="text">
                </div>
                <div class="profile_form_item">
                    <span>住所</span>
                    <input type="text">
                </div>
                <div class="profile_form_item">
                    <span>建物名</span>
                    <input type="text">
                </div>
            </form>
            <div class="profile_form_btn">
                <input type="submit" value="更新する">
            </div>
        </div>
    </div>
</main>
<script src="{{asset('js/profile.js')}}"></script>
@endsection