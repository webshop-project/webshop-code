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
<<<<<<< HEAD
Route::post('/vouchers/add', 'VoucherController@store');

=======
Route::post('/vouchers/add', 'MailController@store');
Route::get('/admin/lowStockList','DashboardController@lowStockList');
>>>>>>> master

Route::get('/admin/vouchers/add', 'VoucherController@create');
Route::get('/admin/vouchers/view', 'VoucherController@index');

Route::resource('/warehouse', 'WarehouseController');
route::resource('/orders', 'OrderController');
route::resource('/admin', 'DashboardController');
route::resource('/categorie' , 'CategorieController');
route::resource('/img', 'ImageController');
route::resource('/user', 'UserController');
route::resource('/house', 'HouseController');
