@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/store_upload.css') }}">
@endsection

@section('content')
<div class="store-list">
    <div class="store-list__signup">
        <h2 class="store-list__ttl">新規店舗登録（CSV）</h2>
        <div class="csv__upload">
            <form action="/admin/storeupload" method="POST" enctype="multipart/form-data" class="csv__upload-form">
                @csrf
                <input type="file" name="csv_file" class="csv__file">
                <div class="csv__upload-button">
                    <button type="submit" class="csv__upload-submit">アップロード</button>
                </div>
            </form>
            @if(session('message'))
            <div class="upload__success">
                {{session('message')}}
            </div>
            @endif
            @if ($errors->any())
                <div class="upload__alert">
                    <h4 class="alert__ttl">ファイルアップデートでエラーが発生しました:</h4>
                    <ul class="alert__list">
                        @foreach ($errors->all() as $error)
                            <li class="alert__msg">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
