@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/reservation_detail.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="reservation__content">
    <h2 class="reservation__ttl">予約詳細</h2>
    <div class="reservation__card">
        <i class="fa-regular fa-clock"></i>
        <table class="reservation__table">
            <tr>
                <th class="reservation__table-th">UserName</th>
                <td class="reservation__table-td">{{ $reservation->user->name }}</td>
            </tr>
            <tr>
                <th class="reservation__table-th">Shop</th>
                <td class="reservation__table-td">{{ $reservation->store->name }}</td>
            </tr>
            <tr>
                <th class="reservation__table-th">Date</th>
                <td class="reservation__table-td">{{ $reservation->date }}</td>
            </tr>
            <tr>
                <th class="reservation__table-th">Time</th>
                <td class="reservation__table-td">{{ $reservation->time->time->format('H:i') }}</td>
            </tr>
            <tr>
                <th class="reservation__table-th">Number</th>
                <td class="reservation__table-td">{{ $reservation->num->num }}人</td>
            </tr>
        </table>
    </div>
    <div class="back__button">
        <button class="back__button-submit" onClick="history.back()">一覧に戻る</button>
    </div>
</div>
@endsection