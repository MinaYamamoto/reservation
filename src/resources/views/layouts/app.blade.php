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
                <a href="/">Rese</a>
            </h1>
        @yield('header')
        </div>
        @guest
        <ul class="slide-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/register">Registration</a></li>
            <li><a href="/login">Login</a></li>
        </ul>
        @endguest
        @auth
        <ul class="slide-menu">
            <li><a href="/">Home</a></li>
            <form class="logout" action="/logout" method="POST">
                @csrf
                <li><button class="logout__button">Logout</button></li>
            </form>
            <li><a href="/mypage">Mypage</a></li>
        </ul>
        @endauth
        @can('admin-authority')
        <ul class="slide-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/representative">Representative</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
        @endcan
        @can('representative-authority')
        <ul class="slide-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/store">Store information</a></li>
            <li><a href="/reservation">Reservation list</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
        @endcan
        <script src="{{ asset('js/hamburger.js')}}"></script>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>