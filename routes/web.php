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


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('info','UsersController@info')->name('users.info');

Route::group(['middleware'=>['auth']],function(){
    Route::post('info','UsersController@store')->name('user_info.post');
    Route::get('user/{id}','UsersController@show')->name('user.show');

    Route::get('cats/create','CatsController@create')->name('cats.create');
    Route::post('cats/store','CatsController@store')->name('cats.store');
    Route::get('cats','CatsController@index')->name('cats.index');
    Route::get('cats/{id}','CatsController@show')->name('cat.show');
    
    Route::group(['prefix'=>'cats/{id}'],function(){
        Route::post('favorite','CatsUsersController@store')->name('favorite');
        Route::delete('unfavorite','CatsUsersController@destroy')->name('unfavorite');
    });
});
