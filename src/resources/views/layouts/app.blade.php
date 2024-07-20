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
                Rese
            </h1>
        @yield('header')
        </div>
        @guest
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="close" id="close">
                <span class="square__button"></span>
            </div>
            <ul class="hamburger-items">
                <li class="hamburger-item"><a class="hamburger-link" href="/">Home</a></li>
                <li class="hamburger-item"><a class="hamburger-link" href="/register">Registration</a></li>
                <li class="hamburger-item"><a class="hamburger-link" href="/login">Login</a></li>
            </ul>
        </div>
        @endguest
        @can('user-authority')
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="close" id="close">
                <span class="square__button"></span>
            </div>
            <ul class="hamburger-items">
                <li class="hamburger-item"><a class="hamburger-link" href="/">Home</a></li>
                <li class="hamburger-item"><a class="hamburger-link" href="/mypage">Mypage</a></li>
                <form class="logout" action="/logout" method="POST">
                    @csrf
                    <li class="hamburger-item"><button class="logout__button">Logout</button></li>
                </form>
            </ul>
        </div>
        @elsecan('admin-authority')
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="close" id="close">
                <span class="square__button"></span>
            </div>
            <ul class="hamburger-items">
                <li class="hamburger-item"><a class="hamburger-link" href="/">Home</a></li>
                <li class="hamburger-item"><a class="hamburger-link" href="/admin/representative">Representative</a></li>
                <li class="hamburger-item"><a class="hamburger-link" href="/admin/storeupload">StoreUpload(CSV)</a></li>
                <form class="logout" action="/logout" method="POST">
                    @csrf
                    <li class="hamburger-item"><button class="logout__button">Logout</button></li>
                </form>
            </ul>
        </div>
        @elsecan('representative-authority')
        <div class="hamburger-menu" id="hamburger-menu">
            <div class="close" id="close">
                <span class="square__button"></span>
            </div>
            <ul class="hamburger-items">
                <li class="hamburger-item"><a class="hamburger-link" href="/">Home</a></li>
                <li class="hamburger-item"><a class="hamburger-link" href="/admin/storelist">Store information</a></li>
                <li class="hamburger-item"><a class="hamburger-link" href="/admin/reservation">Reservation list</a></li>
                <li class="hamburger-item"><a class="hamburger-link" href="/admin/mail">Mail</a></li>
                <form class="logout" action="/logout" method="POST">
                    @csrf
                    <li class="hamburger-item"><button class="logout__button">Logout</button></li>
                </form>
            </ul>
        </div>
        @endcan
        <script src="{{ mix('js/hamburger.js')}}"></script>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>