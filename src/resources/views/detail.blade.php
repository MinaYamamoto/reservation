@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="store">
    <div class="store__detail">
        <div class="back__button">
            <button class="back__button-submit" onClick="history.back()"><i class="fa-solid fa-chevron-left"></i></button>
        </div>
        <div class="store__name">
            <h2>{{$store->name}}</h2>
        </div>
        <div class="store__img">
            <img></img>
        </div>
        <div class="store__tag">
            <p class="region__tag">#{{ $store['region'] ['name']}}</p>
            <p class="genres__tag">#{{ $store['genre'] ['name']}}</p>
        </div>
        <div class="store__overview">
            <p>{{ $store['overview'] }}</p>
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
                    <td>{{$store->name}}</td>
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