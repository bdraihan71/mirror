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
Route::get('home', 'ProfilesController@dashboard')->middleware('auth');
Route::post('/profile/name', 'ProfilesController@name')->middleware('auth');
Route::post('/profile/email', 'ProfilesController@email')->middleware('auth');
Route::post('/profile/address', 'ProfilesController@address')->middleware('auth');
Route::post('/profile/phone', 'ProfilesController@phone')->middleware('auth');
Route::post('/profile/password', 'ProfilesController@name')->middleware('auth');
Route::get('/profile/delete', 'ProfilesController@delete')->middleware('auth');
Route::get('/profile/delete/confirm', 'ProfilesController@destroy')->middleware('auth');

//CMS Routes
Route::get('/alter/index', 'CMSController@getIndex')->middleware('auth');
Route::post('/alter/index', 'CMSController@setIndex')->middleware('auth');
Route::get('/alter/footer', 'CMSController@getFooter')->middleware('auth');
Route::post('/alter/footer', 'CMSController@setFooter')->middleware('auth');


//Auth Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Home Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact-us', 'HomeController@contactUs');
Route::post('/contact-us', 'HomeController@contacted');

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
Route::get('/events', function() {
    return redirect('/events/upcoming');
});
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
Route::get('/cancel/purchase/{id}', 'AnswersController@cancel')->middleware('auth');

//SSL Commerz Test route
Route::post('/ipn_listener', 'TicketsController@purchase')->middleware('auth');

//Payment Routes
Route::get('/payment/session/{id}', 'PaymentsController@sessionId')->middleware('auth');

//Shop Routes
Route::get('/shop', 'ShopController@index');
Route::get('/shop/create', 'ShopController@create')->middleware('auth');
Route::post('/shop/create', 'ShopController@store')->middleware('auth');
Route::get('/shop/{id}', 'ShopController@show')->middleware('auth');
Route::get('/shop/buy/{id}', 'ShopController@buy')->middleware('auth');
Route::get('/shop/edit/{id}', 'ShopController@edit')->middleware('auth');
Route::post('/shop/edit/{id}', 'ShopController@update')->middleware('auth');
Route::post('/shop/delete/{id}', 'ShopController@delete')->middleware('auth');

//Partners Routes
Route::get('/partner/create', 'PartnersController@create')->middleware('auth');
Route::post('/partner/create', 'PartnersController@create')->middleware('auth');
Route::get('/partners', 'PartnersController@showAll');
Route::get('/partner/delete/{id}', 'PartnersController@delete')->middleware('auth');