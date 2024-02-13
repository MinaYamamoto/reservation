@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
@endsection

@section('content')
<div class="reservation">
    <h2>予約一覧</h2>
    <div class="reservation__date">
        <label>予約日：</label>
        <input type="date" class="search__day" name="search_day" value="2024/02/12" />
    </div>
    <form>
        <div class="reservation__table">
            <table>
                <tr>
                    <th>予約時間</th>
                    <th>予約人数</th>
                    <th></th>
                </tr>
                <tr>
                    <td>17:00</td>
                    <td>2名</td>
                    <td><a class="reservation__detail" href="#">予約詳細</td>
                </tr>
                <tr>
                    <td>17:00</td>
                    <td>2名</td>
                    <td><a class="reservation__detail" href="#">予約詳細</td>
                </tr>
                <tr>
                    <td>17:00</td>
                    <td>2名</td>
                    <td><a class="reservation__detail" href="#">予約詳細</td>
                </tr>
                <tr>
                    <td>17:00</td>
                    <td>2名</td>
                    <td><a class="reservation__detail" href="#">予約詳細</td>
                </tr>
                <tr>
                    <td>17:00</td>
                    <td>2名</td>
                    <td><a class="reservation__detail" href="#">予約詳細</td>
                </tr>
                <tr>
                    <td>17:00</td>
                    <td>2名</td>
                    <td><a class="reservation__detail" href="#">予約詳細</td>
                </tr>
                <tr>
                    <td>17:00</td>
                    <td>2名</td>
                    <td><a class="reservation__detail" href="#">予約詳細</td>
                </tr>
                <tr>
                    <td>17:00</td>
                    <td>2名</td>
                    <td><a class="reservation__detail" href="#">予約詳細</td>
                </tr>
            </table>
        </div>
    </form>
</div>
@endsection