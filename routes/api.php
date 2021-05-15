<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
 * * [GET '/'] => returns a list of products 
 * * [GET '/{productId}'] => returns a product that matches the provided id
 * * [GET 'category/{categoryId}'] => returns a list of products that belongs to the provided category
 * * [POST '/'] => insert a new product
 */

Route::prefix('/product')->group(function () {
    Route::get('/', [ProductController::class, 'getAll'])->middleware('product.listing');
    Route::get('/{productId}', [ProductController::class, 'get'])->middleware('product.lookup');
    Route::get('category/{categoryId}', [ProductController::class, 'getAllByCategory'])->middleware(['product.listing', 'product.filtering']);
    Route::post('/', [ProductController::class, 'insert'])->middleware('product.insertion');
});

/**
 * Api endpoints for "category" route
 * TODO * [GET '/'] => returns a list of categories
 * TODO * [GET '/{categoryId}'] => returns a category that matches the provided id
 * TODO * [POST '/'] => insert a new category
 */

Route::prefix('/category')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{categoryId}', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
});
