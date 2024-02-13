@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/store.css') }}">
@endsection

@section('content')
<div class="store__content">
    <div class="store__heading">
        <h2>Store information registration</h2>
    </div>
    <form>
        <div class="store__registration-form">
            <div class="form__group">
                <div class="form__group-title">
                    <label>店舗名：</label>
                </div>
                <div class="form__group-content">
                    <input type="text" name="store_name" value="{{ old ('store_name') }}"/>
                </div>
                <div class="form__error">
                    @error('store_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <label>ジャンル：</label>
                </div>
                <div class="form__group-content">
                    <select name="genre_id">
                        <option>寿司</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('genre_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <label>地域：</label>
                </div>
                <div class="form__group-content">
                    <select name="region_id">
                        <option>東京都</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('region_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <label>店舗概要：</label>
                </div>
                <div class="form__group-content">
                    <textarea cols="50" rows="8" name="store_overview"></textarea>
                </div>
                <div class="form__error">
                    @error('store_overview')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <label>店舗画像：</label>
                </div>
                <div class="form__group-content">
                    <input id="store_image" type="file" name="store_image">
                </div>
                <div class="form__error">
                    @error('store_image')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">登録</button>
            <input type="hidden" value="user_id">
        </div>
    </form>
</div>
@endsection