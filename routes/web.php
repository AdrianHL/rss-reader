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


Route::middleware(['auth'])->group(function () {
    Route::get('/rss-manager', 'RssManagerController@index')->name('rss-manager-home');
    Route::get('/add-rss', 'RssManagerController@add')->name('add-rss');
    Route::post('/add-rss', 'RssManagerController@post')->name('add-rss-action');
    Route::get('/view-rss/{rssId}', 'RssManagerController@view')->name('view-rss');
});
