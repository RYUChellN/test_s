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
    return view('top');
});

/*
Route::get('/', function() {
    return view('index');
});
*/

Auth::routes();

Route::get('/create','PostController@create')->name('create');
Route::post('/store','PostController@store')->name('store');

Route::get('/mypage/{user}', 'MypageController@mypage')->name('edit');
Route::post('/mypage/{user}', 'MypageController@update')->name('update');

Route::get('/index','userPostController@index')->name('user_post');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::post('/register','Auth\RegisterController@create');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
//Route::get('/', 'PostController@index');