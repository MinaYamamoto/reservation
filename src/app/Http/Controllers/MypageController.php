<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use App\Models\Reservation;
use App\Models\Store;
use App\Models\Time;
use App\Models\Num;
use App\Models\Review;
use Carbon\Carbon;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $username = $user->name. 'さん';
        $today = Carbon::now();
        $reservations = Reservation::where('user_id', auth()->id())->whereDate('date', '>=', $today)->orderby('date', 'asc')->get();
        $yesterday = Carbon::yesterday();
        $oldReservations = Reservation::where('user_id', auth()->id())->whereDate('date', '<=', $yesterday)->orderby('date', 'desc')->paginate(1, ['*'], 'oldreservation')->appends(['review' => \Request::get('review')]);
        $bookmarks = Bookmark::where('user_id', auth()->id())->get();
        $stores = Store::all();
        $times = Time::all();
        $nums = Num::all();
        $reviews = Review::where('user_id', auth()->id())->orderby('created_at', 'desc')->paginate(1, ['*'], 'review')->appends(['oldreservation' => \Request::get('oldreservation')]);
        $reserve_msg = '予約情報はありません';
        $bookmark_msg = 'お気に入り店舗はありません';
        $oldreserve_msg = '来店履歴はありません';
        $review_msg = 'レビュー履歴はありません';
        return view('mypage', compact('username', 'reservations', 'oldReservations', 'bookmarks', 'stores', 'times','nums', 'reviews', 'reserve_msg', 'bookmark_msg', 'oldreserve_msg', 'review_msg'));
    }

}
