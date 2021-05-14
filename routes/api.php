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
 * TODO * [GET '/{id}'] => returns a product that matches the provided id
 * * [GET 'category/{category}'] => returns a list of products that belongs to the provided category
 * * [POST '/'] => insert a new product
 */

Route::prefix('/product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class], 'index');
    Route::get('category/{category}', [ProductController::class, 'index2']);
    Route::post('/', [ProductController::class, 'store']);
});

/**
 * Api endpoints for "category" route
 * * [GET '/'] => returns a list of categories
 * TODO * [GET '/{id}'] => returns a category that matches the provided id
 * * [POST '/'] => insert a new category
 */

Route::prefix('/category')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
});
