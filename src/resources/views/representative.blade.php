@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/representative.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,300,0,0" />
@endsection

@section('content')
<div class="representative__content">
    <div class="representative-form__heading">
        <h2>Representative(Administrator)</h2>
    </div>
    <form class="representative__form" action="/register" method="post">
        @csrf
            <div class="form__group-content">
                <div class="form__input--text">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <span class="material-symbols-outlined">
                        mail
                    </span>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <span class="material-symbols-outlined">
                    lock
                    </span>
                    <input type="password" name="password" placeholder="Password">
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