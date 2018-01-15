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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::resource('/shop/cart', 'CartController');
Route::delete('emptyCart', 'CartController@emptyCart');
Route::get('/shop/{item}', 'PagesController@item')->name('detail');
Route::get('/order/finish/{id}', 'OrderController@finish');

Route::get('/admin/lowStockList','DashboardController@lowStockList')->name('lowStockList');

route::resource('/products', 'WarehouseController');
route::resource('/orders', 'OrderController');
route::resource('/admin', 'DashboardController');
route::resource('/categorie' , 'CategorieController');
route::resource('/img', 'ImageController');
route::resource('/user', 'UserController');
route::resource('/house', 'HouseController');
route::get('/login', function()
{
   return redirect('http://yoursite/amoclient/redirect');
});



Route::get('/admin/vouchers/add', 'VoucherController@create');
Route::post('/admin/vouchers/add', 'VoucherController@store');
Route::post('/checkVoucher','VoucherController@check');
Route::get('/admin/vouchers/voucherUsed', 'VoucherController@index');

Route::get('paypal/ec-checkout', 'PayPalController@getExpressCheckout');
Route::get('paypal/ec-checkout-success', 'PayPalController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'PayPalController@getAdaptivePay');
Route::post('paypal/notify', 'PayPalController@notify');