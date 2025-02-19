@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<main class="main">
    <div class="register">
        <div class="register_form">
            <h2 class="register_ttl">
                    会員登録
            </h2>
            <form id="register_form" action="/register" method="POST">
                @csrf
                <div class="register_form_item">
                    <span>ユーザー名</span>
                    <input type="text" name="name" value="{{ old('name') }}" />
                    @error('name'){{ $message }}@enderror
                </div>
                <div class="register_form_item">
                    <span>メールアドレス</span>
                    <input type="email" name="email" value="{{ old('email') }} 
                    @error('email'){{ $message }}@enderror" />
                </div>
                <div class="register_form_item">
                    <span>パスワード</span>
                    <input type="password" name="password" />
                    @error('password'){{ $message }}@enderror
                </div>
                <div class="register_form_item">
                    <span>確認用パスワード</span>
                    <input type="password" name="password_confirmation" />
                </div>
            </form>
            <div id="form" class="register_form_btn">
                <input form="register_form" type="submit" value="登録する">
            </div>
            <a href="/login" class="login_link">ログインはこちら</a>
        </div>
    </div>
</main>
@endsection