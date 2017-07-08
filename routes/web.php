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

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name("home");
    Route::get('category/{slug}', 'CategoryController@index')->name("category");
    Route::get('blog/{slug}', 'BlogController@index')->name("blog");
    Route::get("search","BlogController@search")->name("search");
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'backend', 'as' => 'backend.'], function () {

    Route::get('/', 'Backend\DashboardController@index');
    Route::get('/dashboard', 'Backend\DashboardController@index');
    Route::resource('/category', 'Backend\CategoryController');
    Route::resource('/blog', 'Backend\BlogController');
});
