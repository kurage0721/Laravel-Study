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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// //一覧ページ
// Route::get('bookmarks','BookmarkController@index');
// //詳細ページ
// Route::get('bookmarks/{bookmark}','BookmarkController@show')->where('id', '[0-9]+')->name('bookmarks.show');
// //レコード追加
// Route::post('bookmarks','BookmarkController@store');

//CRUD実装 第一引数にはURL,第二引数にはコントローラ名を記述
Route::resource('bookmarks','BookmarkController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
