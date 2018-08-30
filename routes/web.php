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

Route::get('/', 'FrontendController@welcome')->name('index');
Route::get('/terms', 'HomeController@terms');
Route::get('/contact', 'HomeController@contact');

Route::get('/watch-series/{series}', 'WatchSeriesController@index')->name('series.learning');

Route::get('/series/{series}/lesson/{lesson}', 'WatchSeriesController@showLesson')->name('series.watch');

Route::get('/series/{series}', 'FrontendController@series')->name('series');

Route::get('/register/confirm', 'ConfirmEmailController@index')->name('confirm-email');


Route::get('/logout', function() {
	auth()->logout(); return redirect('/');
});


Route::get('/home', 'HomeController@index')->name('home');
