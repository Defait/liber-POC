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

Route::get('/', 'ChapterController@index')->name('chapter.index');
Route::get('series/', 'SeriesController@index')->name('series.index');
Route::get('series/{seriesSlug}', 'SeriesController@show');
Route::get('series/{seriesSlug}/{bookSlug}', 'BookController@show');
Route::get('series/{seriesSlug}/{bookSlug}/{chapterNumber}', 'ChapterController@show');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('creator-hub/create', 'SeriesController@create')->name('series.create');
    Route::post('creator-hub/store', 'SeriesController@store')->name('series.store');
    Route::get('creator-hub/{seriesSlug}/create', 'BookController@create');
    Route::post('creator-hub/{seriesSlug}/store', 'BookController@store');
    Route::get('creator-hub/{seriesSlug}/{bookSlug}/create', 'ChapterController@create');
    Route::post('creator-hub/{seriesSlug}/{bookSlug}/store', 'ChapterController@store');
});
