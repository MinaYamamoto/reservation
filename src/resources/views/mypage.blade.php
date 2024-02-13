@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
@endsection

@section('content')
<div class="user__name">
    <h2>testさん</h2>
</div>
<div class="user__mypage">
    <div class="user__reserve">
        <h2 class="reserve__ttl">予約状況</h2>
        <div class="reserve__card">
            <span class="material-symbols-outlined">
                schedule
            </span>
            <h2 class="reserve__ttl-num">予約１</h2>
            <table class="reserve__table">
                <tr>
                    <th>Shop</th>
                    <td>仙人</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>2021-04-01</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>17:00</td>
                </tr>
                <tr>
                    <th>Number</th>
                    <td>1人</td>
                </tr>
            </table>
            <div class="change">
                <button class="change__button">予約の変更</button>
            </div>
            <div class="cancel">
                <button class="cancel__button">予約のキャンセル</button>
            </div>
        </div>
    </div>
    <div class="user__bookmark">
        <h2 class="bookmark__ttl">お気に入り店舗</h2>
        <div class="bookmark__list">
            <div class="bookmark__card">
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
            <div class="bookmark__card">
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
            <div class="bookmark__card">
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
    </div>
</div>
@endsection