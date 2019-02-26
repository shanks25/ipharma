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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('product-list', 'TelenorApiController@product_list');
Route::post('telenor-checkout', 'TelenorApiController@telenor_checkout');
Route::get('district-list', 'TelenorApiController@district_list');
Route::post('area-list', 'TelenorApiController@area_list');
Route::post('order-status', 'TelenorApiController@order_status');
Route::post('cancel-order', 'TelenorApiController@cancel_order');
Route::get('order-list', 'TelenorApiController@order_list');
Route::get('settings', 'TelenorApiController@settings');
Route::get('send-mail', 'TelenorApiController@sendMail');



Route::post('user/login','UserapiController@login');
Route::post('user/register','UserapiController@register');
Route::get('contacts/ambulance','UserdataController@ambulance');
Route::get('contacts/hospital','UserdataController@hospital');
Route::post('add_shipping/','UserdataController@address');
Route::post('feedback','UserdataController@feedback');
Route::post('comment','UserdataController@comment');
Route::post('coupon','UserdataController@coupon');
Route::get('product/home','UserdataController@producthome');
Route::post('products','UserdataController@product');
Route::post('order/','UserdataController@order');
Route::post('order/history','UserdataController@orderhistory');
Route::post('profile_update/','UserdataController@profile_update');
Route::post('user_details','UserdataController@user_details');
Route::post('contacts/health-checkup','UserdataController@health_checkup');
Route::post('save_prescription','UserdataController@save_prescription');
Route::get('categories','UserdataController@categories');
Route::post('shipping_list','UserdataController@shipping_list');
Route::post('product', 'UserdataController@categorywiseproduct');
Route::post('coupon', 'UserdataController@checkcoupon');