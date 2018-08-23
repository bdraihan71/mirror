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

// Route::post('/payment/{status}/{id}/{user}/{type}', function (Request $request, $status, $id, $user, $type) {
//     dd('here');
// });
Route::get('/payment/{status}/{id}/{user}/{type}', function (Request $request, $status, $id, $user, $type) {
    dd('hi');
});

Route::post('/payment/{status}/{id}/{user}/{type}', 'PaymentsController@status');
Route::post('/payment/{status}/{id}/{user}', 'ShopController@status');
// Route::get('/payment/{status}/{id}/{user}/{type}', 'PaymentsController@status');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

