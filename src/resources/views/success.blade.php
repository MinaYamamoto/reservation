@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/success.css') }}">
@endsection

@section('content')
<div class="success__content">
    <div class="success__msg">
        <p class="msg__txt">お支払いが完了しました</p>
    </div>
    <div class="form__button">
        <a class="form__button-submit" href="/mypage" type="submit">戻る</a>
    </div>
</div>
@endsection