<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $review = $request->only(['user_id', 'store_id', 'star', 'comment']);
        Review::create($review);
        return redirect('/mypage');
    }
    public function update(Request $request)
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

}
