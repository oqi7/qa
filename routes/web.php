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
    
    Route::get('/posts/search','PostController@search');
    Route::get('posts/{id}/teaches', 'PostController@teaches');
    Route::resource('posts', 'PostController');
    
    Route::resource('likes', 'LikeController');
    
    Route::resource('teaches', 'TeachController');
    
    Route::get('/chat/{recieve}' , 'ChatController@index')->name('chat');
    Route::post('/chat/send' , 'ChatController@store')->name('chatSend');

    
});

Auth::routes();

Route::get('/', 'PostController@index')->name('index');