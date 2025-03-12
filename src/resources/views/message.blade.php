@extends('layout.header')

@section('css')
<link rel="stylesheet" href="{{asset('css/message.css')}}">
@endsection

@section('content')
<div class="main">
    <div class="message">
        <h1>
            @if(@isset($displayMessage))
            {{$displayMessage}}
            @else
            この機能はログイン後にご利用いただけます。
            @endif
        </h1>
        <form class="message_form" action="@if(@isset($btnPath)){{$btnPath}}@else'/login'@endif" method="GET">
        @csrf
            <button>
                @if(@isset($btnMessage))
                {{$btnMessage}}
                @else
                ログインする
                @endif
            </button>
        </form>
    </div>
</div>
@endsection