<?php

use App\Exceptions\PrepareExceptionResponse;
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

/**
 * Api endpoints for "product" route 
 * 
 * * [GET '/'] => returns a list of products 
 * * [GET '/{product}'] => returns a product that matches the provided id
 * * [POST '/'] => insert a new product
 */

Route::prefix('/product')->group(function () {
    Route::get('/', [ProductController::class, 'getAll']);
    Route::get('/{product}', [ProductController::class, 'get'])->missing(function () {
        return PrepareExceptionResponse::getNoModuleError();
    });
    Route::post('/', [ProductController::class, 'insert']);
});

/**
 * Api endpoints for "category" route
 * 
 * * [GET '/'] => returns a list of categories
 * * [GET '/{categoryId}'] => returns a list of products by category id
 * * [POST '/'] => insert a new category
 */

Route::prefix('/category')->group(function () {
    Route::get('/', [CategoryController::class, 'getAll']);
    Route::get('/{category}', [CategoryController::class, 'getProductsByCategory'])->missing(function () {
        return PrepareExceptionResponse::getNoModuleError();
    });
    Route::post('/', [CategoryController::class, 'insert']);
});
