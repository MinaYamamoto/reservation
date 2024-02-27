@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="register__content">
    <div class="register-form__heading">
        <h2 class="register-form__heading-ttl">Registration</h2>
    </div>
    <form class="register__form" action="/register" method="post">
        @csrf
            <div class="form__group-content">
                <div class="form__input">
                    <i class="fa-solid fa-user"></i>
                    <input class="form__input-text" type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
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
                <button class="form__button-submit" type="submit">登録</button>
                <input type="hidden" name="role" value="user">
            </div>
        </div>
    </form>
</div>
@endsection