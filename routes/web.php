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
Route::get('/user/login',[ 'as' => 'userlogin', 'uses' => 'UsersController@login']);
Route::post('/user/logout',[ 'as' => 'userlogout', 'uses' => 'UsersController@logout']);
Route::post('/user/logincheck', 'UsersController@logincheck');
Route::resource('user', 'UsersController');
Route::resource('blog', 'postController');

