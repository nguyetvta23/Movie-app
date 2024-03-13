<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\MoviesController@index')->name('movies.index');
Route::get('/movies/{id}', 'App\Http\Controllers\MoviesController@show')->name('movies.show');

// Route::get('/tv', 'TvController@index')->name('tv.index');
// Route::get('/tv/{id}', 'TvController@show')->name('tv.show');

Route::get('/actors', 'App\Http\Controllers\ActorsController@index')->name('actors.index');
Route::get('/actors/pages/{page?}', 'App\Http\Controllers\ActorsController@index');
Route::get('/actors/{id}', 'App\Http\Controllers\ActorsController@show')->name('actors.show');

// Tv shows
Route::get('/tvshows', 'App\Http\Controllers\TvShowController@index')->name('tvshows.index');
Route::get('/tvshow/{id}','App\Http\Controllers\TvShowController@show')->name('tvshow.show');