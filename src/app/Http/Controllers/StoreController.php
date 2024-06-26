<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Genre;
use App\Models\Region;
use App\Models\Bookmark;
use App\Models\Time;
use App\Models\Num;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $bookmark = Bookmark::where('store_id', $request->store_id)->where('user_id', auth()->id())->get();
        $genres = Genre::all();
        $times = Time::all();
        $nums = Num::all();
        return view('detail', compact('store', 'regions','genres', 'bookmark', 'times', 'nums'));
    }

    public function adminIndex()
    {
        $stores = Store::all();
        $regions = Region::all();
        $genres = Genre::all();
        return view('/admin/store_list', compact('stores', 'regions', 'genres'));
    }

    public function updateIndex(Request $request)
    {
        $store = Store::find($request->store_id);
        $regions = Region::all();
        $genres = Genre::all();
        return view('/admin/store_update', compact('store', 'regions', 'genres'));
    }

        public function update(UpdateStoreRequest $request)
        {
        $upStore = $request->only(['name', 'genre_id', 'region_id', 'user_id', 'overview']);
        if(request('thumbnail')) {
            $file = $request->file('thumbnail');
            $file_name = $file->getClientOriginalName();
            if(app()->isLocal()) {
                $path = Storage::putFileAs('public/post_img', $file, $file_name);
                $upStore['thumbnail'] = Storage::url($path);
            } else {
                $path = Storage::disk('s3')->putFileAs('/', $file, $file_name, 'publick');
                $upStore['thumbnail'] = Storage::disk('s3')->url($path);
            }
        }
        Store::find($request->store_id)->update($upStore);
        return redirect('/admin/storelist');
    }

    public function storeIndex()
    {
        $regions = Region::all();
        $genres = Genre::all();
        return view('/admin/store', compact('regions', 'genres'));
    }

    public function store(CreateStoreRequest $request)
    {
        $newStore = $request->only(['name', 'genre_id', 'region_id', 'user_id', 'overview']);
        $file = $request->file('thumbnail');
        $file_name = $file->getClientOriginalName();
        if (app()->isLocal()) {
            $path = Storage::putFileAs('public/post_img', $file, $file_name);
            $newStore['thumbnail'] = Storage::url($path);
        } else {
            $path = Storage::disk('s3')->putFileAs('/', $file, $file_name, 'publick');
            $newStore['thumbnail'] = Storage::disk('s3')->url($path);
        }

        Store::create($newStore);
        return redirect('/admin/storelist');
    }
}
