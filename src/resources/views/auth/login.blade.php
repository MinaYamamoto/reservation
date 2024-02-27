@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="login__content">
    <div class="login-form__heading">
        <h2 class="login-form__heading-ttl">Login</h2>
    </div>
    <form class="login__form" action="/login" method="post">
        @csrf
            <div class="form__group-content">
                <div class="form__input">
                    <i class="fa-solid fa-envelope"></i>
                    <input class="form__input-text" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <i class="fa-solid fa-lock"></i>
                    <input class="form__input-text" type="password" name="password" placeholder="Password">
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </div>
    </form>
</div>
@endsection