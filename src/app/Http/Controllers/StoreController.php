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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;

class StoreController extends Controller
{
    public function index (Request $request)
    {
        $regions = Region::all();
        $genres = Genre::all();
        $stores = Store::search($request->query())
        ->sortByKey($request->sort_key)
        ->get();

        return view('index', compact('stores', 'regions','genres'));
    }

    public function search(Request $request)
    {
        $params = $request->query();
        $stores = Store::search($params)
        ->sortByKey($params['sort_key'] ?? null)
        ->get();
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
        $upStore = $request->only(['name', 'genre_id', 'region_id', 'overview']);
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
        $newStore = $request->only(['name', 'genre_id', 'region_id', 'overview']);
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

    public function importCsv(Request $request)
    {
        $csvFile = $request->file('csv_file');

        $config = new LexerConfig();
        $interpreter = new Interpreter();
        $lexer = new Lexer($config);

        $dataList = [];
        $validationErrors = new MessageBag();

        if (!$csvFile) {
            $validationErrors->add('csv', 'CSVファイルが選択されていません。ファイルを選択してください。');
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }

        $config->setToCharset("UTF-8")
        ->setDelimiter(",")
        ->setEscape("\\");
        $fileContent = file_get_contents($csvFile);
        $detectedEncoding = mb_detect_encoding($fileContent, ['ASCII', 'ISO-2022-JP', 'UTF-8', 'UTF-16','EUC-JP', 'SJIS-win', 'SJIS']);
        if ($detectedEncoding) {
            $config->setFromCharset($detectedEncoding);
        } else {
            $config->setFromCharset("SJIS");
        }

        try {
            $interpreter->addObserver(function (array $row) use (&$dataList) {
                $dataList[] = array_map(function($value) {
                    return mb_convert_kana(trim($value), 'n', 'UTF-8');
                }, $row);
            });
            $lexer->parse($csvFile, $interpreter);
        } catch (\Exception $e) {
            $validationErrors->add('csv', 'CSVファイルの形式が不正です。正しいフォーマットのファイルをアップロードしてください。');
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }

        foreach($dataList as $row) {
            $data= [
                'name' => $row[0],
                'genre_id' => (int)$row[1],
                'region_id' => (int)$row[2],
                'overview' => $row[3],
                'thumbnail' => $row[4]
            ];
            $validator = Validator::make($data,[
                'name' => ['required','max:50'],
                'genre_id' => ['required','integer','between:1,5'],
                'region_id' => ['required','integer','between:1,3'],
                'overview' => ['required','max:400'],
                'thumbnail' => ['required', 'regex:/\.?(jpeg|png)$/i']
            ],[
                'name.required' => '店舗名を入力してください',
                'name.max' => '店舗名は50文字以内で入力してください',
                'genre_id.required' => 'ジャンルを入力してください',
                'genre_id.integer' => 'ジャンルは数値で入力してください',
                'genre_id.between' => 'ジャンルは1から5の範囲で入力してください',
                'region_id.required' => '地域を入力してください',
                'region_id.integer' => '地域は数値で入力してください',
                'region_id.between' => '地域は1から3の範囲で入力してください',
                'overview.required' => '店舗概要を入力してください',
                'overview.max' => '店舗概要は400文字以内で入力してください',
                'thumbnail.required' => '画像ファイルを選択してください',
                'thumbnail.regex' => '画像ファイル(jpeg,png)を選択してください',
            ]);
            if($validator->fails()) {
                $validationErrors->merge($validator->errors());
                continue;
            }
            Store::create($data);
        }
        if ($validationErrors->isNotEmpty()) {
            return redirect()->back()->withErrors($validationErrors)->withInput();
        }

        return redirect('/admin/storeupload')->with('message', '店舗情報を登録しました');
    }
}