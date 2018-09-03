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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('orders','api\OrdersController@store');
Route::post('login', 'api\APILoginController@login')->name('login.post');
Route::middleware('jwt.auth')->get('user', function(Request $request) {
    return auth()->user();
});
Route::group(['middleware' => 'jwt.auth'], function () {
Route::get('orders','api\OrdersController@index');
Route::get('order/item/{id}','api\OrdersController@getItems');
Route::post('order/pick','api\OrdersController@pickOrder');
Route::post('order/deliver','api\OrdersController@deliverOrder');
Route::post('order/fail','api\OrdersController@orderFail');
Route::get('orders/history','api\OrdersController@history');
Route::get('sourceAddress','api\OrdersController@showAddress');
});
