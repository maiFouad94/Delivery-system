<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'OrdersController@index')->name('dashboard');
Route::get('orders',[
     'as' => 'order.index',
     'uses' => 'OrdersController@index']);
Route::get('orders/{order_id}', 'Auth\User\UserController@assignOrderToUser');
Route::get('orders/{order_id}/assign/{user_id}','OrdersController@assignTo');
Route::get('archive/assigned','OrdersController@assignedOrders');
Route::get('archive/picked','OrdersController@pickedOrders');
Route::get('archive/delivered','OrdersController@deliveredOrders');
Route::get('archive/failed','OrdersController@failedOrders');
Route::get('location','OrdersController@showLocation');
Route::post('location/edit','OrdersController@editLocation');
Route::get('order/new','OrdersController@newOrder');
Route::post('order/create','OrdersController@createOrder');
Route::get('orders/{id}/show','OrdersController@showOrder');
Route::get('order/{order_id}/item/new','OrdersController@newItem');
Route::post('order/{order_id}/item/create','OrdersController@createItem');
Route::get('order/{order_id}/item/{item_id}','OrdersController@deleteItem');

/*