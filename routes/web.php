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
Route::group(['middleware' => 'auth'], function() {
    
    Route::resource('users', 'UsersController');
    
    Route::resource('posts', 'PostController');
    
    Route::resource('likes', 'LikeController');
    
    Route::resource('teaches', 'TeachController');
    
    Route::resource('chat', 'ChatController');
    
});

Route::get('/ajax/like/user_list', 'LikeController@user_list');
Route::post('/ajax/like', 'LikeController@like');

Auth::routes();

Route::get('/', 'PostController@index')->name('index');