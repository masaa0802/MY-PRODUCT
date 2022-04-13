<?php

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
    Route::get('/', function () {
        return view('pages.top');
    });

    Route::get('/about', function () {
        return view('pages.about');
    });

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::get('emailindex', 'Admin\UserController@index');
    Route::get('emailedit', 'Admin\UserController@edit');
    Route::post('emailedit', 'Admin\UserController@update');

    Route::get('/mypage', function () {
        return view('pages.mypage');
    })->middleware(['auth'])->name('mypage');

    // Route::get('users','UsersController@delete_confirm');　//警告画面に飛ばしたいため追記

    require __DIR__.'/auth.php';
    
