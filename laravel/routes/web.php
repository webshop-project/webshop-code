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
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::delete('emptyCart', 'CartController@emptyCart');
Route::get('/order/finish/{id}', 'OrderController@finish');

Route::get('/admin/vouchers/add', 'VoucherController@create');
Route::post('admin/vouchers/add', 'VoucherController@store');

Route::resource('/shop/cart', 'CartController');
Route::resource('/products', 'WarehouseController');
route::resource('/orders', 'OrderController');
route::resource('/admin', 'DashboardController');
route::resource('/categorie' , 'CategorieController');
route::resource('/img', 'ImageController');
route::resource('/user', 'UserController');
route::resource('/house', 'HouseController');



Route::prefix('shop')->group(function() {
    Route::get('/', 'ShopController@index')->name('shop');
    Route::get('/{item}', 'PagesController@item')->name('detail');

    Route::get('/cat/{cat}', 'ShopController@category')->name('cat');
});

Route::prefix('admin')->group(function(){

    Route::prefix('product')->group(function(){
        Route::get('lowStockList','DashboardController@lowStockList')->name('lowStockList');
    });
});


