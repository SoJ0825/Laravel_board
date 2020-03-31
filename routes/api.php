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

Route::post('login','UserController@login');
Route::post('register','UserController@store');
//SOJ: 沒用的 router 還不刪掉
Route::get('index','PostController@indexWithoutLogin');
Route::get('board','PostController@index');

Route::group(['middleware' => ['auth:api']], function(){
    Route::get('logout','UserController@logout');
    Route::post('post','PostController@store');
    Route::get('like/{post_id}','LikeController@store');
});
