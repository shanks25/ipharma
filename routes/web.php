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



  Route::get('/test', 'PageController@index')->name('newdesign');
  Route::group([], function() {

    Route::get('invoice/{id}', 'PageController@mail_body');


    Route::get('/', 'PageController@olddesign')->name('home');
    Route::get('pdf', 'PageController@pdf') ;
    Route::get('export', 'PageController@export') ;
    Route::get('category/{slug}', 'PageController@category');
    Route::get('test/category/{slug}', 'PageController@newcategory');
    Route::get('product/{slug}', 'PageController@product');
        Route::get('test/product/{slug}', 'PageController@newproductdesign');
    Route::get('products', 'PageController@search_products');
    Route::post('add-reviews', 'PageController@add_reviews');
    Route::post('add-comment', 'PageController@add_comment');
    Route::post('check-stock', 'PageController@check_stock');
    Route::post('add-to-cart', 'PageController@addToCart');
    Route::post('add-to-wishlist', 'PageController@addToWishlist');
    Route::post('remove-from-wishlist', 'PageController@removeFromWishlist');
    Route::post('remove-cart-item', 'PageController@removeCartItem');
    Route::post('update-cart-item', 'PageController@updateCartItem');
    Route::get('destroy-cart', 'PageController@destroyCart');
    Route::get('cart', 'PageController@cart');
    Route::get('check-shipping', 'PageController@check_shipping');
    Route::get('checkout', 'PageController@checkout')->name('checkout');
    Route::post('checkout', 'PageController@saveCheckout');
    Route::get('quick-view/{id}', 'PageController@quickView');
    Route::get('order-info/{id}', 'PageController@order_info');

    Route::get('product-inquiry', 'PageController@product_inquiry');
    Route::post('store-product-request', 'PageController@store_product_request');
    Route::get('prescription-upload', 'PageController@prescription_upload');
    Route::post('store-prescription', 'PageController@store_prescription');

    Route::get('user-login', 'PageController@user_login')->name('user-login');
        Route::get('test/user-login', 'PageController@newuser_login');
    Route::post('post-login', 'PageController@post_login');
    Route::get('login', 'PageController@login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('registration', 'PageController@registration');
    Route::get('test/registration', 'PageController@newregistration');
    Route::post('registration', 'Auth\RegisterController@create');
    Route::get('check-pin', 'PageController@check_pin');
    Route::post('varify-pin', 'PageController@varify_pin');
    Route::get('send-varification-pin', 'PageController@send_varification_pin');
    Route::get('refill-request', 'PageController@refill_request');
    Route::post('ajax-refill-data', 'PageController@ajax_refill_data');
    Route::post('update-user', 'PageController@update_user');

    Route::post('get-shipping-value', 'PageController@get_shipping_value');
    Route::post('get-area-shipping-value', 'PageController@get_area_shipping_value');

    Route::get('product-search', 'PageController@product_search');

    Route::post('ajax-products', 'PageController@ajaxProduct');

    Route::get('ajax-search', 'PageController@ajax_search');

    Route::post('applycoupon','CouponController@store')->name('applycoupon.store');
    Route::post('deliverytype','CouponController@deliverytype')->name('applycharges');
    Route::delete('applycoupon','CouponController@destroy')->name('applycoupon.destroy');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('customer/account/index', 'PageController@user_index');
        Route::get('customer/account/edit', 'PageController@user_edit');
        Route::get('customer/address/new', 'PageController@useraddresslist');
        Route::get('customer/address/latest', 'PageController@addnewuseraddress')->name('addnewuseraddress');
        Route::post('customer/address/latest', 'PageController@savenewaddress');
        Route::get('editaddress/{id}', 'PageController@editaddress')->name('editaddress');
        Route::get('setdefault/{id}', 'PageController@setdefault')->name('setdefault');
        Route::post('add-address/{id}', 'PageController@storeediteduseraddress')->name('updateaddress');
        Route::get('sales/order/history', 'PageController@user_order_history');
        Route::get('review/customer', 'PageController@review_customer');
        Route::get('wishlist', 'PageController@wishlist');
        Route::get('newsletter/manage', 'PageController@newsletter_manage');
    });

    Route::get('how-to-order', 'PageController@how_to_order');
    Route::get('test/how-to-order', 'PageController@newhow_to_order');
    Route::get('partners', 'PageController@partners');
        Route::get('test/partners', 'PageController@newpartners');
    Route::get('about-us', 'PageController@about_us');
    Route::get('/test/about-us', 'PageController@newabout_us');
    Route::get('contact-us', 'PageController@contact_us');
     Route::get('test/contact-us', 'PageController@newcontact_us');
    Route::get('customer-service', 'PageController@customer_service');
    Route::get('shipping-handling', 'PageController@shipping_handling');
    Route::get('returns-exchange', 'PageController@returns_exchange');
    Route::get('policy', 'PageController@privacy_policy');
    Route::get('test/policy', 'PageController@newprivacy_policy');
    Route::get('news', 'PageController@news');
       Route::get('test/news', 'PageController@newnews');
    Route::get('terms-conditions', 'PageController@terms_conditions');
    Route::post('call-me', 'PageController@call_me');
    Route::post('success', 'PageController@success');
    Route::post('fail', 'PageController@fail');
    Route::post('cancel', 'PageController@cancel');
});


Auth::routes();


Route::get('pharmacy/login', 'pharmacyauth\LoginController@showLoginForm')->name('pharmacylogin');
Route::post('pharmacy/login', 'pharmacyauth\LoginController@login');

Route::get('adminoperator/login', 'adminoperator\LoginController@showLoginForm')->name('adminoperatorlogin');
Route::post('adminoperator/login', 'adminoperator\LoginController@login');
Route::get('adminoperator/dashboard', 'adminoperatorcontroller@dashboard');
Route::get('adminoperator/adduser', 'adminoperatorcontroller@index')->name('adduser');
Route::post('adminoperator/adduser', 'adminoperatorcontroller@store');


Route::get('pharmacy/dashboard', function(){

    return view('pharmacy.dashboard');

})->middleware('auth:pharmacy');





Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {


    Route::get('/', 'HomeController@index');
    Route::resource('tag','tagcontroller');
    Route::resource('adminoperator','operatorcontroller');
    Route::get('/home', 'HomeController@index');
    Route::get('todaysOrder-datatable', 'HomeController@todayOrderDatatable');
    Route::get('todaysOrder-datatable', 'HomeController@todayOrderDatatable');
    Route::get('callme-datatable', 'HomeController@callmeDatatable');
    Route::post('edit-call-status', 'HomeController@editCallStatus');

    Route::get('category-datatable', 'CategoryController@dataTable');
    Route::resource('category', 'CategoryController');

    Route::get('product-datatable', 'ProductController@dataTable');
    Route::get('product-list', 'ProductController@productList');
    Route::post('product/attributes', 'ProductController@attributes');
    Route::get('product/{id}/config', 'ProductController@productConfig');
    Route::resource('product', 'ProductController');
    Route::resource('pharmacy', 'pharmacycontroller');
    Route::resource('deliverytype', 'deliverytypecontroller');
    Route::resource('doctor', 'doctorController');
    Route::resource('deliveryman', 'DeliverymanController');
    Route::resource('promocodes', 'PromocodeController');
    Route::get('attributes', 'ProductController@allAttributes');

    Route::get('get-image/{id}', 'MediaController@getImage');
    Route::get('media-datatable', 'MediaController@dataTable');
    Route::resource('media', 'MediaController');

    Route::post('payment-status/{id}', 'OrderController@payment_status');
    Route::get('order-datatable', 'OrderController@dataTable');
    Route::get('invoice/{id}', 'OrderController@invoice');
    Route::resource('order', 'OrderController');

    Route::get('user-datatable', 'UserController@dataTable');
    Route::resource('user', 'UserController');

    Route::get('dhaka-shipping', 'ShippingController@dhaka_shipping');
    Route::get('edit-dhaka-shipping/{id}', 'ShippingController@edit_dhaka_shipping');
    Route::post('update-dhaka-shipping', 'ShippingController@update_dhaka_shipping');
    Route::get('dhaka-shipping-datatable', 'ShippingController@dhaka_shipping_datatable');
    Route::get('shipping-datatable', 'ShippingController@dataTable');
    Route::resource('shipping', 'ShippingController');

    Route::get('review-list', 'ReviewController@index');
    Route::get('review-datatable', 'ReviewController@dataTable');
    Route::post('update-review', 'ReviewController@update');
    Route::get('delete-review/{id}', 'ReviewController@destroy');

    Route::get('settings/frontpage', 'SettingsController@frontpage');
    Route::post('settings', 'SettingsController@saveSettings');


    Route::resource('menu', 'MenuController');

    Route::get('brand-list', 'AttributeController@brand_list');
    Route::get('brand-datatable', 'AttributeController@brand_datatable');
    Route::post('add-attr-option', 'AttributeController@add_attr_option');
    Route::post('edit-attr-option', 'AttributeController@edit_attr_option');
    Route::post('edit-brand-attr-option', 'AttributeController@edit_brand_attr_option');
    Route::get('delete-option/{id}', 'AttributeController@delete_option');
    Route::post('attribute-options-datatable', 'AttributeController@options_datatable');
    Route::get('attribute-datatable', 'AttributeController@dataTable');
    Route::resource('attribute', 'AttributeController');
    Route::resource('deliverysurvey', 'DeliverysurveyController');
    Route::resource('ambulance', 'AmbulanceController');
    Route::resource('hospital', 'HospitalController');

    Route::get('inquiry', 'OthersController@index');
    Route::get('inquiry-datatable', 'OthersController@datatable');
    Route::get('inquiry-delete/{id}', 'OthersController@inquiry_delete');

    Route::get('prescription', 'OthersController@prescription');


    Route::get('prescription-datatable', 'OthersController@prescription_datatable');
    Route::get('prescription-delete/{id}', 'OthersController@prescription_delete');
});

