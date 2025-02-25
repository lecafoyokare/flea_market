@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="screen_selection">
    <div class="screen_selection_item">
        <form method="" method="GET">
            <button class="recommendation_btn" formaction="/">
                おすすめ
            </button>
            <button class="my_list_btn" formaction="/page=mylist">
                マイリスト
            </button>
        </form>
    </div>
</div>
<main class="main">
    <div class="item_wrapper" action="">
        @if(@isset($items))
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
        @else
            @isset($mylists)
                @foreach($mylists as $mylist)
                <a href="/item/{{$mylist->item->id}}" class="item">
                    <div class="<?php echo ($mylist->item->sold ==0) ? "item_img" : "sold_item_img" ; ?>">
                        <img src="{{asset($mylist->item->item_img)}}" alt="商品画像">
                    </div>
                    <h2 class="item_ttl">
                        {{$mylist->item->item_name}}
                    </h2>
                </a>
                @endforeach
            @endisset
        @endif
        @isset($soldItems)
            @foreach($soldItems as $soldItem)
            <a href="/item/{{$soldItem->id}}" class="item">
                <div class="sold_item_img">
                    <img src="{{asset($soldItem->item_img)}}" alt="商品画像">
                </div>
                <h2 class="item_ttl">
                    {{$soldItem->item_name}}
                </h2>
            </a>
            @endforeach
        @endisset
        <div class="item_dummy"></div>
    </div>
</main>

<style>
@if ($color==0)
button.recommendation_btn {
    color: rgb(255, 0, 0);
}
@else
button.my_list_btn {
    color: rgb(255, 0, 0);
}
@endif
</style>

@endsection