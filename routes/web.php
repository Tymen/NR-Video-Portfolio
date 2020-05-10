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
Route::group(['middleware' => ['maintenance']], function () {
    Route::get('/', "PagesController@homePage");
//    Route::get('/portfolio', "PagesController@portfolio");
//    Route::get('/prijzen', "PagesController@prijzen");
    Route::resource('/contact', "ContactController");
    Route::get('/services/{service}', "PagesController@services");
    Route::group(['middleware' => ['checkAdmin']], function () {
        Route::namespace('admin')->name('admin.')->prefix('admin')->group(function () {
            Route::get('/', "AdminController@index");
            Route::get('/contact', "AdminContactController@index");
            Route::get('/contact/{id}', "AdminContactController@show");
            Route::resource('/users', "AdminUsersController");
            Route::get('/settings', "SettingsController@index");
            Route::post('/settings', "SettingsController@changeSettings");
            Route::resource('/editservice', "ServicesController", ['parameters' => [
                'editservice' => 'service'
            ]]);
            Route::resource('/editpage', "PagesEditController", ['parameters' => [
                'editpage' => 'page'
            ]]);
        });
    });
});
Route::get('/maintenance', function (){
   return view('maintenance');
})->name('maintenance');

Auth::routes();
Route::get('/logout', 'HomeController@logout');
