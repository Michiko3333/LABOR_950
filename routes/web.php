<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EgovController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** 未ログイン */
Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login_post');
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register_post');

/** ログイン必須ページ */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/logout', [LogoutController::class, 'index'])->name('auth.logout');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('auth.logout_post');

    // EgovAPI
    Route::get('/auth/redirect', [EgovController::class, 'getAuthCode'])->name('egov.get_auth_code');
});

