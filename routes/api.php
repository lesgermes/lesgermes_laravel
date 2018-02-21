<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->post('/register-eden', 'Api\EdenController@registerEden');
Route::middleware('auth:api')->get('/user-edens', 'Api\EdenController@getUserEdens');

Route::post('/login', 'Api\NoAuthController@login');
Route::post('/register', 'Api\NoAuthController@register');