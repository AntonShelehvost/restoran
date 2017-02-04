<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('site.main');
});

Route::get('/restaurant', function () {
    return view('site.main2');
});

Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['auth'], 'namespace' => 'Admin'], function () {
    // Backpack\NewsCRUD
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('menu', 'MenuCrudController');
});