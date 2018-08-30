<?php


Route::resource('series', 'SeriesController');
Route::resource('{series_by_id}/lessons', 'LessonsController');
Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController');
Route::resource('post', 'PostController');