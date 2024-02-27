@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="done__content">
    <div class="done__msg">
        <p class="msg__txt">ご予約ありがとうございます</p>
    </div>
    <div class="form__button">
        <a class="form__button-submit" href="/" type="submit">戻る</a>
    </div>
</div>
@endsection