@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/store_list.css') }}">
@endsection

@section('content')
<div class="store-list">
    <div class="store-list__signup">
        <h2 class="store-list__ttl">新規店舗登録</h2>
        <div class="store-list__button">
            <button type="button" class="store-list__registration" onclick="location.href='/admin/store/registration'">店舗情報登録</button>
        </div>
    </div>
    <h2 class="store-list__ttl">登録済店舗一覧</h2>
    <div class="store-list__table">
        <table class="store-list__table-table">
            <tr>
                <th class="store-list__table-th">店舗名</th>
                <th class="store-list__table-th"></th>
            </tr>
            @foreach($stores as $store)
            <tr>
                <td class="store-list__table-td">{{ $store->name }}</td>
                <form class="form" action="/admin/storelist/{{ $store['id']}}" method="GET">
                    @csrf
                    <td class="store-list__table-td">
                        <button class="store-list__update">店舗情報更新</button>
                        <input type="hidden" name="store_id" value="{{ $store->id }}">
                    </td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
