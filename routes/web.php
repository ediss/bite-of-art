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


Route::get('/test',                 'EventController@test');

Route::get("/about-us", function(){
    return View::make("about");
 })->name('about.bite');

// Route::post('/event/{id?}', 'EventController@ajaxLoadEventData');
// Auth::routes();
Route::get('/login', 'Auth\CustomLoginController@showLoginForm')->name('login')->middleware('guest');
Route::post('/login', 'Auth\CustomLoginController@login')->name('custom.login.submit');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::any('membership', 'Auth\CustomRegisterController@register')->name('register');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'EventController@index')->name('home');

//need to be protected
Route::any('/news/add-news', 'GalleristController@addNews')->name('add.news');

Route::get('/news/{id}', 'EventController@getArticle');


Route::get('/',                 'EventController@index');
Route::group([
    'prefix'        => 'gallerist',
    'middleware'    => ['auth'],
], function() {
    Route::any('/dashboard',        'GalleristController@index')->name('gallerist.dashboard');
    Route::any('/add-new-event',    'EventController@submitEvent')->name('add.new.event');
    Route::post('/submitArtist',    'EventController@submitArtist');
    Route::post('/submitArtwork',   'EventController@submitArtwork');
});


Route::any('/ajax',         'EventController@ajaxTest')->middleware('auth');

Route::get('/event/{id}',   'EventController@ajaxLoadEventData');

Route::get('/news',         'NewsController@index')->name('all.news');
Route::any('/contact',      'ContactController@index')->name('contact');





Route::group([
    'prefix'        => 'moderator',
    'middleware'    => ['auth','moderator'],
], function() {
    Route::get('/',                         'ModeratorController@index')->name('moderator.dashboard');
    Route::get('/get-gallerists',           'ModeratorController@getGallerists');
    Route::get('/get-events',               'ModeratorController@getEvents');
    Route::any('/update-event/{id}',        'ModeratorController@updateEvent')->name('moderator.event.update');
    Route::post('/approve-event/{id}',      'ModeratorController@approveEvent')->name('update-event');

    Route::post('/update-gallerist/{id}',   'ModeratorController@updateGallerist')->name('update-gallerist');

});

Route::get('/warning/{mobile?}',                 'Controller@redirectUser');

