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

Route::group(['prefix' => 'api/v1/'], function () {
	Route::get('/', function () {
        return json_encode(["message" => "Welcome to inventory API"]);
    });

    Route::post('users', [
    	"uses" => "UserController@postUser"
    ]);

	Route::post('categories', [
    	"uses" => "ProductController@postCategory"
    ]);

    Route::post('products', [
    	"uses" => "ProductController@postProduct"
    ]);

    Route::get('categories', [
    	"uses" => "ProductController@getAllcategories"
    ]);

    Route::get('category/{id}', [
        'uses' => 'ProductController@getCategoryById',
    ]);

    Route::get('product/{id}', [
        'uses' => 'ProductController@getProductById',
    ]);

    Route::get('products', [
    	"uses" => "ProductController@getAllProducts"
    ]);
});
