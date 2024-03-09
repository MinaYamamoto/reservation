<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StripeController;

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

Route::get('redirects', [LoginController::class, 'index']);
Route::get('/', [StoreController::class, 'index']);
Route::get('/store/search', [StoreController::class, 'search']);
Route::get('/detail/{store_id}', [StoreController::class, 'detail']);

Route::middleware('verified')->group(function() {
    Route::get('/mypage',[MypageController::class, 'index'])->name('mypage');
    Route::post('/bookmark', [BookmarkController::class, 'store']);
    Route::delete('/bookmark/{store_id}', [BookmarkController::class, 'destroy']);
    Route::post('/reservation', [ReservationController::class, 'store']);
    Route::delete('/reservation/{reservation_id}', [ReservationController::class, 'destroy']);
    Route::patch('/reservation/{reservation_id}', [ReservationController::class, 'update']);
    Route::post('/review', [ReviewController::class, 'store']);
    Route::patch('/review/{review_id}', [ReviewController::class, 'update']);
    Route::delete('/review/{review_id}', [ReviewController::class, 'destroy']);
    Route::get('/success',function(){
        return view('success');
    })->name('success');
});

Route::group(['middleware' => ['auth', 'can:admin-authority']], function() {
    Route::get('/admin/representative', [UserController::class,'index']);
    Route::post('/admin/representative', [UserController::class,'store']);
});

Route::group(['middleware' => ['auth', 'can:representative-authority']], function() {
    Route::get('/admin/reservation',  [ReservationController::class, 'index']);
    Route::get('/admin/reservation/search',  [ReservationController::class, 'search']);
    Route::get('/admin/reservation/{reservation_id}',  [ReservationController::class, 'detail']);
    Route::get('/admin/storelist', [StoreController::class, 'adminIndex']);
    Route::get('/admin/storelist/{store_id}', [StoreController::class, 'updateIndex']);
    Route::post('/admin/storelist/{store_id}', [StoreController::class, 'update']);
    Route::get('/admin/store/registration', [StoreController::class, 'storeIndex']);
    Route::post('/admin/store/registration', [StoreController::class, 'store']);
    Route::get('/admin/mail', [MailController::class, 'index']);
    Route::post('/admin/mail/confirm', [MailController::class, 'confirm']);
    Route::post('/admin/mail/execute', [MailController::class, 'execute']);
});