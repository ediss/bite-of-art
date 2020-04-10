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

    // Password Reset Routes...
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// Route::get('/test',                 'EventController@test')->name('test');
Route::get('/', function(){
    return redirect(app()->getLocale());
});

Route::group([
    'prefix'     => '{language}',
    'middleware' => 'setLanguage',
], function(){

    Route::get("/about-us", function(){
        return View::make("about");
     })->name('about.bite');

    // Route::post('/event/{id?}', 'EventController@ajaxLoadEventData');
    // Auth::routes();
    Route::get('/login', 'Auth\CustomLoginController@showLoginForm')->name('login')->middleware('guest');
    Route::post('/login', 'Auth\CustomLoginController@login')->name('custom.login.submit');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::any('membership', 'Auth\CustomRegisterController@register')->name('register');


    Route::get('/',     'EventController@index')->name('home');


    //need to be protected


    Route::get('/news/{id?}', 'EventController@getArticle')->name("opened.news");

    Route::group([
        'prefix'        => 'gallerist',
        'middleware'    => ['auth'],
    ], function() {
        Route::any('/dashboard',        'GalleristController@index')        ->name('gallerist.dashboard');
        Route::any('/add-new-event',    'EventController@submitEvent')      ->name('add.new.event');
        Route::post('/submitArtist',    'EventController@submitArtist')     ->name('add.artist');
        Route::post('/submitArtwork',   'EventController@submitArtwork')    ->name('add.artwork');
    });


    Route::any('/ajax',             'EventController@ajaxTest')->middleware('auth');

    Route::any('/event/{id?}',      'EventController@ajaxLoadEventData')->name('opened.event');

    Route::get('/all-news',         'NewsController@index')->name('all.news');
    Route::any('/news/add/article', 'NewsController@addArticle')->name('add.new.article')->middleware('auth');
    Route::any('/contact',          'ContactController@index')->name('contact');





    Route::group([
        'prefix'        => 'moderator',
        'middleware'    => ['auth','moderator'],
    ], function() {
        Route::get('/',                         'ModeratorController@index')->name('moderator.dashboard');
        Route::get('/get-gallerists',           'ModeratorController@getGallerists')->name('get.all.gallerists');
        Route::get('/get-events',               'ModeratorController@getEvents')->name('get.all.events');
        Route::get('/events-media-desc',        'ModeratorController@eventMediaDesc')->name('moderator.event.media.desc');
        Route::get('/get-news',                 'ModeratorController@getNews')->name('get.all.news');
        Route::any('/update-event/{id}',        'ModeratorController@updateEvent')->name('moderator.event.update');
        Route::any('/update-whole-event/{id}',  'ModeratorController@updateEventArtistData')->name('moderator.event.artist.update');
        Route::any('/update-event-artwork/{id}','ModeratorController@updateEventArtworkData')->name('moderator.event.artwork.update');
        Route::post('/approve-event/{id}',      'ModeratorController@approveEvent')->name('approve.event');
        Route::post('/update-gallerist/{id}',   'ModeratorController@approveGallerist')->name('approve.gallerist');
        Route::post('/approve-article/{id}',    'ModeratorController@approveArticle')->name('approve.article');
        Route::any('/update-article/{id}',      'ModeratorController@updateArticle')->name('moderator.article.update');
        Route::any('/article-additional/{id?}',  'ModeratorController@articleAdditional')->name('moderator.article.additional');

    });

    Route::get('/warning/{mobile?}',                 'Controller@redirectUser')->name('warning');

});
