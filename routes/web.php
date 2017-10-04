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
Route::get('s/', 'SeriesController@index')->name('series.index');
Route::get('s/{seriesSlug}', 'SeriesController@show');
Route::get('s/{seriesSlug}/{bookSlug}', 'BookController@show');
Route::get('s/{seriesSlug}/{bookSlug}/{chapterNumber}', 'ChapterController@show');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('series/create', 'SeriesController@create')->name('series.create');
    Route::post('series/store', 'SeriesController@store')->name('series.store');
    Route::get('series/{seriesSlug}/create', 'BookController@create');
    Route::post('series/{seriesSlug}/store', 'BookController@store');    
    Route::get('series/{seriesSlug}/book/{bookSlug}/create', 'ChapterController@create');
    Route::post('series/{seriesSlug}/book/{bookSlug}/store', 'ChapterController@store');

});
