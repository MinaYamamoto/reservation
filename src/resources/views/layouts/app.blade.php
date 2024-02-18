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
            <div class="hamburger" id="hamburger">
                <span class="row"></span>
                <span class="row"></span>
                <span class="row"></span>
            </div>
            <h1 class="header__logo">
                <a href="/">Rese</a>
            </h1>
        @yield('header')
        </div>
        @guest
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="close" id="close">
                <span class="square__button"></span>
            </div>
            <ul>
                <li class="hamburger-item"><a href="/">Home</a></li>
                <li class="hamburger-item"><a href="/register">Registration</a></li>
                <li class="hamburger-item"><a href="/login">Login</a></li>
            </ul>
        </div>
        @endguest
        @auth
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="close" id="close">
                <span class="square__button"></span>
            </div>
            <ul>
                <li class="hamburger-item"><a href="/">Home</a></li>
                <form class="logout" action="/logout" method="POST">
                    @csrf
                    <li class="hamburger-item"><button class="logout__button">Logout</button></li>
                </form>
                <li class="hamburger-item"><a href="/mypage">Mypage</a></li>
            </ul>
        </div>
        @endauth
        @can('admin-authority')
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="close" id="close">
                <span class="square__button"></span>
            </div>
            <ul>
            <li class="hamburger-item"><a href="/">Home</a></li>
            <li class="hamburger-item"><a href="/representative">Representative</a></li>
            <li class="hamburger-item"><a href="/logout">Logout</a></li>
            </ul>
        </div>
        @endcan
        @can('representative-authority')
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="close" id="close">
                <span class="square__button"></span>
            </div>
            <ul>
                <li class="hamburger-item"><a href="/">Home</a></li>
                <li class="hamburger-item"><a href="/store">Store information</a></li>
                <li class="hamburger-item"><a href="/reservation">Reservation list</a></li>
                <li class="hamburger-item"><a href="/logout">Logout</a></li>
            </ul>
        </div>
        @endcan
        <script src="{{ asset('js/hamburger.js')}}"></script>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>