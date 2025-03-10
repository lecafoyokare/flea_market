@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/item.css')}}">
@endsection

@section('content')
<main class="main">
    <div class="item">
        <div class="item_img">
            <img src="{{asset($item->item_img)}}" alt="">
        </div>
        <div class="item_right">
            <h2 class="item_ttl">{{$item->item_name}}</h2>
            <span class="item_brand">{{$item->item_brand}}</span>
            <span class="item_price">&yen;<span class="item_price_font_big">{{$item->item_price}}</span> (税込)</span>
            <div class="item_evaluation">
                <div class="add_my_list">
                    @if (Auth::check())
                    <form action="/item/mylist" method="post">
                    @else
                    <form action="/message" method="get">
                    @endif
                    @csrf
                        <label for="add_my_list" class="add_my_list_click" onclick="">
                            <img class="add_my_list_white" src="{{asset("img/add_my_list.svg")}}" alt="">
                            <img class="add_my_list_yellow" src="{{asset("img/add_my_list_yellow.svg")}}" alt="">
                            <input id="add_my_list" type="submit" name="item_id" value="{{$item->id}}">
                        </label>
                    </form>
                    <span>{{$mylistCount}}</span>
                </div>
                <div class="comment_link">
                    <a href="#number_of_comment">
                        <img src="{{asset("img/ふきだし.svg")}}" alt="">
                    </a>
                    <span>1</span>
                </div>
            </div>
            <div class="purchase_procedure_btn">
                @if (Auth::check())
                <form action="/purchase/{{$item->id}}" method="GET">
                @else
                <form action="/message" method="GET">
                @endif
                @csrf
                    <button>購入手続きへ</button> <!--disable判定-->
                    <input type="hidden">
                </form>
            </div>
            <section class="item_description">
                <h3 class="item_description_ttl">商品説明</h3>
                <p class="item_description_txt">
                    {{$item->item_description}}
                </p>
            </section>
            <section class="item_information">
                <h3 class="item_information_ttl">商品の情報</h3>
                <table>
                    <tr>
                        <th>カテゴリー</th>
                        @isset ($categories)
                        @foreach ($categories as $category)
                        <td>
                            <div class="item_category_wrapper">{{$category->category}}</div>
                        </td>
                        @endforeach
                        @endisset
                    </tr>
                    <tr>
                        <th>商品の状態</th>
                        <td class="item_condition">
                            {{$item->item_condition}}
                        </td>
                    </tr>
                </table>
            </section>
            <div class="comment">
                <span class="number_of_comment" id="number_of_comment">
                    コメント({{$commentCount}})
                </span>
                @foreach ($comments as $comment)
                <div class="user_comment">
                    <div class="user">
                        <img class="user_icon" src="{{asset($comment->profile->icon_img)}}">
                        <span class="user_name">{{$comment->profile->user->name}}</span>
                    </div>
                    <p class="comment_txt">
                        {{$comment->comment}}
                    </p>
                </div>
                @endforeach
                <div class="comment_on_item">
                    <h4 class="comment_on_item_ttl">
                        商品へのコメント
                    </h4>
                    @if (Auth::check())
                    <form id="comment_form" action="/item/comment" class="comment_on_item_form" method="POST">
                    @else
                    <form id="comment_form" action="/message" class="comment_on_item_form" method="get">
                    @endif
                    @csrf
                        <textarea name="comment"></textarea>
                        <input type="hidden" name="item_id" value="{{$item->id}}">
                    </form>
                    <div class="comment_on_item_btn">
                        <input form="comment_form" type="submit" value="コメントを送信する">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
<style>
@if ($color==0)
    .add_my_list_yellow {
        display: none;
    }
@else
    .add_my_list_white {
        display: none;
    }
@endif
.purchase_procedure_btn button {
        /* background-color: #b4b4b4; */
    }
</style>
@endsection