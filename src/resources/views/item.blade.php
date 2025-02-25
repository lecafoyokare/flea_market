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
            <span class="item_brand">ブランド名</span>
            <span class="item_price">&yen;<span class="item_price_font_big">{{$item->item_price}}</span> (税込)</span>
            <div class="item_evaluation">
                <div class="add_my_list">
                    <form action="/item/mylist" method="post">
                    @csrf
                        <label for="add_my_list" class="add_my_list_click" onclick="">
                            <img class="add_my_list_white" src="{{asset("img/add_my_list.svg")}}" alt="">
                            <img class="add_my_list_yellow" src="{{asset("img/add_my_list_yellow.svg")}}" alt="">
                            <input id="add_my_list" type="submit" name="item_id" value="{{$item->id}}">
                        </label>
                    </form>
                    <span>3</span>
                </div>
                <div class="comment_link">
                    <a href="#number_of_comment">
                        <img src="{{asset("img/ふきだし.svg")}}" alt="">
                    </a>
                    <span>1</span>
                </div>
            </div>
            <div class="purchase_procedure_btn">
                <form action="">
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
                        <td>
                            <div class="item_category_wrapper">洋服</div>
                        </td>
                        <td>
                            <div class="item_category_wrapper">メンズ</div>
                        </td>
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
                    コメント(1)
                </span>
                <div class="user_comment">
                    <div class="user">
                        <div class="user_icon"></div>
                        <span class="user_name">admin</span>
                    </div>
                    <p class="comment_txt">
                        こちらにコメントが入ります。
                    </p>
                </div>
                <div class="comment_on_item">
                    <h4 class="comment_on_item_ttl">
                        商品へのコメント
                    </h4>
                    <form action="" class="comment_on_item_form">
                        <textarea name="" id=""></textarea>
                    </form>
                    <div class="comment_on_item_btn">
                        <input type="submit" value="コメントを送信する">
                        <input type="hidden">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
<style>
    .add_my_list_yellow {
        display: none;
    }
    .purchase_procedure_btn button {
        /* background-color: #b4b4b4; */
    }
</style>
@endsection