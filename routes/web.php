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

Route::get('json-test/', 'JsonTestController@index');
Route::post('json-test/', 'JsonTestController@postJson');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('room/', 'RoomController@index')
  ->middleware('auth');
Route::get('create', 'PostsController@add');
Route::post('create', 'PostsController@create');

//一般ユーザー閲覧画面
//プロフィール
Route::get('/profile', 'ProfileController@index');
//お問い合わせ
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@postContact');
//ブログ記事
Route::get('/article', 'ArticleController@index');

//管理ユーザー画面
Route::get('/admin/contact', 'admin\ContactController@index')
  ->middleware('auth');
Route::post('/admin/contact', 'admin\ContactController@searchContact')
  ->middleware('auth');
Route::get('/admin/contact/detail', 'admin\ContactController@detail')
  ->middleware('auth');
Route::post('/admin/contact/detail', 'admin\ContactController@postMail')
  ->middleware('auth');
Route::get('/admin/article', 'admin\ArticleController@index')
  ->middleware('auth');
Route::post('/admin/article', 'admin\ArticleController@searchArticle')
  ->middleware('auth');
Route::get('/admin/article/add', 'admin\ArticleController@add')
  ->middleware('auth');
Route::post('/admin/article/add', 'admin\ArticleController@create')
  ->middleware('auth');
