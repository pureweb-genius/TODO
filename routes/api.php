<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::group(['prefix' => 'todos','middleware'=>'auth:sanctum'], function () {
    Route::get('/', 'App\Http\Controllers\TodoController@index');
    Route::post('/', 'App\Http\Controllers\TodoController@store');
    Route::put('/{id}', 'App\Http\Controllers\TodoController@update');
    Route::delete('/{id}', 'App\Http\Controllers\TodoController@delete');
});


Route::group(['namespace'=>'App\Http\Controllers','prefix'=>'auth/'], function () {
    Route::post('register',  'App\Http\Controllers\AuthController@register');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
});
