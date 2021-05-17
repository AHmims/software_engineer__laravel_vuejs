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

/**
 * Api endpoints for "product" route 
 * 
 * * [GET '/'] => returns a list of products 
 * * [GET '/{product}'] => returns a product that matches the provided id
 * ? TODO * [GET 'category/{categoryId}'] => returns a list of products that belongs to the provided category
 * TODO * [POST '/'] => insert a new product
 */

Route::prefix('/product')->group(function () {
    Route::get('/', [ProductController::class, 'getAll']);
    Route::get('/{product}', [ProductController::class, 'get'])->missing(function (Request $request) {
        return response([
            'message' => 'hmmmm'
        ], 404);
    });
    // Route::get('category/{categoryId}', [ProductController::class, 'getAllByCategory']);
    Route::post('/', [ProductController::class, 'insert']);
});

/**
 * Api endpoints for "category" route
 * 
 * TODO * [GET '/'] => returns a list of categories
 * TODO * [GET '/{categoryId}'] => returns a category that matches the provided id
 * TODO * [POST '/'] => insert a new category
 */

Route::prefix('/category')->group(function () {
    Route::get('/', [CategoryController::class, 'getAll']);
});

/**
 * Api endpoint for testing purposes
 * 
 */

Route::prefix('test')->group(function () {
    Route::get('/{product}', [TestController::class, 'get']);
    Route::get('/category/{category}', [TestController::class, 'get2'])->missing(function (Request $request) {
        return response([
            'message' => 'hmmmm'
        ], 404);
    });
});
