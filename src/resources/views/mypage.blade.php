@extends("layouts.app")

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<script src="https://kit.fontawesome.com/8b04c7b9b9.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="user">
    <h2 class="user__name">{{$username}}</h2>
</div>
<div class="user__mypage">
    <div class="user__reserve">
        <h2 class="reserve__ttl">予約状況</h2>
        @if (session('delete_message'))
        <div class="reserve__alert">
            <p class="reserve__alert-msg">
                {{ session('delete_message') }}
            </p>
        </div>
        @endif
        @if (count($reservations) == 0)
        <div class="not-reserve__card">
            <p class="not-reserve__card-msg">
                {{ $reserve_msg }}
            </p>
        </div>
        @endif
        @foreach($reservations as $reservation)
        <div class="reserve__card">
            <div class="reserve__header">
                <i class="fa-regular fa-clock"></i>
                <h2 class="reserve__ttl-num">予約{{$loop->iteration}}</h2>
                <form class="cancel__form" action="/reservation/{{$reservation->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="cancel__button">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </button>
                </form>
            </div>
            <table class="reserve__table">
                <tr>
                    <th class="reserve__table-th">Shop</th>
                    <td class="reserve__table-td">
                        {{ $reservation->store->name }}
                    </td>
                </tr>
                <tr>
                    <th class="reserve__table-th">Date</th>
                    <td class="reserve__table-td">
                        {{ $reservation->date }}
                    </td>
                </tr>
                <tr>
                    <th class="reserve__table-th">Time</th>
                    <td class="reserve__table-td">
                        {{ $reservation->time->time->format('H:i') }}
                    </td>
                </tr>
                <tr>
                    <th class="reserve__table-th">Number</th>
                    <td class="reserve__table-td">
                        {{ $reservation->num->num }}人
                    </td>
                </tr>
            </table>
            <div class="change-reserve">
                <button class="change-reserve__submit" id="change-reserve__submit">予約内容を変更</button>
            </div>
            <div class="hidden" id="hidden">
                <form class="new-reserve__form" action="/reservation/{{$reservation->id}}" method="post">
                    @method('PATCH')
                    @csrf
                    <table class="new-reserve__table">
                        <tr>
                            <th class="new-reserve__table-th">New Date</th>
                            <td>
                                <input type="date" name="date" value="{{ $reservation->date }}">
                                <div class="form__error">
                                    @error('date')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="new-reserve__table-th">New Time</th>
                            <td>
                                <select class="new-reserve__time-id" name="time_id">
                                    @foreach($times as $time)
                                    <option value="{{ $time->id }}" {{ $reservation->time_id == $time->id ? 'selected' : '' }}>{{ $time['time']->format('H:i') }}</option>
                                    @endforeach
                                </select>
                                <div class="form__error">
                                    @error('time_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="new-reserve__table-th">New Number</th>
                            <td>
                                <select class="new-reserve__num-id" name="num_id">
                                    @foreach($nums as $num)
                                    <option value="{{ $num->id }}"  {{ $reservation->num_id == $num->id ? 'selected' : ''}}>{{ $num['num'] }} 人</option>
                                    @endforeach
                                </select>
                                <div class="form__error">
                                    @error('num_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="new-reserve__button">
                        <button class="new-reserve__submit">変更を確定</button>
                        <input type="hidden" name="store_id" value="{{ $reservation->store_id }}">
                        <input type="hidden" name="user_id" value="{{ optional(auth()->user())->id }}">
                        <input type="hidden" name="id" value="{{ $reservation->id}}">
                    </div>
                    <div class="cancel-change">
                        <button class="cancel-change__submit" id="cancel-change__submit">変更をキャンセル</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
        <h2 class="history__ttl">来店履歴</h2>
        @if (count($oldReservations) == 0)
        <div class="not-oldreserve__card">
            <p class="not-oldreserve__card-msg">
                {{ $oldreserve_msg }}
            </p>
        </div>
        @endif
        @foreach($oldReservations as $oldReservation)
        <div class="history__card">
            <table class="history__table">
                <tr>
                    <th class="history__table-th">Shop</th>
                    <td class="history__table-td">
                        {{ $oldReservation->store->name }}
                    </td>
                </tr>
                <tr>
                    <th class="history__table-th">Date</th>
                    <td  class="history__table-td">
                        {{ $oldReservation->date }}
                    </td>
                </tr>
                <tr>
                    <th class="history__table-th">Time</th>
                    <td class="history__table-td">
                        {{ $oldReservation->time->time->format('H:i') }}
                    </td>
                </tr>
                <tr>
                    <th class="history__table-th">Number</th>
                    <td class="history__table-td">
                        {{ $oldReservation->num->num }}人
                    </td>
                </tr>
            </table>
            <div class="review__button">
                <button class="review__submit" data-reservation-id="{{ $oldReservation->id }}">レビューを投稿</button>
            </div>
            <div class="review__hidden" id="review__hidden">
                <form class="review__form" action="/review" method="post">
                    @csrf
                    <h3 class="review__star-ttl">評価</h3>
                    <div class="review__body">
                        <div class="star__form">
                            <input class="star__form-input" id="star5" type="radio" name="star" value="5">
                            <label class="star__form-label" for="star5">★</label>
                            <input class="star__form-input" id="star4" type="radio" name="star" value="4">
                            <label class="star__form-label" for="star4">★</label>
                            <input class="star__form-input" id="star3" type="radio" name="star" value="3">
                            <label class="star__form-label" for="star3">★</label>
                            <input class="star__form-input" id="star2" type="radio" name="star" value="2">
                            <label class="star__form-label" for="star2">★</label>
                            <input class="star__form-input" id="star1" type="radio" name="star" value="1">
                            <label class="star__form-label" for="star1">★</label>
                        </div>
                        <h3 class="review__comment-ttl">コメント</h3>
                        <textarea class="review__comment" name="comment" rows="5" cols="30"></textarea>
                    </div>
                    <div class="review__button">
                        <button type="button" class="review__submit-button">投稿する</button>
                        <input type="hidden" name="store_id" value="{{ $oldReservation->store_id }}">
                        <input type="hidden" name="user_id" value="{{ optional(auth()->user())->id }}">
                    </div>
                    <div class="review__button">
                        <button type="button" class="review__cancel-button">キャンセル</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
        {{ $oldReservations->links() }}
        <h2 class="history__ttl">レビュー履歴</h2>
        @if (count($reviews) == 0)
        <div class="not-review__card">
            <p class="not-review__card-msg">
                {{ $review_msg }}
            </p>
        </div>
        @endif
        @foreach($reviews as $review)
        <div class="history__card">
                <table class="history__table">
                <tr>
                    <th class="history__table-th">Shop</th>
                    <td class="history__table-td">
                        {{ $review->store->name }}
                    </td>
                </tr>
                <tr>
                    <th class="history__table-th">PostDate</th>
                    <td class="history__table-td">
                        {{ $review->created_at->format('y-m-d') }}
                    </td>
                </tr>
            </table>
            <div class="history__star">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $review->star)
                        <label class="star-rating">★</label>
                    @else
                        <label class="star-no-rating">★</label>
                    @endif
                @endfor
            </div>
            <div class="history__comment">
                <p class="history__comment-txt">{{ $review->comment }}</p>
            </div>
            <div class="review-detail__button">
                <button id="review-detail__submit" class="review-detail__submit" data-reservation-id="{{ $review->id }}">レビューを修正</button>
            </div>
            <div class="review-correction__hidden" id="review-correction__hidden">
                <form class="review-correction__form" action="review/{{ $review->id }}" method="post">
                    @csrf
                    @method('PATCH')
                    <h3 class="review__star-ttl">評価</h3>
                    <div class="review__body">
                        <div class="star__form">
                            <input class="star__form-input" id="review-correction-star5" type="radio" name="star" value="5" @if($review->star == 5 ) checked @endif>
                            <label class="star__form-label" for="review-correction-star5">★</label>
                            <input class="star__form-input" id="review-correction-star4" type="radio" name="star" value="4" @if($review->star == 4 ) checked @endif>
                            <label class="star__form-label" for="review-correction-star4">★</label>
                            <input class="star__form-input" id="review-correction-star3" type="radio" name="star" value="3" @if($review->star == 3 ) checked @endif>
                            <label class="star__form-label" for="review-correction-star3">★</label>
                            <input class="star__form-input" id="review-correction-star2" type="radio" name="star" value="2" @if($review->star == 2 ) checked @endif>
                            <label class="star__form-label" for="review-correction-star2">★</label>
                            <input class="star__form-input" id="review-correction-star1" type="radio" name="star" value="1" @if($review->star == 1 ) checked @endif>
                            <label class="star__form-label" for="review-correction-star1">★</label>
                        </div>
                        <h3 class="review__comment-ttl">コメント</h3>
                        <textarea class="review__comment" name="comment" rows="5" cols="30">{{ $review->comment }}</textarea>
                    </div>
                    <div class="review-correction__submit">
                        <button type="button" class="review-correction__submit-button">修正する</button>
                        <input type="hidden" name="id" value="{{ $review->id }}">
                    </div>
                    <div class="review-correction__cancel">
                        <button type="button" class="review-correction__cancel-button">キャンセル</button>
                    </div>
                </form>
                <form class="review-delete__form" action="review/{{ $review->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="review-correction__delete">
                        <button type="button" class="review-correction__delete-button">削除</button>
                        <input type="hidden" name="id" value="{{ $review->id }}">
                    </div>
                </form>
            </div>
        </div>
        @endforeach
        {{ $reviews->links() }}
    </div>
    <div class="user__bookmark">
        <h2 class="bookmark__ttl">お気に入り店舗</h2>
        @if ($bookmarks->isEmpty())
            <div class="not-bookmark__card">
                <p class="not-bookmark__card-msg">
                    {{ $bookmark_msg }}
                </p>
            </div>
        @endif
        <div class="bookmark__list">
        @foreach($stores as $store)
            @if($store->bookmark()->where('store_id', $store['id'])->where('user_id', optional(Auth::user())->id)->count() == 1)
            <div class="bookmark__card">
                <div class="card__img">
                    <img class="card__thumbnail" src="{{ $store['thumbnail'] }}"></img>
                </div>
                <div class="card__content">
                    <h2 class="card__store">{{ $store->name }}</h2>
                </div>
                <div class="card__tag">
                    <p class="region__tag">#{{ $store['region'] ['name']}}</p>
                    <p class="genres__tag">#{{ $store['genre'] ['name']}}</p>
                </div>
                <div class="card__button">
                    <form class="detail" action="/detail/{{ $store['id']}}" method="GET">
                        <button class="card__button-submit">詳しくみる</button>
                    </form>
                    <form class="bookmark" action="/bookmark/{{ $store['id']}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="card__button-unbookmark">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <script src="{{ mix('js/mypage.js')}}"></script>
</div>
@endsection