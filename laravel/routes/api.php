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

Route::get('/sales/{id}', function($id){

    $showProduct = \App\warehouse::where('product_id','=', $id)->get();

    $array = [];

    foreach($showProduct as $warehouse)
    {
        array_push($array, $warehouse->showStats());
    }

    return $array;
});