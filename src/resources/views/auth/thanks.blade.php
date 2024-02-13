@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__msg">
        <p>会員登録ありがとうございます</p>
        <p class="thanks__msg">
            {{ __('ご登録いただいたメールアドレスに確認用のリンクをお送りしました。') }}
        </p>
        <p class="thanks__msg">
            {{ __('届いたメールをご確認の上、記載のリンクから登録を完了させてください。') }}

        </p>
        <p class="retransmission__msg">
            {{ __('もし確認用メールが送信されていない場合は、下記をクリックしてください。') }}
        </p>
        <form class="retransmission" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="retransmission__button">{{ __('確認メールを再送信する') }}</button>
        </form>
    </div>
</div>
@endsection