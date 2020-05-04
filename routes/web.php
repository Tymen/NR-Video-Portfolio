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

Route::get('/', "PagesController@homePage");
Route::get('/portfolio', "PagesController@portfolio");
Route::get('/prijzen', "PagesController@prijzen");
Route::get('/contact', "PagesController@contact");
Route::get('/services/{service}', "PagesController@services");
Route::namespace('admin')->name('admin.')->prefix('admin')->group(function () {
        Route::get('/', "AdminController@index");
        Route::resource('/editpage/{service}', "ServicesController");
});

