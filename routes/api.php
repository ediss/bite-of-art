<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['cors']], function () {
    Route::get('/getEvents',        'ApiController@getEvents');
    Route::get('/getArtists',       'ApiController@getArtists');
    Route::get('/getArtworks',      'ApiController@getArtworks');
    Route::get('/getGallerists',    'ApiController@getGallerists');
    Route::get('/getNews',          'ApiController@getNews');
});


