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
