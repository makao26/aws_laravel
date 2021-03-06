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

//homeはサブスク確認用で使用 7/25(土)
Route::get('/home', 'HomeController@index')->name('home');

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
Route::get('/article/detail', 'ArticleController@detail');
//課金用画面
Route::get('/stripe', 'StripeController@index');
Route::post('/stripe', 'StripeController@postPayNum');
Route::get('/stripe/confirm', 'StripeController@confirm');
Route::post('/stripe/confirm', 'StripeController@singleStripe');



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
Route::get('/admin/article/edit', 'admin\ArticleController@edit')
  ->middleware('auth');
Route::post('/admin/article/edit', 'admin\ArticleController@update')
  ->middleware('auth');
Route::get('/admin/clothes-cross', 'admin\ClothesCrossController@index')
  ->middleware('auth');
Route::get('/admin/recommend', 'admin\RecommendController@index')
  ->middleware('auth');

// 記事カテゴリー対応
Route::get('/admin/articlecategory', 'admin\ArticlecategoryController@index')
  ->middleware('auth');
Route::get('/admin/articlecategory/add', 'admin\ArticlecategoryController@add')
  ->middleware('auth');
Route::post('/admin/articlecategory/add', 'admin\ArticlecategoryController@create')
  ->middleware('auth');
//シャーディングテスト
Route::get('/shard', 'ShardtestController@index')
->middleware('auth');
Route::get('/shard/list', 'ShardtestController@list')
->middleware('auth');