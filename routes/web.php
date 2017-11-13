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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/register', 'UserController@showRegisterForm');
Route::post('/register', 'UserController@addNewUser');

Route::get('/polls', 'PollController@showAllPolls');

Route::middleware('auth')->group(function(){

    Route::get('/profile', 'HomeController@showProfile')->name('profile')->middleware('auth');
    Route::get('/logout', 'HomeController@loggingOut')->middleware('auth');

    Route::prefix('poll')->group(function(){
        Route::get('/{id}', 'PollController@showOnePoll');
        Route::get('/{id}/edit', 'PollController@editPoll');
        Route::get('/{id}/delete', 'PollController@deletePoll');
    });
});


