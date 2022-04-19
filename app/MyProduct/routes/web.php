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
    Route::resource('user', 'Admin\UserController');
    Route::get('/', function () {
        return view('pages.top');
    });

    Route::get('/about', function () {
        return view('pages.about');
    });

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::get('myprofileedit', 'Admin\UserController@edit');
    Route::post('myprofileedit', 'Admin\UserController@update');


    Route::get('/mypage', function () {
        return view('pages.mypage');
    })->middleware(['auth'])->name('mypage');


    Route::resource('users','Admin\UserController',['only'=>['show','destroy']]); //destroyを追記
    Route::get('/delete_confirm','Admin\UserController@delete_confirm')->name('pages.delete_confirm'); //警告画面に飛ばしたいため追記
    
    Route::get('/delete_complete', function () {
        return view('pages.delete_complete');
    });

    Route::get('/index', function () {
        return view('post.index');
    });
    // Route::get('/post', 'Admin\PostController@create')->name('post.create');
    // Route::post('/post', 'Admin\PostController@store')->name('post.store');

    Route::resource('post_pages', 'Admin\PostController', ['only' => ['index', 'create', 'store','edit', 'update']]);

    Route::get('change', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
    Route::post('change', 'Auth\ChangePasswordController@ChangePassword')->name('password.change');
    

    require __DIR__.'/auth.php';
    
