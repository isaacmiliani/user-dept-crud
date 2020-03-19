<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('departments', 'DepartmentController@index');
Route::group(['prefix' => 'departments'], function () {
    Route::post('add', 'DepartmentController@add');
    Route::get('edit/{id}', 'DepartmentController@edit');
    Route::post('update/{id}', 'DepartmentController@update');
    Route::delete('delete/{id}', 'DepartmentController@delete');
});
Route::get('users', 'UserController@index');
Route::group(['prefix' => 'users'], function () {
    Route::post('add', 'UserController@add');
    Route::get('edit/{id}', 'UserController@edit');
    Route::post('update/{id}', 'UserController@update');
    Route::delete('delete/{id}', 'UserController@delete');
});
Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

