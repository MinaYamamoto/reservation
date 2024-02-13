@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/reservation_detail.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
@endsection

@section('content')
<div class="reservation__content">
    <h2 class="reservation__ttl">予約詳細</h2>
    <form>
        <div class="reservation__card">
            <span class="material-symbols-outlined">
                schedule
            </span>
            <table class="reservation__table">
                <tr>
                    <th>UserName</th>
                    <td>テスト　ユーザー</td>
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
    </form>
    <div class="back__button">
        <button class="back__button-submit">一覧に戻る</button>
    </div>
</div>
@endsection