<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COACTHTECHフリマ</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}" />
    @yield('css')
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="header_contents">
                <div class="header_logo">
                    <img src={{asset("img/logo.svg")}} alt="" class="header-logo">
                </div>
                <div class="header_search">
                    <form action="">
                        <input type="text" placeholder="    なにをお探しですか？">
                    </form>
                </div>
                {{-- @php
                $currentPath = Request::path();
                @endphp
                @if (strpos($currentPath, 'register') !== true  || strpos($currentPath, 'login') !== true) { --}}
                    <nav class="responsive_btn">
                        <div class="menu_line"></div>
                        <div class="menu_line"></div>
                        <div class="menu_line"></div>
                    </nav>
                    <nav class="header_nav">
                        <ul class="header_nav_lists">
                            @if (Auth::check())
                            <li class="nav_link">
                                <form action="/logout" method="post">
                                @csrf
                                    <button>ログアウト</button>
                                </form>
                            </li>
                            @else
                            <li class="nav_link"><a href="/login">ログイン</a></li>
                            @endif
                            <li class="nav_link"><a href="">マイページ</a></li>
                            <li class="nav_link listing"><a href="">出品</a></li>
                        </ul>
                    </nav>
                {{-- }
                @endif --}}
            </div>
        </header>
        <div class="header_dummy"></div>
        @yield('content')
    </div>
    <script src={{asset("js/header.js")}}></script>
</body>
</html>