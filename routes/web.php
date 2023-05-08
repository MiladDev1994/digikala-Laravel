<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('products')->group(function (){

    Route::get('category-{category?}' , [HomeController::class , 'product_category_index'])->name('product.category.index');
    Route::get('category-{category?}/brand-{brand?}' , [HomeController::class , 'product_category_brand_index'])->name('product.category.brand.index');


    Route::get('brands-{brand?}' , [HomeController::class , 'product_brands_index'])->name('product.brands.index');
    Route::get('brands-{brand?}/category-{category?}' , [HomeController::class , 'product_brands_category_index'])->name('product.brands.category.index');


    Route::get('moreSell' , [HomeController::class , 'product_moreSell_index'])->name('product.moreSell.index');
    Route::get('moreSell/category-{category?}' , [HomeController::class , 'product_moreSell_category_index'])->name('product.moreSell.category.index');
    Route::get('moreSell/brand-{brand?}' , [HomeController::class , 'product_moreSell_brand_index'])->name('product.moreSell.brand.index');
    Route::get('moreSell/category-{category?}/brand-{brand?}' , [HomeController::class , 'product_moreSell_categorybrand_index'])->name('product.moreSell.categorybrand.index');


    Route::get('special' , [HomeController::class , 'product_special_index'])->name('product.special.index');
    Route::get('special/category-{category?}' , [HomeController::class , 'product_special_category_index'])->name('product.special.category.index');
    Route::get('special/brand-{brand?}' , [HomeController::class , 'product_special_brand_index'])->name('product.special.brand.index');
    Route::get('special/category-{category?}/brand-{brand?}' , [HomeController::class , 'product_special_categorybrand_index'])->name('product.special.categorybrand.index');


    Route::get('dkp-{product}' , [HomeController::class , 'productView'])->name('productView');


    Route::post('comment-{product}/user-{user}' , [CommentController::class , 'store'])->name('products.comment.store');


    Route::post('favorite/insert' , [FavoriteController::class , 'favorite_insert'])->name('favorite.insert');
    Route::post('favorite/destroy' , [FavoriteController::class , 'favorite_destroy'])->name('favorite.destroy');

});


Route::prefix('article')->group(function (){
    Route::get('/num-{article}' , [HomeController::class , 'article_index'])->name('article.index');
});







