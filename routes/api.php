<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'todos'], function () {
    Route::get('/', 'App\Http\Controllers\TodoController@index');
    Route::post('/', 'App\Http\Controllers\TodoController@store');
    Route::put('/{id}', 'App\Http\Controllers\TodoController@update');
    Route::delete('/{id}', 'App\Http\Controllers\TodoController@delete')->missing(function (Request $request) {
        throw new NotFoundHttpException('User not found.');
    });;
});
