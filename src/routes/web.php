<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::get('/', [ShopController::class, 'index']);
Route::get('/shop/search', [ShopController::class, 'search']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);

Route::middleware('verified')->group(function() {
    Route::get('/mypage',[MypageController::class, 'index']);
    Route::post('/bookmark', [BookmarkController::class, 'store']);
    Route::delete('/bookmark/{store_id}', [BookmarkController::class, 'destroy']);
    Route::post('/reservation', [ReservationController::class, 'store']);
});

Route::group(['middleware' => ['auth, can:admin-authority']], function(){
});

Route::group(['middleware' => ['auth, can:representative-authority']], function(){
});