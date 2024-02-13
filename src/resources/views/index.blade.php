@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
@endsection

@section('header')
<div class="header__search">
    <div class="search__area">
        <select class="area">
            <option>All area</option>
        </select>
    </div>
    <div class="search__genre">
        <select class="genre">
            <option>All genre</option>
        </select>
    </div>
    <div class="search__text">
        <input class="text" placeholder="&#xF002;   search...">
    </div>
</div>
@endsection

@section('content')
<div class="card__list">
    <div class="card">
        <div class="card__img">
            <img></img>
        </div>
        <div class="card__content">
            <h2 class="card__store">仙人</h2>
        </div>
        <div class="card__tag">
            <p class="region__tag">#東京都</p>
            <p class="genres__tag">#寿司</p>
        </div>
        <div class="card__button">
            <button class="card__button-submit">詳しくみる</button>
            <button class="card__button-bookmark">お気に入り</button>
        </div>
    </div>
    <div class="card">
        <div class="card__img">
            <img></img>
        </div>
        <div class="card__content">
            <h2 class="card__store">仙人</h2>
        </div>
        <div class="card__tag">
            <p class="region__tag">#東京都</p>
            <p class="genres__tag">#寿司</p>
        </div>
        <div class="card__button">
            <button class="card__button-submit">詳しくみる</button>
            <button class="card__button-bookmark">お気に入り</button>
        </div>
    </div>
    <div class="card">
        <div class="card__img">
            <img></img>
        </div>
        <div class="card__content">
            <h2 class="card__store">仙人</h2>
        </div>
        <div class="card__tag">
            <p class="region__tag">#東京都</p>
            <p class="genres__tag">#寿司</p>
        </div>
        <div class="card__button">
            <button class="card__button-submit">詳しくみる</button>
            <button class="card__button-bookmark">お気に入り</button>
        </div>
    </div>
    <div class="card">
        <div class="card__img">
            <img></img>
        </div>
        <div class="card__content">
            <h2 class="card__store">仙人</h2>
        </div>
        <div class="card__tag">
            <p class="region__tag">#東京都</p>
            <p class="genres__tag">#寿司</p>
        </div>
        <div class="card__button">
            <button class="card__button-submit">詳しくみる</button>
            <button class="card__button-bookmark">お気に入り</button>
        </div>
    </div>
    <div class="card">
        <div class="card__img">
            <img></img>
        </div>
        <div class="card__content">
            <h2 class="card__store">仙人</h2>
        </div>
        <div class="card__tag">
            <p class="region__tag">#東京都</p>
            <p class="genres__tag">#寿司</p>
        </div>
        <div class="card__button">
            <button class="card__button-submit">詳しくみる</button>
            <button class="card__button-bookmark">お気に入り</button>
        </div>
    </div>
</div>
@endsection