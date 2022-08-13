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

Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');


Route::get('/', 'UsersController@welcome')->name('welcome');

Route::get('info','UsersController@info')->name('users.info');

Route::get('guest','CatsController@guest')->name('guest.index');
Route::get('guest/{id}','CatsController@guestshow')->name('guest.show');

Route::group(['middleware'=>['auth']],function(){
    Route::post('info','UsersController@store')->name('user_info.post');
    Route::get('user/{id}','UsersController@show')->name('user.show');
    Route::get('user/{id}/edit','UsersController@edit')->name('user.edit');
    Route::put('user/{id}/update','UsersController@update')->name('user.update');
    Route::get('user/{id}/posts','UsersController@posts')->name('user_cats');

    Route::get('cats/create','CatsController@create')->name('cats.create');
    Route::post('cats/store','CatsController@store')->name('cats.store');
    Route::get('cats','CatsController@index')->name('cats.index');
    Route::get('cats/{id}','CatsController@show')->name('cat.show');
    Route::get('cat/{id}/edit','CatsController@edit')->name('cat.edit');
    Route::put('cat/{id}/put','CatsController@update')->name('cat.update');
    Route::delete('cat/{id}/delete','CatsController@destroy')->name('cat.delete');
    
    Route::group(['prefix'=>'cats/{id}'],function(){
        Route::post('favorite','CatsUsersController@store')->name('favorite');
        Route::delete('unfavorite','CatsUsersController@destroy')->name('unfavorite');
        Route::get('favorites','CatsUsersController@favorites')->name('favorites');
    });
    
    Route::group(['prefix'=>'users/{id}'],function(){
        Route::get('chatroom','MessagesController@index')->name('messages.get');
        Route::post('chatroom/store','MessagesController@store')->name('messages.post');
        Route::get('chatroom/show','MessagesController@show')->name('messages.show');
    });
});
