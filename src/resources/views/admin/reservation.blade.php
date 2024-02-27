@can('representative-authority')

@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="reservation">
    <h2 class="reservation__ttl">予約一覧</h2>
    <div class="reservation__date">
        <form class="search__form" action="/admin/reservation/search" method="get">
            <div class="search__today">
                <label class="reservation__today-label">今日の予約を表示</label>
                <button type="submit" class="today__reservation" name="today__reservation" value="today__reservation">
                    <i class="fa-solid fa-arrows-rotate"></i>
                </button>
            </div>
            <div class="search__reservation-day">
                <label class="reservation__date-label">予約日：</label>
                    <button type="submit" class="search__last-day" name="last_day" value="last_day">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <input class="search__day" name="search_day" value="{{$search_day->format('Y-m-d')}}" readonly/>
                    <button type="submit" class="search__next-day" name="next_day" value="next_day">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
            </div>
        </form>
    </div>
    <div class="reservation__table">
        <table class="reservation__table-table">
            <tr>
                <th class="reservation__table-th">店舗</th>
                <th class="reservation__table-th">予約時間</th>
                <th class="reservation__table-th">予約人数</th>
                <th class="reservation__table-th"></th>
            </tr>
            @foreach($reservations as $reservation)
            @if ($reservation->store->user_id == $user_id)
            <tr>
                <td class="reservation__table-td">{{ $reservation->store->name }}</td>
                <td class="reservation__table-td">{{ $reservation->time->time->format('H:i') }}</td>
                <td class="reservation__table-td">{{ $reservation->num->num }}名</td>
                <form class="detail" action="/admin/reservation/{{ $reservation['id']}}" method="GET">
                    @csrf
                    <td class="reservation__table-td">
                        <button class="reservation__detail">予約詳細</button>
                    </td>
                </form>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</div>
@endsection
@endcan