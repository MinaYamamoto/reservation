@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/store_update.css') }}">
@endsection

@section('content')
<div class="store__content">
    <div class="store__heading">
        <h2 class="store__heading-ttl">Store information update</h2>
    </div>
    <form class="store-form" action="/admin/storelist/{{ $store['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="store__update-form">
            <div class="form-group">
                <div class="form-group__title">
                    <label class="form-group__title-label">店舗名：</label>
                </div>
                <div class="form-group__content">
                    <input class="form-group__content-input" type="text" name="name" value="{{ $store->name }}" placeholder="店舗名を入力してください"/>
                </div>
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group__title">
                    <label class="form-group__title-label">ジャンル：</label>
                </div>
                <div class="form-group__content">
                    <select class="form-group__content-select" name="genre_id">
                        <option value="">ジャンルを選択してください</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre['id']}}" {{$store->genre_id ==$genre['id']? "selected" : "";}}>{{ $genre['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__error">
                @error('genre_id')
                {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group__title">
                    <label class="form-group__title-label">地域：</label>
                </div>
                <div class="form-group__content">
                    <select class="form-group__content-select" name="region_id">
                        <option value="">地域を選択してください</option>
                        @foreach($regions as $region)
                        <option value="{{ $region['id'] }}" {{$store->region_id ==$region['id']? "selected" : "";}}>{{ $region['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__error">
                @error('region_id')
                {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group__title">
                    <label class="form-group__title-label">店舗概要：</label>
                </div>
                <div class="form-group__content">
                    <textarea class="form-group__content-textarea" cols="50" rows="8" name="overview" placeholder="店舗概要を入力してください">{{$store->overview}}</textarea>
                </div>
            </div>
            <div class="form__error">
                @error('overview')
                {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <div class="form-group__title">
                    <label class="form-group__title-label">店舗画像：</label>
                </div>
                <div class="form-group__content">
                    <div class="form-group__img">
                        <img class="store__img" src="{{ ($store->thumbnail) }}"></img>
                    </div>
                    <input id="thumbnail" type="file" name="thumbnail" class="form-group__thumbnail">
                </div>
            </div>
            <div class="form__error">
                @error('thumbnail')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-button">
            <button type="button" class="form-button__button" onclick="history.back()">戻る</button>
            <button class="form-button__submit" type="submit">更新</button>
        </div>
    </form>
</div>
@endsection