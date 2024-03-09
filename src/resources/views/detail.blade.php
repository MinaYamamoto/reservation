@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="store">
    <div class="store__detail">
        <div class="store__detail-header">
            <div class="back__button">
                <a href="/" class="back__button-submit" id="back-button">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <div class="store__name">
                <h2 class="store__name-header">{{$store->name}}</h2>
            </div>
        </div>
        <div class="store__img">
            <img class="store__thumbnail" src="{{ Storage::url($store->thumbnail) }}"></img>
        </div>
        <div class="store__tag">
            <p class="store__tag-region">#{{ $store['region'] ['name']}}</p>
            <p class="store__tag-genres">#{{ $store['genre'] ['name']}}</p>
        </div>
        <div class="store__overview">
            <p class="store__overview-txt">{{ $store['overview'] }}</p>
        </div>
    </div>
    <div class="store__reserve">
        <h2 class="reserve__ttl">予約</h2>
        <form class="reserve-form" action="/reservation" method="post">
            @csrf
            <input type="hidden" name="store_id" value="{{ $store->id}}">
            <input type="hidden" name="user_id" value="{{ optional(auth()->user())->id }}">
            <div class="reserve__day">
                <input type="date" name="date" class="reserve__date" id="reserve__date" value="{{ old('date') }}" data-old-date="{{ old('date') }}">
                <div class="form__error">
                    @error('date')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="reserve__time">
                <select class="reserve__time-id" name='time_id' id='time__id'>
                    <option value="">時間を選択してください</option>
                    @foreach($times as $time)
                    <option value="{{ $time->id }}" data-related-value="{{ $time['time']->format('H:i') }}"  @if(old('time_id') == $time->id) selected @endif>{{ $time['time']->format('H:i') }}</option>
                    @endforeach
                </select>
                <div class="form__error">
                    @error('time_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="reserve__num">
                <select class="reserve__num-id" name='num_id' id='num__id'>
                    <option value="">人数を選択してください</option>
                    @foreach($nums as $num)
                    <option value="{{ $num->id }}" data-related-value="{{ $num['num'] }} 名"  @if(old('num_id') == $num->id) selected @endif>{{ $num['num'] }} 名</option>
                    @endforeach
                </select>
                <div class="form__error">
                    @error('num_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="reserve__detail">
                <table class="reserve__table">
                    <tr>
                        <th class="reserve__table-th">Shop</th>
                        <td class="reserve__table-td">{{$store->name}}</td>
                    </tr>
                    <tr>
                        <th class="reserve__table-th">Date</th>
                        <td class="reserve__table-td" id="input__date"></td>
                    </tr>
                    <tr>
                        <th class="reserve__table-th">Time</th>
                        <td class="reserve__table-td" id="selected__time"></td>
                    </tr>
                    <tr>
                        <th class="reserve__table-th">Number</th>
                        <td class="reserve__table-td" id="selected__num"></td>
                    </tr>
                </table>
                <script src="{{ mix('js/detail.js')}}"></script>
            </div>
            <div class="reserve__button">
                <button class="reserve__button-submit" id="reserve-button">予約する</button>
            </div>
        </form>
    </div>
</div>
@endsection