@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/mail.css') }}">
@endsection

@section('content')
<div class="mail__content">
    <div class="mail__heading">
        <h2 class="mail__heading-ttl">Mail Send</h2>
    </div>
    <form class="mail__form" action="/admin/mail/confirm" method="post">
        @csrf
        <div class="form-group">
            <label class="form-group__label" for="name">名前（必須）</label>
            <div class="form__group-content">
                <input type="text" class="form-group__txt" id="name" name="name" placeholder="名前" value="{{$user_name}}">
            </div>
        </div>
        <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label class="form-group__label" for="email">宛先（必須）</label>
            <div class="form__group-content">
                <input type="text" class="form-group__txt" id="email" name="email" placeholder="宛先" value="{{$user_email}}">
            </div>
        </div>
        <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label class="form-group__label" for="subject">件名（必須）</label>
            <div class="form__group-content">
                <input type="text" class="form-group__txt" id="subject" name="subject" placeholder="件名" value="{{old('subject')}}">
            </div>
        </div>
        <div class="form__error">
            @error('subject')
            {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label class="form-group__label" for="txt">本文</label>
            <div class="form__group-content">
                <textarea class="form-group__txtarea" id="txt" name="txt" placeholder="本文をお書きください" rows="7">{{old('txt')}}</textarea>
            </div>
        </div>
        <div class="form__error">
            @error('body')
            {{ $message }}
            @enderror
        </div>
        <div class="form__button">
            <button class="form-group__button" name="submitted" type="submit" >
                確認
            </button>
        </div>
    </form>
</div>
@endsection