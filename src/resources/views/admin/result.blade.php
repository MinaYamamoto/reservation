@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/result.css') }}">
@endsection

@section('content')
<div class="result__content">
    <div class="result__msg">
        <p class="msg__txt">送信完了</p>
    </div>
    <div class="form__button">
        <a class="form__button-submit" href="/admin/mail" type="submit">戻る</a>
    </div>
</div>
@endsection