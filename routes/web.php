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

Route::get('profile', 'ProfileController@index')->name('profile');

Route::get('userInfo', 'ProfileController@userInfo')->name('userInfo');

Route::get('checkUser', 'ProfileController@checkUser')->name('checkUser')->middleware('auth');

//Route::resource('board', 'BoardController');

Route::get('/board', 'BoardController@index')->name('board');
Route::get('/board/view/{id}', 'BoardController@view')->name('board.view');
Route::get('/board/write', 'BoardController@write')->name('board.write')->middleware('auth');
Route::get('/board/edit/{id}', 'BoardController@edit')->name('board.store')->middleware('auth');
Route::post('/board/update', 'BoardController@update')->name('board.update')->middleware('auth');
Route::post('/board/store', 'BoardController@store')->name('board.store')->middleware('auth');