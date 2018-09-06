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

// Route::get('/redis', function() {
// 	Redis::sadd("user:{2}:series:{1}", 1);
// 	dd(Redis::smembers('user:{2}:series:{1}'));

// });

Auth::routes();

Route::get('/register/confirm', 'ConfirmEmailController@index')->name('confirm-email');
Route::get('/logout', function() {
	auth()->logout(); return redirect('/');
});

Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/{slug}', 'BlogController@post')->name('blog.post');
Route::get('/blog/{name}/{query}', 'BlogController@search')->name('blog.search');
Route::post('/comment', 'BlogController@commentPost');

Route::get('/', 'FrontendController@welcome')->name('index');
Route::post('/message', 'FrontendController@message')->name('message');
Route::get('/terms', 'FrontendController@terms');
Route::get('/contact', 'FrontendController@contact');
Route::get('/portfolio', 'FrontendController@portfolioListing');
Route::get('/portfolio/{slug}', 'FrontendController@portfolioSingle')->name('portfolio.single');

Route::get('/series/{series}', 'FrontendController@series')->name('series');
Route::get('/watch-series/{series}', 'WatchSeriesController@index')->name('series.learning');
Route::get('/series/{series}/lesson/{lesson}', 'WatchSeriesController@showLesson')->name('series.watch');


Route::get('course/{key}/{search}', 'FrontendController@courseIndex');

Route::get('/courses/series', 'FrontendController@course');

Route::post('/series/complete-lesson/{lesson}', 'WatchSeriesController@completeLesson');
