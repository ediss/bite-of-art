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

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/','EventController@index');
Route::any('/test','GalleryController@test');


Route::any('/ajax','EventController@ajaxTest');

Route::post('/event', 'EventController@ajaxLoadEventData');

Route::post('/submitEvent', 'EventController@submitEvent');

Route::post('/submitArtist', 'EventController@submitArtist');
Route::post('/submitArtwork', 'EventController@submitArtwork');


// Route::post('/event/{id?}', 'EventController@ajaxLoadEventData');