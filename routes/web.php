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
})->name('logout');
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

Route::get('course/{key}/{search}', 'FrontendController@courseIndex');
Route::get('/courses/series', 'FrontendController@course')->name('course');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile');
Route::get('/series/{series}', 'FrontendController@series')->name('series');

Route::middleware('auth')->group(function() {
	
	Route::post('/series/complete-lesson/{lesson}', 'WatchSeriesController@completeLesson');
	Route::get('/watch-series/{series}', 'WatchSeriesController@index')->name('series.learning');
	Route::get('/series/{series}/lesson/{lesson}', 'WatchSeriesController@showLesson')->name('series.watch');

	Route::get('/subscribe', 'SubscriptionsController@showSubscriptionForm');

	Route::post('/subscribe', 'SubscriptionsController@subscribe');

	Route::put('/profile/update/{user}', 'ProfilesController@updatePersonal')->name('profile.update');

	Route::post('/subscription/change', 'SubscriptionsController@change')->name('subscription.change');

	Route::post('/card/update', 'ProfilesController@updateCard');


});



Route::get('/login/github', function() {

	return Socialite::driver('github')->redirect();

});

Route::get('/login/github/callback', function() {

	$data = Socialite::with('github')->user();
	$user = Absltcast\User::where('email', $data->email)->first();

	if(!is_null($user)){
		Auth::login($user);
		$user->name = $data->user['name'];
		$user->save();
	} else {
		$user = Absltcast\User::where('provider_id', $data->user['id'])->first();
        if (is_null($user)) {
            // Create a new user
            $checkName = Absltcast\User::where('name', $data->user['name'])->first();
            if(!is_null($checkName))
            {
            	$user = new Absltcast\User();
	            $user->name = $data->user['name'];
	            $user->username = str_slug($data->user['name'] . ' ' . $data->user['id']);
	            $user->email = $data->email;
	            $user->provider_id = $data->user['id']; 
	            $user->save();
            } else {
            	$user = new Absltcast\User();
	            $user->name = $data->user['name'];
	            $user->username = str_slug($data->user['name']);
	            $user->email = $data->email;
	            $user->provider_id = $data->user['id']; 
	            $user->save();	
            }
            
        }

        Auth::login($user);
	}

	return redirect('/');

});