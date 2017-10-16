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

Route::post('bid/{id}', 'BidsController@place');

Route::resource('auctions', 'AuctionsController');

Route::get('complete-registration', 'CardController@index')->name("complete");
Route::post('complete-registration', 'CardController@store');
