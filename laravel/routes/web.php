<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TaskController;
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

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('guest.login');
    })->name('login');
    Route::get('/register', function () {
        return view('guest.register');
    })->name('register');
});


// 認証機能
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('user.register');
    Route::post('/login', 'login')->name('user.login');
    Route::get('/logout', 'logout')->name('user.logout');
});

// 認証グループ
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::controller(TaskController::class)->group(function () {
        Route::get('/task', 'listTask')->name('task.list');
        Route::get('/task/detail/{id?}', 'detailTask')->name('task.detail');

        Route::post('/task/create', 'createTask')->name('task.create');
        Route::put('/task/update', 'updateTask')->name('task.update');
        Route::delete('/task/delete', 'deleteTask')->name('task.delete');
    });
});
