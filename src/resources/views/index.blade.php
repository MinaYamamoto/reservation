@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('header')
<div class="header__search">
    <form class="search-form" action="/store/search" method="get">
        @csrf
        <div class="search-form__inner">
            <select class="search-form__region" name='region_id'>
                <option value="">All area</option>
                @foreach($regions as $region)
                <option value="{{ $region['id'] }}" {{request()->region_id ==$region['id']? "selected" : "";}}>{{ $region['name'] }}</option>
                @endforeach
            </select>
            <select class="search-form__genre" name="genre_id">
                <option value="">All genre</option>
                @foreach($genres as $genre)
                <option value="{{ $genre['id']}}" {{request()->genre_id ==$genre['id']? "selected" : "";}}>{{ $genre['name'] }}</option>
                @endforeach
            </select>
            <div class="search-form__text">
                <input class="search-form__input" type="text" name="keyword" value="{{ request()->keyword }}" placeholder="&#xF002; search...">
            </div>
        </div>
    </form>
</div>
@endsection

@section('content')
<div class="card__list">
    @if ($stores->isEmpty())
    <div class="not-applicable__card">
        <p class="not-applicable__card-msg">{{ $msg }}</p>
    </div>
    @endif
    @foreach($stores as $store)
    <div class="card">
        <div class="card__img">
            <img class="store__img" src="{{ ($store->thumbnail) }}"></img>
        </div>
        <div class="card__content">
            <h2 class="card__store">{{ $store['name'] }}</h2>
        </div>
        <div class="card__tag">
            <p class="region__tag">#{{ $store['region'] ['name']}}</p>
            <p class="genres__tag">#{{ $store['genre'] ['name']}}</p>
        </div>
        <div class="card__button">
            <form class="detail" action="/detail/{{ $store['id']}}" method="GET">
                @csrf
                <button class="card__button-submit">詳しくみる</button>
            </form>
            @if($store->bookmark()->where('store_id', $store['id'])->where('user_id', optional(Auth::user())->id)->count() == 1)
            <form class="bookmark" action="/bookmark/{{ $store['id']}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="card__button-unbookmark">
                    <i class="fa-solid fa-heart"></i>
                </button>
            </form>
            @else
            <form class="bookmark" action="/bookmark" method="POST">
                @csrf
                <input type="hidden" name="store_id" value="{{ $store['id'] }}">
                <button class="card__button-bookmark">
                    <span class="material-symbols-outlined">
                        <i class="fa-solid fa-heart"></i>
                    </span>
                </button>
            </form>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection