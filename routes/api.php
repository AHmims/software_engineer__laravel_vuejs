<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * Api endpoints for "product" route
 * 
 * * [GET '/'] => returns a list of products 
 * * [GET '/{productId}'] => returns a product that matches the provided id
 * * [GET 'category/{categoryId}'] => returns a list of products that belongs to the provided category
 * * [POST '/'] => insert a new product
 */

Route::prefix('/product')->group(function () {
    Route::get('/', 'ProductController@getAll');
    Route::get('/{productId}', 'ProductController@get');
    Route::get('category/{categoryId}', 'ProductController@getAllByCategory');
    Route::post('/', 'ProductController@insert');
});

/**
 * Api endpoints for "category" route
 * 
 * * [GET '/'] => returns a list of categories
 * TODO * [GET '/{categoryId}'] => returns a category that matches the provided id
 * TODO * [POST '/'] => insert a new category
 */

Route::prefix('/category')->group(function () {
    Route::get('/', 'CategoryController@getAll');
});

/**
 * Api endpoint for testing purposes
 * 
 */
Route::prefix('test')->group(function () {
    Route::get('/{product}', 'TestController@get');
    /*Route::get('/{id}', function (Product $product) {
        return $product;
    });*/
});
