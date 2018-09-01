<?php


Route::resource('series', 'SeriesController');
Route::resource('{series_by_id}/lessons', 'LessonsController');
Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController');
Route::resource('post', 'PostController');
Route::resource('portfolio', 'PortfolioController');


Route::get('/galleryportfolio/{id}/list', 'GalleryPortfolioController@list')->name('galleryportfolio.list');
Route::get('/galleryportfolio/{id}/create', 'GalleryPortfolioController@create')->name('galleryportfolio.create');
Route::post('/galleryportfolio/store', 'GalleryPortfolioController@store')->name('galleryportfolio.store');
Route::get('/galleryportfolio/{id}', 'GalleryPortfolioController@destroy')->name('galleryportfolio.destroy');
