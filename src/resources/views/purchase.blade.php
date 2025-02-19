@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/purchase.css')}}">
@endsection

@section('content')
<div class="screen_selection">
    <div class="screen_selection_item">
        <form method="" method="GET">
            <button class="recommendation_btn" formaction="/">
                おすすめ
            </button>
            <button class="my_list_btn" formaction="/">
                マイリスト
            </button>
        </form>
    </div>
</div>
<main class="main">
    <div class="item_wrapper" action="">
        @foreach($items as $item)
        <a href="/{{$item->id}}" class="item">
            <div class="item_img">
                <img src="{{asset($item->item_img)}}" alt="商品画像">
            </div>
            <h2 class="item_ttl">
                {{$item->item_name}}
            </h2>
        </a>
        @endforeach
        <div class="item_dummy"></div>
    </div>
</main>
@endsection