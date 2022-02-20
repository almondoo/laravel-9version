<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

if (!Auth::check()) {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
}

// 認証機能
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

// 認証グループ
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');
});
