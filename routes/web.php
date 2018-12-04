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
Route::get('/create/admin', 'ProfilesController@adminCreate')->middleware('auth');
Route::post('/create/admin', 'ProfilesController@adminStore')->middleware('auth');
Route::get('/register', 'ProfilesController@register')->name('register');
Route::post('/register', 'ProfilesController@create');
Route::post('/social-register', 'ProfilesController@social');
Route::get('home', 'ProfilesController@dashboard')->middleware('auth');
Route::post('/profile/name', 'ProfilesController@name')->middleware('auth');
Route::post('/profile/email', 'ProfilesController@email')->middleware('auth');
Route::post('/profile/address', 'ProfilesController@address')->middleware('auth');
Route::post('/profile/phone', 'ProfilesController@phone')->middleware('auth');
Route::post('/profile/facebook', 'ProfilesController@facebook')->middleware('auth');
Route::post('/profile/password', 'ProfilesController@password')->middleware('auth');
Route::get('/profile/delete/{id}', 'ProfilesController@del')->middleware('auth');
Route::get('/profile/delete', 'ProfilesController@delete')->middleware('auth');
Route::get('/profile/delete/confirm', 'ProfilesController@destroy')->middleware('auth');
Route::get('/profile/show-all', 'ProfilesController@showAll')->middleware('auth');
Route::get('/user/verify/{token}', 'ProfilesController@verify');

//CMS Routes
Route::get('/alter/index', 'CMSController@getIndex')->middleware('auth');
Route::post('/alter/index', 'CMSController@setIndex')->middleware('auth');
Route::get('/alter/footer', 'CMSController@getFooter')->middleware('auth');
Route::post('/alter/footer', 'CMSController@setFooter')->middleware('auth');


//Auth Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/resend', 'VerifyEmailController@resend');
Route::post('/resend', 'VerifyEmailController@send');

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
    return redirect('/events/all');
});
Route::get('/events/{id}', 'EventsController@show');
Route::get('/event/delete/{id}', 'EventsController@destroy')->middleware('auth');
Route::get('/event/restore/{id}', 'EventsController@restore')->middleware('auth');

Route::get('/event/feature', 'EventsController@feature')->middleware('auth');
Route::post('/event/feature', 'EventsController@featured')->middleware('auth');

//Ticket Routes
Route::get('/ticket/type/{id}', 'TicketsController@typeSelect')->middleware('auth');
Route::get('/ticket/types/{id}', 'TicketsController@show')->middleware('auth');
Route::get('/ticket/buy/{id}', 'TicketsController@buy')->middleware('auth');
Route::post('/ticket/buy/{id}', 'TicketsController@purchase')->middleware('auth');
Route::post('/tickets/create', 'TicketsController@create')->middleware('auth');
Route::get('/tickets', 'TicketsController@showAll')->middleware('auth');
Route::get('/ticket/print/{id}', 'TicketsController@print')->middleware('auth');

//Event Question Answers Routes
Route::get('/question/answer/{id}', 'AnswersController@answer')->middleware('auth');
Route::post('/question/answer/{id}', 'AnswersController@store')->middleware('auth');
Route::get('/cancel/purchase/{id}', 'AnswersController@cancel')->middleware('auth');

//SSL Commerz Test route
Route::post('/ipn_listener', 'TicketsController@purchase')->middleware('auth');

//Payment Routes
Route::get('/payment/session/{id}', 'PaymentsController@sessionId')->middleware('auth');
Route::get('/delivery/{id}', 'PaymentsController@address')->middleware('auth');
Route::post('/delivery', 'PaymentsController@store')->middleware('auth');

//Shop Routes
Route::get('/shop', 'ShopController@index');
Route::get('/shop/create', 'ShopController@create')->middleware('auth');
Route::post('/shop/create', 'ShopController@store')->middleware('auth');
Route::get('/shop/{id}', 'ShopController@show')->middleware('auth');
Route::get('/shop/buy/{id}', 'ShopController@buy')->middleware('auth');
Route::get('/shop/edit/{id}', 'ShopController@edit')->middleware('auth');
Route::post('/shop/edit/{id}', 'ShopController@update')->middleware('auth');
Route::get('/shop/delete/{id}', 'ShopController@delete')->middleware('auth');
Route::get('/purchases', 'ShopController@showAll')->middleware('auth');

//Cart Routes
Route::post('/cart/add/{id}', 'CartsController@add')->middleware('auth');
Route::get('/cart', 'CartsController@index')->middleware('auth');
Route::get('/cart/remove/{id}', 'CartsController@remove')->middleware('auth');
Route::get('/checkout', 'CartsController@checkout')->middleware('auth');
Route::post('/checkout', 'CartsController@session')->middleware('auth');
Route::get('/cart/show-all', 'CartsController@invoice')->middleware('auth');
Route::get('/purchase/print/{id}', 'CartsController@print')->middleware('auth');

//Partners Routes
Route::get('/partner/create', 'PartnersController@create')->middleware('auth');
Route::post('/partner/create', 'PartnersController@store')->middleware('auth');
Route::get('/partner/edit/{id}', 'PartnersController@edit')->middleware('auth');
Route::post('/partner/edit/{id}', 'PartnersController@update')->middleware('auth');
Route::get('/partners', 'PartnersController@showAll');
Route::get('/partner/delete/{id}', 'PartnersController@delete')->middleware('auth');

//Test Route
Route::get('/page', function () {
    //dd(Milon\Barcode\Facades\DNS1DFacade::getBarcodeSVG("4445645656", "PHARMA2T"));
    return Milon\Barcode\Facades\DNS1DFacade::getBarcodeSVG("1234567890", "C128");
    return view('tickets/show');
});

Route::get('/test', function() {
    return view('media.show-album');
});

//Privacy Policy Route
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

//Analytics Routes
Route::get('/analytics/events', 'AnalyticsController@events')->middleware('auth');
Route::get('/analytics/events/{id}', 'AnalyticsController@event')->middleware('auth');
Route::get('/analytics/present/{id}', 'AnalyticsController@present')->middleware('auth');
Route::get('/analytics/present/issue/{id}', 'AnalyticsController@issuePresent')->middleware('auth');
Route::post('/present/barcode', 'AnalyticsController@barcodePresent')->middleware('auth');

//Media Routes
Route::get('/media', 'MediaController@index');
Route::get('/media/photo/add', 'MediaController@addPhoto')->middleware('auth');
Route::post('/media/photo/add', 'MediaController@storePhoto')->middleware('auth');
Route::get('/media/video/add', 'MediaController@addVideo')->middleware('auth');
Route::post('/media/video/add', 'MediaController@storeVideo')->middleware('auth');
Route::get('/media/showAll', 'MediaController@showAlbums');
Route::get('/media/photo/edit', 'MediaController@editAlbum')->middleware('auth');
Route::post('/media/photo/edit', 'MediaController@updateAlbum')->middleware('auth');
Route::get('/media/video/edit', 'MediaController@editVideo')->middleware('auth');
Route::post('/media/video/edit', 'MediaController@updateVideo')->middleware('auth');
Route::get('/media/photo/delete/{id}', 'MediaController@deletePhoto')->middleware('auth');
Route::get('/media/video/delete/{id}', 'MediaController@deleteVideo')->middleware('auth');

//Music Route
Route::get('/music/create', 'MusicController@create')->middleware('auth');
Route::post('/music/create', 'MusicController@store')->middleware('auth');
Route::get('/music', 'MusicController@index');
Route::get('/music/delete/{id}', 'MusicController@delete')->middleware('auth');

//Ticket Issue Routes
Route::get('/issue/create', 'TicketIssueController@create')->middleware('auth');
Route::post('/issue/create', 'TicketIssueController@store')->middleware('auth');
Route::get('/issue/update/{id}', 'TicketIssueController@edit')->middleware('auth');
Route::post('/issue/update/{id}', 'TicketIssueController@update')->middleware('auth');
Route::get('/issue/delete/{id}', 'TicketIssueController@delete')->middleware('auth');
Route::get('/issue/show/{id}', 'TicketIssueController@show');

//Export Routes
Route::get('/export/ticket', 'ExcelExportController@ticket')->middleware('auth');
Route::post('/export/ticket', 'ExcelExportController@exportTicket')->middleware('auth');

//ProfileInfoController Routes
Route::post('/profile/info', 'ProfileInfoController@store');

//Admin Verify Routes
Route::get('/verifyAdmins', 'VerifyAdminsController@verify');

//Effects Routes
Route::get('/remove/effect/gallery/{id}', 'EffectsController@galleryGlitch')->middleware('auth');

//Album Routes
Route::get('/albums/auto/create', 'AlbumController@createAlbums')->middleware('auth');
Route::get('/album/create', 'AlbumController@create')->middleware('auth');
Route::post('/album/create', 'AlbumController@store')->middleware('auth');
Route::get('/album/show/{id}', 'AlbumController@show');