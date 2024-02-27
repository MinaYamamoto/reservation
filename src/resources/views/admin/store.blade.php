@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/store.css') }}">
@endsection

@section('content')
<div class="store__content">
    <div class="store__heading">
        <h2 class="store__heading-ttl">Store information registration</h2>
    </div>
    <form class="store__form" action="/admin/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="store__registration-form">
            <div class="form__group">
                <div class="form__group-title">
                    <label class="form__group-title-label">店舗名：</label>
                </div>
                <div class="form__group-content">
                    <input class="form__group-content-input" type="text" name="name" value="{{ old ('name') }}"/>
                </div>
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <label class="form__group-title-label">ジャンル：</label>
                </div>
                <div class="form__group-content">
                    <select class="form__group-content-select" name="genre_id">
                        <option value="">ジャンルを選択してください</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre['id']}}" {{request()->genre_id ==$genre['id']? "selected" : "";}}>{{ $genre['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__error">
                @error('genre_id')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <label class="form__group-title-label">地域：</label>
                </div>
                <div class="form__group-content">
                    <select class="form__group-content-select" name="region_id">
                        <option value="">地域を選択してください</option>
                        @foreach($regions as $region)
                        <option value="{{ $region['id'] }}" {{request()->region_id ==$region['id']? "selected" : "";}}>{{ $region['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__error">
                @error('region_id')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <label class="form__group-title-label">店舗概要：</label>
                </div>
                <div class="form__group-content">
                    <textarea class="form__group-content-textarea" cols="50" rows="8" name="overview"></textarea>
                </div>
            </div>
            <div class="form__error">
                @error('overview')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <label class="form__group-title-label">店舗画像：</label>
                </div>
                <div class="form__group-content">
                    <input id="thumbnail" type="file" name="thumbnail" class="form__thumbnail">
                </div>
            </div>
            <div class="form__error">
                @error('thumbnail')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">登録</button>
            <input type="hidden" name="user_id" value="{{optional(Auth::user())->id}}">
        </div>
    </form>
</div>
@endsection