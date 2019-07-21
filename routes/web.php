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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::groupは、いくつかのRoutingの設定をグループ化
// [‘prefix’ => ‘admin’]は無名関数function(){} の中の設定のURLを http://XXXXXX.jp/admin/ から始まるURL
// http://XXXXXX.jp/admin/news/create にアクセスが来たら、
// Controller Admin\NewsController のAction addに渡す という設定

Route::group(['prefix' => 'admin'], function(){
    Route::get('news/create', 'Admin\NewsController@add');
});