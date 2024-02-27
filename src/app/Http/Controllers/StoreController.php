<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Genre;
use App\Models\Region;
use App\Models\Bookmark;
use App\Models\Time;
use App\Models\Num;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index (Store $store)
    {
        $stores = Store::all();
        $regions = Region::all();
        $genres = Genre::all();
        $bookmark = Bookmark::where('store_id', $store->id)->where('user_id', auth()->id())->get();
        return view('index', compact('stores', 'regions','genres', 'bookmark'));
    }

    public function search(Request $request)
    {
        $params = $request->query();
        $stores = Store::search($params)->get();
        $regions = Region::all();
        $genres = Genre::all();
        $bookmark = Bookmark::where('store_id', $request->store_id)->where('user_id', auth()->id())->get();
        $msg = '検索条件に一致する店舗がありません';
            return view('index', compact('stores', 'regions', 'genres', 'bookmark', 'msg'));
    }

    public function detail(Request $request)
    {
        $store = Store::find($request->store_id);
        $regions = Region::all();
        $genres = Genre::all();
        $bookmark = Bookmark::where('store_id', $request->store_id)->where('user_id', auth()->id())->get();
        $times = Time::all();
        $nums = Num::all();
        return view('detail', compact('store', 'regions','genres', 'bookmark', 'times', 'nums'));
    }

    public function adminIndex() {
        $regions = Region::all();
        $genres = Genre::all();
        return view('/admin/store', compact('regions', 'genres'));
    }

    public function store(StoreRequest $request)
    {
        $store = $request->only(['name', 'genre_id', 'region_id', 'user_id', 'overview']);
        if(request('thumbnail')) {
            $file_name = $request->file('thumbnail')->getClientOriginalName();
            $store['thumbnail'] = request('thumbnail')->storeAs('public/post_img', $file_name);
        }
        Store::create($store);
        return redirect('/admin/store');
    }
}
