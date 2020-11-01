<?php

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


Auth::routes();


//bookmarkアプリケーション全体をログイン必須にする
Route::group(['middleware' => 'auth'], function() {
    
    //トップページをbookmark一覧に設定
    Route::get('/','BookmarkController@index');
    
    //CRUD実装 第一引数にはURL,第二引数にはコントローラ名を記述
    Route::resource('bookmarks','BookmarkController');

    Route::resource('tags','TagController');

});

