@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<main class="main">
    <div class="login">
        <div class="login_form">
            <h2 class="login_ttl">
                    ログイン
            </h2>
            <form id="login_form" action="/login" method="post">
            @csrf
                <div class="login_form_item">
                    <span>ユーザー名/メールアドレス</span>
                    <input type="email" name="email" value="{{ old('email') }}" />
                </div>
                <div class="login_form_item">
                    <span>パスワード</span>
                    <input type="password" name="password" />
                </div>
            </form>
            <div class="login_form_btn">
                <input form="login_form" type="submit" value="ログインする">
            </div>
            <a href="/register" class="register_link">会員登録はこちら</a>
        </div>
    </div>
</main>
@endsection