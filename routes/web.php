<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
    Route::get('/product/{id}', 'getProductData');
    Route::post('/createClothe', 'store');
    Route::put('/editProductClothe/{id}', 'edit');
    Route::delete('/deleteProductClothe/{id}', 'delete');
});

Route::controller(BookController::class)->group(function(){
    Route::post('/createBook', 'store');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/products/{id}','show');
});