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

//Profile Routes
Route::get('register', 'ProfilesController@register')->name('register');
Route::post('register', 'ProfilesController@create');
Route::post('social-register', 'ProfilesController@social');

//Auth Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/loggedin', function(){
    return auth()->user();
});

//Socialite Routes
Route::get('/redirect/facebook', 'SocialAuthFacebookController@redirect');
Route::get('/callback/facebook', 'SocialAuthFacebookController@callback');
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

//Events Routes
Route::get('/events/create', 'EventsController@create')->middleware('auth');
Route::post('/events/create', 'EventsController@store')->middleware('auth');
Route::post('/add-info', 'EventsController@addInfo')->middleware('auth');
Route::get('/add-q/{id}', 'EventsController@addQ')->middleware('auth');
Route::post('/add-q', 'EventsController@storeQ')->middleware('auth');
Route::get('/events/edit/{id}', 'EventsController@edit')->middleware('auth');
Route::get('/delete/add-info/{id}', 'EventsController@addInfoD')->middleware('auth');
Route::get('/delete/question/{id}', 'EventsController@questionD')->middleware('auth');
Route::post('/events/event/{id}', 'EventsController@eStore')->middleware('auth');
Route::post('/events/add/{id}', 'EventsController@addStore')->middleware('auth');
Route::post('/events/q/{id}', 'EventsController@qStore')->middleware('auth');

Route::get('/events/{id}', 'EventsController@show');

//Ticket Routes
Route::get('/ticket/type/{id}', 'TicketsController@typeSelect')->middleware('auth');
Route::get('/ticket/types/{id}', 'TicketsController@show')->middleware('auth');
Route::get('/ticket/buy/{id}', 'TicketsController@buy')->middleware('auth');
Route::post('/ticket/buy/{id}', 'TicketsController@purchase')->middleware('auth');
Route::post('/tickets/create', 'TicketsController@create')->middleware('auth');

//Event Question Answers Routes
Route::get('/question/answer/{id}', 'AnswersController@answer')->middleware('auth');
Route::post('/question/answer/{id}', 'AnswersController@store')->middleware('auth');

//SSL Commerz Test route
Route::post('/ipn_listener', 'TicketsController@purchase')->middleware('auth');