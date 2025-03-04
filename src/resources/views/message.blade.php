@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/message.css')}}">
@endsection

@section('content')
<div class="main">
    <div class="message">
        <h1>この機能はログイン後にご利用いただけます。</h1>
        <form class="thanks_form" action="/login">
            <button>ログインする</button>
        </form>
    </div>
</div>
@endsection