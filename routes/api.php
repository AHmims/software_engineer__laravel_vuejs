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


Route::prefix('/product')->group(function () {
    Route::get('/all', [ProductController::class, 'index']);
    Route::get('/all/category', [ProductController::class, 'index2']);
    Route::post('/add', [ProductController::class, 'store']);
});

Route::prefix('/category')->group(function () {
    Route::get('/all', [CategoryController::class, 'index']);
    Route::post('/add', [CategoryController::class, 'store']);
});
