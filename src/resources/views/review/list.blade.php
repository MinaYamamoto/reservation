@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endsection

@section('content')
<div class="store">
    <div class="store__detail">
        <div class="store__img">
            <img class="store__thumbnail" src="{{ ($store->thumbnail) }}"></img>
        </div>
        <div class="store__tag">
            <p class="store__tag-region">#{{ $store['region'] ['name']}}</p>
            <p class="store__tag-genres">#{{ $store['genre'] ['name']}}</p>
        </div>
        <div class="store__overview">
            <p class="store__overview-txt">{{ $store['overview'] }}</p>
        </div>
        <form action="/review/search" method="get">
            @csrf
            <div class="store__review">
                <button class="store__review-button">全ての口コミ表示</button>
                <input type="hidden" value="{{ $store->id }}" name="store_id">
            </div>
        </form>
        @if(!is_Null($reviews))
        @foreach($reviews as $review)
        <hr>
        <div class="review__show" data-review-id="{{ $review->id }}">
            <div class="review__flex">
            @if ($review->user_id === optional(auth()->user())->id)
                <div class="review-edit__button">
                    <button class="review-correction__edit-button">口コミを編集</button>
                </div>
            @endif
            @if ($review->user_id === optional(auth()->user())->id || optional(auth()->user())->role === 'admin')
                <form class="review-delete__form" action="/review/{{ $review->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="review-delete__button">
                        <button type="submit" class="review-correction__delete-button">口コミを削除</button>
                        <input type="hidden" name="id" value="{{ $review->id }}">
                        <input type="hidden" name="store_id" value="{{ $store->id }}">
                    </div>
                </form>
            @endif
            </div>
            <form class="review-edit__form" action="/review/{{ $review->id }}" method="post" data-review-id="{{ $review->id }}" style="display: {{ $errors->has('comment') && old('id') == $review->id ? 'block' : 'none' }};" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="review__star">
                    @for($i = 1; $i <= 5; $i++)
                    <label class="star-rating {{ $i <= $review->star ? 'star-rating' : 'star-no-rating' }}" data-rating="{{ $i }}">★</label>
                    @endfor
                    <input type="hidden" name="star" value="{{ $review->star }}" class="star-input">
                    <div class="form__review-error">
                        @error('star')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="review__comment">
                    <textarea id="textarea" class="review__comment" name="comment" rows="5" cols="60" maxlength="400">{{ $review->comment }}</textarea>
                    <div class="input__length">
                        <p class="length">0</p>
                        <p>/400(最高文字数)</p>
                    </div>
                    <div class="form__review-error">
                        @error('comment')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="image__preview" id="imagePreview">
                        <img id="reviewImage" class="review__img" src="{{ ($review->image) }}"></img>
                    </div>
                    <div class="review__image" id="review__image">
                            <label for="file-input" class="review__file-input">クリックして写真を追加</br>またはドラックアンドドロップ</label>
                            <input type="file" id ="file-input" class="review__file" value="{{ Session::get('image') }}" name="image"/>
                    </div>
                    <div class="form__review-error">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </div>
                    <input type="hidden" name="id" value="{{ $review->id }}">
                    <input type="hidden" value="{{ $store->id }}" name="store_id">
                </div>
                <div class="review-save">
                    <button type="submit" class="review-save__button">保存</button>
                </div>
            </form>
            <div class="review-display"  data-review-id="{{ $review->id }}" style="display: {{ $errors->has('comment') && old('id') == $review->id ? 'none' : 'block' }};">
                <div class="review__star">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->star)
                            <label class="star-rating">★</label>
                        @else
                            <label class="star-no-rating">★</label>
                        @endif
                    @endfor
                </div>
                <div class="review__comment">
                    <p class="review__comment-txt">{{ $review->comment }}</p>
                </div>
            </div>
        </div>
        @if ($loop->last)
            <hr>
        @endif
        @endforeach
        @endif
    </div>
    <script src="{{ mix('js/reviewlist.js')}}"></script>
    <script src="{{ mix('js/length.js')}}"></script>
    <script src="{{ mix('js/upload.js')}}"></script>
    <div class="store__reserve">
        <h2 class="reserve__ttl">予約</h2>
        <form class="reserve-form" action="/reservation" method="post">
            @csrf
            <input type="hidden" name="store_id" value="{{ $store->id}}">
            <input type="hidden" name="user_id" value="{{ optional(auth()->user())->id }}">
            <div class="reserve__day">
                <input type="date" name="date" class="reserve__date" id="reserve__date" value="{{ old('date') }}" data-old-date="{{ old('date') }}">
                <div class="form__error">
                    @error('date')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="reserve__time">
                <select class="reserve__time-id" name='time_id' id='time__id'>
                    <option value="">時間を選択してください</option>
                    @foreach($times as $time)
                        <option value="{{ $time->id }}" data-related-value="{{ $time['time']->format('H:i') }}"  @if(old('time_id') == $time->id) selected @endif>{{ $time['time']->format('H:i') }}</option>
                    @endforeach
                </select>
                <div class="form__error">
                    @error('time_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="reserve__num">
                <select class="reserve__num-id" name='num_id' id='num__id'>
                    <option value="">人数を選択してください</option>
                        @foreach($nums as $num)
                            <option value="{{ $num->id }}" data-related-value="{{ $num['num'] }} 名"  @if(old('num_id') == $num->id) selected @endif>{{ $num['num'] }} 名</option>
                        @endforeach
                </select>
                <div class="form__error">
                    @error('num_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="reserve__detail">
                <table class="reserve__table">
                    <tr>
                        <th class="reserve__table-th">Shop</th>
                        <td class="reserve__table-td">{{$store->name}}</td>
                    </tr>
                    <tr>
                        <th class="reserve__table-th">Date</th>
                        <td class="reserve__table-td" id="input__date"></td>
                    </tr>
                    <tr>
                        <th class="reserve__table-th">Time</th>
                        <td class="reserve__table-td" id="selected__time"></td>
                    </tr>
                    <tr>
                        <th class="reserve__table-th">Number</th>
                        <td class="reserve__table-td" id="selected__num"></td>
                    </tr>
                </table>
                <script src="{{ mix('js/detail.js')}}"></script>
            </div>
            <div class="reserve__button">
                <button class="reserve__button-submit" id="reserve-button">予約する</button>
            </div>
        </form>
    </div>
</div>
@endsection