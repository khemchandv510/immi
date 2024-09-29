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

// Auth::routes();
Route::group(['middleware' => 'web'],
    function () {
Route::group(['middleware' => '\App\Http\Middleware\ajax'],
    function () {






Route::get('get-department', 'AjaxController@getDepartment');

Route::get('admin-filter-dashboard', 'AjaxController@adminFilterdashboard');
Route::get('conversion','AjaxController@conversion');


});

    });