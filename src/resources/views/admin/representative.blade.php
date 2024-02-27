@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/representative.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="representative__content">
    <div class="representative__head">
        <h2 class="representative__ttl">Representative(Administrator)</h2>
    </div>
    <form class="representative__form" action="/admin/representative" method="post">
        @csrf
            <div class="form__group-content">
                <div class="form__input">
                    <i class="fa-solid fa-user"></i>
                    <input class="form__input-txt" type="text" name="name" value="{{ old('name') }}" placeholder="Username">
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
                    <input class="form__input-txt" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
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
                    <input class="form__input-txt" type="password" name="password" placeholder="Password">
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection