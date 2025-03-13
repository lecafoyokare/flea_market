@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/sell.css')}}">
@endsection

@section('content')
<main class="main">
    <div class="sell">
        <div class="sell_form">
            <h2 class="sell_ttl">
                    商品の出品
            </h2>
            <form id="sell_form" action="/sell/create" enctype="multipart/form-data" method="POST">
            @csrf
                <div class="sell_form_item">
                    <span>商品画像</span>
                    <div class="preview-area">
                        <div class="deco-file">
                        <label>画像を選択する
                        <input type="file" name="item_img" onchange="preview(this)" multiple>
                        </label>
                        </div>
                        <div class="image-preview"></div>
                    </div>
                </div>
                <div class="item_details">
                    <h3 class="item_details_ttl">
                        商品の詳細
                    </h3>
                    <div class="sell_form_item">
                        <span>カテゴリー</span>
                        <div class="item_category">
                            <div class="category_name" data-input-id="category1">ファッション</div>
                            <input type="hidden" name="category[]" id="category1" value="">
                            <div class="category_name" data-input-id="category2">家電</div>
                            <input type="hidden" name="category[]" id="category2" value="">
                            <div class="category_name" data-input-id="category3">インテリア</div>
                            <input type="hidden" name="category[]" id="category3" value="">
                            <div class="category_name" data-input-id="category4">レディース</div>
                            <input type="hidden" name="category[]" id="category4" value="">
                            <div class="category_name" data-input-id="category5">メンズ</div>
                            <input type="hidden" name="category[]" id="category5" value="">
                            <div class="category_name" data-input-id="category6">コスメ</div>
                            <input type="hidden" name="category[]" id="category6" value="">
                            <div class="category_name" data-input-id="category7">本</div>
                            <input type="hidden" name="category[]" id="category7" value="">
                            <div class="category_name" data-input-id="category8">ゲーム</div>
                            <input type="hidden" name="category[]" id="category8" value="">
                            <div class="category_name" data-input-id="category9">スポーツ</div>
                            <input type="hidden" name="category[]" id="category9" value="">
                            <div class="category_name" data-input-id="category10">キッチン</div>
                            <input type="hidden" name="category[]" id="category10" value="">
                            <div class="category_name" data-input-id="category11">ハンドメイド</div>
                            <input type="hidden" name="category[]" id="category11" value="">
                            <div class="category_name" data-input-id="category12">アクセサリー</div>
                            <input type="hidden" name="category[]" id="category12" value="">
                            <div class="category_name" data-input-id="category13">おもちゃ</div>
                            <input type="hidden" name="category[]" id="category13" value="">
                            <div class="category_name" data-input-id="category14">ベビー・キッズ</div>
                            <input type="hidden" name="category[]" id="category14" value="">
                        </div>
                    </div>
                    <div class="sell_form_item">
                        <span>商品の状態</span>
                        <div class="select-wrapper">
                            <select class="select" name="item_condition">
                                <option value="">選択してください</option>
                                <option value="良好">良好</option>
                                <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
                                <option value="やや傷や汚れあり">やや傷や汚れあり</option>
                                <option value="状態が悪い">状態が悪い</option>
                            </select>
                        </div>
                        <span class="error">@error('item_condition'){{ $message }}@enderror</span>
                    </div>
                </div>
                <h3 class="item_name_description_ttl">
                    商品名と説明
                </h3>
                <div class="sell_form_item">
                    <span>商品名</span>
                    <input name="item_name" type="text">
                    <span class="error">@error('item_name'){{ $message }}@enderror</span>
                </div>
                <div class="sell_form_item">
                    <span>ブランド名</span>
                    <input name="item_brand" type="text">
                </div>
                <div class="sell_form_item">
                    <span>商品の説明</span>
                    <span class="error">@error('item_description'){{ $message }}@enderror</span>
                    <textarea name="item_description" id=""></textarea>
                </div>
                <div class="sell_form_item">
                    <span>販売価格</span>
                    <span class="error">@error('item_price'){{ $message }}@enderror</span>
                    <div class="item_price">
                        <input name="item_price" type="text">
                    </div>
                </div>
            </form>
            <div class="sell_form_btn">
                <input form="sell_form" type="submit" value="出品する">
            </div>
        </div>
    </div>
</main>
<script src="{{asset("js/sell.js")}}"></script>
@endsection