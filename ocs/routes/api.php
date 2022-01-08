<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SizesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::get('index', [ProductsController::class, 'index']);
Route::get('products/{id}', [ProductsController::class, 'getSingleProduct']);
Route::get('getImagesOfProduct/images-{productId}', [ProductsController::class, 'getImagesOfProduct']);
Route::get('getProductsByGender/{id}', [ProductsController::class, 'getProductsByGender']);
Route::get('genderAndCategory/{genderId}-{categoryId}', [ProductsController::class, 'getProductsByGenderCategory']);
Route::get('genderAndBrand/{genderId}-{brandId}', [ProductsController::class, 'getProductsByGenderBrand']);
Route::get('genderAndSize/{genderId}-{sizeId}', [ProductsController::class, 'getProductsByGenderSize']);
Route::get('most_recent', [ProductsController::class, 'getMostRecent']);
Route::get('showBrands', [BrandsController::class, 'show']);
Route::get('showCategories', [CategoriesController::class, 'show']);
Route::get('showSizes', [SizesController::class, 'show']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
