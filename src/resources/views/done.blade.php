@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="done__content">
    <div class="done__msg">
        <p>ご予約ありがとうございます</p>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="submit">戻る</button>
    </div>
</div>
@endsection