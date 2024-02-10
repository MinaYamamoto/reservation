<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約管理</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('stylesheet')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="hamburger">
                <div class="hamburger__inner">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <h1 class="header__logo">
                <a href="#">Rese</a>
            </h1>
        @yield('header')
        </div>
        @guest
        <ul class="slide-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Registration</a></li>
            <li><a href="#">Login</a></li>
        </ul>
        @endguest
        @auth
        <ul class="slide-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Logout</a></li>
            <li><a href="#">Mypage</a></li>
        </ul>
        @endauth
        <script src="{{ asset('js/hamburger.js')}}"></script>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>