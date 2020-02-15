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





// Route::post('/event/{id?}', 'EventController@ajaxLoadEventData');
// Auth::routes();
Route::get('/login', 'Auth\CustomLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\CustomLoginController@login')->name('custom.login.submit');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',                 'EventController@index');
Route::any('/test',             'EventController@submitEvent');


Route::any('/ajax',             'EventController@ajaxTest')->middleware('auth');

Route::post('/event',           'EventController@ajaxLoadEventData')->middleware('auth');

//Route::post('/submitEvent',     'EventController@submitEvent');

Route::post('/submitArtist',    'EventController@submitArtist');
Route::post('/submitArtwork',   'EventController@submitArtwork');




Route::group([
    'prefix'        => 'moderator',
    'middleware'    => ['auth','moderator'],
], function() {
    Route::get('/', 'ModeratorController@index')->name('moderator.dashboard');
    Route::get('/get-gallerists', 'ModeratorController@getGallerists');
    Route::get('/get-events', 'ModeratorController@getEvents');
    Route::get('/update-event{id}', 'ModeratorController@updateEvent')->name('moderator.event.update');
});
