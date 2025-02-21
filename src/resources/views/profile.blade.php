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
            <form id="profile_form" action="/mypage/profile/add" enctype="multipart/form-data" method="POST">
            @csrf
                <div class="profile_icon_item">
                    <div class="profile_icon">
                        <img id="profile-img" @isset($user)src="{{asset($user->icon_img)}}"@endisset>
                    </div>
                    <div class="deco-file">
                        <label>
                            画像を選択する
                            <input type="file" name="icon_img" multiple>
                        </label>
                    </div>
                </div>
                <div class="profile_form_item">
                    <span>ユーザー名</span>
                    <input type="text" name="name" value="{{old('name')}}@isset($user){{$user->name}}@endisset">
                </div>
                <div class="profile_form_item">
                    <span>郵便番号</span>
                    <input type="text" name="postal_code" value="{{old('postal_code')}}@isset($user){{$user->postal_code}}@endisset">
                </div>
                <div class="profile_form_item">
                    <span>住所</span>
                    <input type="text" name="address" value="{{old('address')}}@isset($user){{$user->address}}@endisset">
                </div>
                <div class="profile_form_item">
                    <span>建物名</span>
                    <input type="text" name="building_name" value="{{old('building_name')}}@isset($user){{$user->building_name}}@endisset">
                </div>
            </form>
            <div class="profile_form_btn">
                <input form="profile_form" type="submit" value="更新する">
            </div>
        </div>
    </div>
</main>
<script src="{{asset('js/profile.js')}}"></script>
@endsection