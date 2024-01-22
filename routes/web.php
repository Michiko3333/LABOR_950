<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EgovController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KgiController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdministrativeController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\DepartmentInforController;

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
    Route::get('/resident_voice', [ResidentController::class, 'index'])->name('resident_voice');
    Route::get('/department_contact', [DepartmentController::class, 'index'])->name('department_contact');
    Route::get('/kgi_information', [KgiController::class, 'index'])->name('kgi_information');
    Route::get('/business_request', [BusinessController::class, 'index'])->name('business_request');
    Route::get('/alert', [AlertController::class, 'index'])->name('alert');
    Route::get('/about_us', [AboutController::class, 'index'])->name('about_us');
    Route::get('/employee_information', [EmployeeController::class, 'index'])->name('information');
    Route::get('/administrative_procedure', [AdministrativeController::class, 'index'])->name('administrative');
    Route::get('/regulation_related', [RegulationController::class, 'index'])->name('regulation_related');
    Route::get('/department_information', [DepartmentInforController::class, 'index'])->name('department_information');

    // EgovAPI
    Route::get('/auth/redirect', [EgovController::class, 'getAuthCode'])->name('egov.get_auth_code');
});

