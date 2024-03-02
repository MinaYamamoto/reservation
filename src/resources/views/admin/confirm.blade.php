@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="mail__content">
    <div class="mail__heading">
        <h2 class="mail__heading-ttl">Mail Send</h2>
    </div>
    <form id="form" action="/admin/mail/execute" method="post">
        @csrf
        <div class="form-group">
            <label class="form-group__label" for="name">名前（必須）</label>
            <div class="form__group-content">
                <input type="hidden" class="form-group__txt" name="name" value="{{ $mail['name'] }}" readonly>
                <p>{{ $mail['name'] }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="form-group__label" for="email">宛先（必須）</label>
            <div class="form__group-content">
                <input type="hidden" class="form-group__txt" id="email" name="email" value="{{ $mail['email'] }}">
                <p>{{ $mail['email'] }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="form-group__label" for="subject">件名</label>
            <div class="form__group-content">
                <input type="hidden" class="form-group__txt" id="subject" name="subject" value="{{ $mail['subject'] }}">
                <p>{{ $mail['subject'] }}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="form-group__label" for="txt">本文</label>
            <div class="form__group-content">
                <input type="hidden" class="form-group__txt" id="txt" name="txt" value="{{ $mail['txt'] }}">
                <p>{{ $mail['txt'] }}</p>
            </div>
        </div>
        <div class="form__button">
            <button type="button" class="form-group__button" onClick="history.back()" >
                戻る
            </button>
            <button class="form-group__button" name="submitted" type="submit" >
                送信
            </button>
        </div>
    </form>
</div>
@endsection