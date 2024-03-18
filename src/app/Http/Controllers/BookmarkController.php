<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function store(Request $request)
    {
        $bookmark = new Bookmark;
        $bookmark->user_id = Auth::id();
        $bookmark->store_id = $request->store_id;
        $bookmark->save();
        return back();
    }

    public function destroy(Request $request)
    {
        $user = Auth::user()->id;
        $bookmark = Bookmark::where('store_id', $request->store_id)->where('user_id', $user)->first();
        $bookmark->delete();
        return back();
    }

}