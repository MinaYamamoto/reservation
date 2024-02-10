@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__msg">
        <p>会員登録ありがとうございます</p>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="submit">ログインする</button>
    </div>
</div>
@endsection