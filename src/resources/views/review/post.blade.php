@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="review">
    <div class="review__shop">
        <div class="shop__message">
            <p class="shop__message-txt">今回のご利用はいかがでしたか？</p>
        </div>
        <div class="shop__card">
            <div class="card__img">
                <img class="store__img" src="{{ ($store->thumbnail) }}"></img>
            </div>
            <div class="card__content">
                <h2 class="card__store">{{ $store['name'] }}</h2>
            </div>
            <div class="card__tag">
                <p class="region__tag">#{{ $store['region'] ['name']}}</p>
                <p class="genres__tag">#{{ $store['genre'] ['name']}}</p>
            </div>
            <div class="card__button">
                <form action="/review" method="get">
                    @csrf
                    <button class="card__button-submit" id="detail-button">詳しくみる</button>
                    <input type="hidden" name="store_id" value="{{$store->id}}">
                </form>
                @if($store->bookmark()->where('store_id', $store['id'])->where('user_id', optional(Auth::user())->id)->count() == 1)
                <form class="bookmark" action="/bookmark/{{ $store['id']}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="card__button-unbookmark">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                </form>
                @else
                <form class="bookmark" action="/bookmark" method="POST">
                    @csrf
                    <input type="hidden" name="store_id" value="{{ $store['id'] }}">
                    <button class="card__button-bookmark">
                        <span class="material-symbols-outlined">
                            <i class="fa-solid fa-heart"></i>
                        </span>
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="review__post">
        <form class="review__post-form" action="/review/post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form__error">
                @error('user_id')
                {{ $message }}
                @enderror
            </div>
            <div class="review__star">
                <h3 class="post__ttl">体験を評価してください</h3>
                <div class="star__form">
                    <input class="star__form-input" id="star5" type="radio" name="star" value="5" {{ old('star') == 5 ? 'checked' : ''}}>
                    <label class="star__form-label" for="star5">★</label>
                    <input class="star__form-input" id="star4" type="radio" name="star" value="4" {{ old('star') == 4 ? 'checked' : '' }}>
                    <label class="star__form-label" for="star4">★</label>
                    <input class="star__form-input" id="star3" type="radio" name="star" value="3" {{ old('star') == 3 ? 'checked' : '' }}>
                    <label class="star__form-label" for="star3">★</label>
                    <input class="star__form-input" id="star2" type="radio" name="star" value="2" {{ old('star') == 2 ? 'checked' : '' }}>
                    <label class="star__form-label" for="star2">★</label>
                    <input class="star__form-input" id="star1" type="radio" name="star" value="1" {{ old('star') == 1 ? 'checked' : '' }}>
                    <label class="star__form-label" for="star1">★</label>
                </div>
                <div class="form__error">
                    @error('star')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="comment">
                <h3 class="post__ttl">口コミを投稿</h3>
                <textarea id="textarea" class="review__comment" name="comment" rows="5" cols="80" maxlength="400" placeholder="カジュアルな夜のお出かけにおすすめのスポット">{{ old ('comment') }}</textarea>
                <div class="input__length">
                    <p class="length">0</p>
                    <p>/400(最高文字数)</p>
                </div>
                <div class="form__error">
                    @error('comment')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="image">
                <h3 class="post__ttl">画像の追加</h3>
                <div class="review__image-update">
                    <div class="image__preview" id="imagePreview" hidden>
                        <img id="reviewImage" class="review__img"></img>
                    </div>
                    <div class="review__image" id="review__image">
                            <label for="file-input" class="review__file-input">クリックして写真を追加</br>またはドラックアンドドロップ</label>
                            <input type="file" id ="file-input" class="review__file" value="{{ Session::get('image') }}" name="image"/>
                    </div>
                </div>
            </div>
            <div class="form__error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
            <div class="review__post-submit">
                <button class="review__post-button" id="post-button">口コミを投稿</button>
                <input type="hidden" name="store_id" value="{{ $store->id }}">
                <input type="hidden" name="user_id" value="{{ optional(auth()->user())->id }}">
            </div>
        </form>
    </div>
</div>
<script src="{{ mix('js/length.js')}}"></script>
<script src="{{ mix('js/upload.js')}}"></script>
@endsection
