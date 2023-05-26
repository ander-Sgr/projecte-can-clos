<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\FoodProduct;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'home');
});

Route::controller(CategoryController::class)->group(function(){
    Route::post('/', 'store');
    Route::put('/edit/{id}', 'edit');
    Route::delete('/delete/{id}', 'delete');
});


Route::controller(ClothesController::class)->group(function(){
  //  Route::get('/products/{id}', 'viewProductsClothes');
    Route::get('/productClotheData/{id}', 'getClotheData');
    Route::post('/createClothe', 'store');
    Route::put('/editProductClothe/{id}', 'edit');
    Route::delete('/deleteProductClothe/{id}', 'delete');
});

Route::controller(BookController::class)->group(function(){
    Route::get('/productBook/{id}', 'getBookData');
    Route::post('/createBook', 'store');
    Route::put('/editProductBook/{id}', 'edit');
    Route::delete('/deleteProductBook/{id}', 'delete');
});

Route::controller(FoodController::class)->group(function(){
    Route::get('/productFood/{id}', 'getDataFood');
    Route::post('/createFood', 'store');
    Route::put('/editProductFood/{id}', 'edit');
    Route::delete('/deleteProductFood/{id}', 'delete');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products/{id}','show');
    Route::get('/product/{id}', 'getProductData');
    Route::put('/editProduct/{id}', 'edit');
    Route::post('/createProduct', 'store');
    Route::delete('/deleteProduct/{id}', 'delete');
});