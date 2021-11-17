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

Route::middleware('auth:sanctum')->get('/user', [
    'uses' => 'App\Http\Controllers\UserController@getUserData',
    'name' => 'user.data'
]);

Route::post('/login', [
    'uses' => 'App\Http\Controllers\Auth\LoginController@authenticate',
    'name' => 'login'
]);

Route::post('/register', [
    'uses' => 'App\Http\Controllers\Auth\RegisterController@register',
    'name' => 'register'
]);

Route::post('/logout', [
    'uses' => 'App\Http\Controllers\Auth\LoginController@logout',
    'name' => 'logout'
]);

Route::middleware('auth:sanctum')->post('/qr/generate', [
    'uses' => 'App\Http\Controllers\QRCodeController@generate',
    'name' => 'qr.generate'
]);
