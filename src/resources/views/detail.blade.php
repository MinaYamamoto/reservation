@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="store">
    <div class="store__detail">
        <div class="back__button">
            <button class="back__button-submit">＜</button>
        </div>
        <div class="store__name">
            <h2>仙人</h2>
        </div>
        <div class="store__img">
            <img></img>
        </div>
        <div class="store__tag">
            <p class="region__tag">#東京都</p>
            <p class="genres__tag">#寿司</p>
        </div>
        <div class="store__overview">
            <p>料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。</p>
        </div>
    </div>
    <div class="store__reserve">
        <h2 class="reserve__ttl">予約</h2>
        <div class="reserve__day">
            <input type="date">
        </div>
        <div class="reserve__time">
            <select>
                <option>17:00</option>
            </select>
        </div>
        <div class="reserve__num">
            <select>
                <option>1人</option>
            </select>
        </div>
        <div class="reserve__detail">
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
        </div>
    <div class="reserve__button">
        <button class="reserve__button-submit">予約する</button>
    </div>
    </div>
</div>
@endsection