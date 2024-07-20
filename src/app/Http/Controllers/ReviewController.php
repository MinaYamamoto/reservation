<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Review;
use App\Models\Store;
use App\Models\Bookmark;
use App\Models\Genre;
use App\Models\Region;
use App\Models\Time;
use App\Models\Num;
use App\Http\Requests\ReviewRequest;


class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $review = $request->only(['user_id', 'store_id', 'star', 'comment']);
        Review::create($review);
        return redirect('/mypage');
    }

    public function update(ReviewRequest $request)
    {
        $newReview = $request->only(['star', 'comment']);
        Review::find($request->id)->update($newReview);
        return redirect('/mypage');
    }

    public function destroy(Request $request)
    {
        $review = Review::where('id', $request->id)->first();
        $review->delete();
        return redirect('/mypage');
    }

    public function postIndex(Request $request)
    {
        $store = Store::find($request->store_id);
        $bookmark = Bookmark::where('store_id', $store->id)->where('user_id', auth()->id())->get();
        return view('/review/post', compact('store', 'bookmark'));
    }

    public function postStore(ReviewRequest $request)
    {
        $review = $request->only(['user_id', 'store_id', 'star', 'comment']);
        $file = $request->file('image');
        if (!is_null($file)) {
            $file_name = $file->getClientOriginalName();
            if(app()->isLocal()){
                $path = Storage::putFileAs('public/post_img', $file,$file_name);
                $review['image'] = Storage::url($path);
            }else{
                $path = Storage::disk('s3')->putFileAs('/', $file, $file_name,'publik');
                $review['image'] = Storage::url($path);
            }
        }
        Review::create($review);
        $store_id = $request->input('store_id');
        return redirect()->route('review.index', ['store_id' => $store_id]);
    }

    public function reviewIndex(Request $request)
    {
        $store = Store::find($request->store_id);
        $regions = Region::all();
        $genres = Genre::all();
        $times = Time::all();
        $nums = Num::all();
        $reviews = Review::where('store_id',$request->store_id)->where('user_id', auth()->id())->get();
        return view('/review/list', compact('store', 'regions','genres', 'times', 'nums', 'reviews'));
    }

    public function reviewSearch(Request $request)
    {
        $store = Store::find($request->store_id);
        $regions = Region::all();
        $genres = Genre::all();
        $times = Time::all();
        $nums = Num::all();
        $reviews = Review::where('store_id', $request->store_id)->get();
        return view('/review/list', compact('store', 'regions','genres', 'times', 'nums', 'reviews'));
    }

    public function reviewUpdate(ReviewRequest $request)
    {
        $upReview = $request->only(['star', 'comment']);
        $file = $request->file('image');
        if (!is_null($file)) {
            $file_name = $file->getClientOriginalName();
            if(app()->isLocal()){
                $path = Storage::putFileAs('public/post_img', $file,$file_name);
                $upReview['image'] = Storage::url($path);
            }else{
                $path = Storage::disk('s3')->putFileAs('/', $file, $file_name,'publik');
                $upReview['image'] = Storage::url($path);
            }
        }
        Review::find($request->id)->update($upReview);
        $store_id = $request->input('store_id');
        return redirect()->route('review.index', ['store_id' => $store_id]);
    }

    public function reviewDestroy(Request $request)
    {
        $review = Review::where('id', $request->id)->first();
        $review->delete();
        $store_id = $request->input('store_id');
        return redirect()->route('review.index', ['store_id' => $store_id]);
    }

}
