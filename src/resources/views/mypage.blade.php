@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="user">
    <div class="user_icon">
        <img src="@isset($profile){{asset($profile->icon_img)}}@endisset" alt="">
    </div>
    <h2 class="user_name">{{Auth::user()->name}}</h2>
    <div class="profile_edit">
        <a href="mypage/profile">
            プロフィールを編集
        </a>
    </div>
</div>
<div class="screen_selection">
    <div class="screen_selection_item">
        <form action="" method="GET">
            <button class="exhibited_item" formaction="/mypage/page=sell">
                出品した商品
            </button>
            <button class="purchased_item" formaction="/mypage/page=buy">
                購入した商品
            </button>
        </form>
    </div>
</div>
<main class="main">
    <div class="item_wrapper" action="">
        @isset($items)
        @foreach($items as $item)
        <a href="/item/{{$item->id}}" class="item">
            <div class="item_img">
                <img src="{{asset($item->item_img)}}" alt="商品画像">
            </div>
            <h2 class="item_ttl">
                {{$item->item_name}}
            </h2>
        </a>
        @endforeach
        @endisset
        <div class="item_dummy"></div>
    </div>
</main>
@endsection