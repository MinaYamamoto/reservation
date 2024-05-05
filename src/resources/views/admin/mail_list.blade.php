@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/mail_list.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="mail">
    <h2 class="mail__ttl">メール送信一覧</h2>
    <div class="mail__table">
        <table class="mail__table-table">
            <tr>
                <th class="mail__table-th">ユーザ名</th>
                <th class="mail__table-th">メールアドレス</th>
                <th class="mail__table-th"></th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td class="mail__table-td">{{ $user->name }}</td>
                <td class="mail__table-td">{{ $user->email }}</td>
                <form class="mail__send" action="/admin/mail/{{ $user['id'] }}" method="GET">
                    @csrf
                    <td class="mail__table-td">
                        <button class="mail__detail">メール送信</button>
                        <input type="hidden" name="user_name" value="{{ $user->name }}">
                        <input type="hidden" name="user_email" value="{{ $user->email }}">
                    </td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection