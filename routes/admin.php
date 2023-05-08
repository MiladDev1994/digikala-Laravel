<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NumController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VarietyController;
use App\Http\Controllers\VolumeController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\WeightController;
use Illuminate\Support\Facades\Route;

Route::group([] , function (){
    Route::get('/dashboard' , [AdminController::class , 'admin_dashboard'])->name('admin.dashboard');
    Route::get('/home/banner' , [AdminController::class , 'admin_home_banner'])->name('admin.home.banner');
    Route::post('/home/banner/headUpdate' , [AdminController::class , 'admin_home_banner_headUpdate'])->name('admin.home.banner.headUpdate');
    Route::post('/home/banner/specialCategoryUpdate' , [AdminController::class , 'admin_home_banner_specialCategoryUpdate'])->name('admin.home.banner.specialCategoryUpdate');
    Route::post('/home/banner/Category4PicUpdate' , [AdminController::class , 'admin_home_banner_Category4PicUpdate'])->name('admin.home.banner.Category4PicUpdate');
    Route::post('/home/banner/Category2PicUpdate' , [AdminController::class , 'admin_home_banner_Category2PicUpdate'])->name('admin.home.banner.Category2PicUpdate');
    Route::post('/home/banner/Category1PicUpdate' , [AdminController::class , 'admin_home_banner_Category1PicUpdate'])->name('admin.home.banner.Category1PicUpdate');
    Route::post('/home/banner/articleUpdate' , [AdminController::class , 'admin_home_banner_articleUpdate'])->name('admin.home.banner.articleUpdate');

    Route::get('/home/slider' , [SliderController::class , 'admin_home_slider'])->name('admin.home.slider');
    Route::post('/home/slider/create' , [SliderController::class , 'admin_home_slider_create'])->name('admin.home.slider.create');
    Route::get('/home/slider/destroy-{slider}' , [SliderController::class , 'admin_home_slider_destroy'])->name('admin.home.slider.destroy');

    Route::get('/home/articles' , [ArticleController::class , 'admin_home_articles'])->name('admin.home.articles');
    Route::post('/home/articles/create' , [ArticleController::class , 'admin_home_articles_create'])->name('admin.home.articles.create');
    Route::get('/home/articles/destroy-{article}' , [ArticleController::class , 'admin_home_articles_destroy'])->name('admin.home.articles.destroy');


    Route::get('products' , [ProductController::class , 'admin_products'])->name('admin.products');
    Route::post('products/update' , [ProductController::class , 'admin_products_update'])->name('admin.products.update');
    Route::get('products/create' , [ProductController::class , 'admin_products_create'])->name('admin.products.create');
    Route::post('products/store' , [ProductController::class , 'admin_products_store'])->name('admin.products.store');
    Route::get('products/addPic-{product}' , [ProductController::class , 'admin_products_addPic'])->name('admin.products.addPic');
    Route::post('products/addPic/store-{product}' , [ProductController::class , 'admin_products_addPic_store'])->name('admin.products.addPic.store');
    Route::get('products/addVar-{product}' , [ProductController::class , 'admin_products_addVar'])->name('admin.products.addVar');
    Route::post('products/addVar/store-{product}' , [ProductController::class , 'admin_products_addVar_store'])->name('admin.products.addVar.store');


    Route::get('varieties' , [ProductController::class , 'admin_varieties'])->name('admin.varieties');
    Route::post('varieties/access' , [ProductController::class , 'admin_varieties_access'])->name('admin.varieties.access');
    Route::post('varieties/values' , [ProductController::class , 'admin_varieties_values'])->name('admin.varieties.values');
    Route::post('varieties/active' , [ProductController::class , 'admin_varieties_active'])->name('admin.varieties.active');
    Route::post('varieties/MSell' , [ProductController::class , 'admin_varieties_MSell'])->name('admin.varieties.MSell');
    Route::post('varieties/special' , [ProductController::class , 'admin_varieties_special'])->name('admin.varieties.special');


    Route::get('/categories' , [CategoryController::class , 'admin_categories'])->name('admin.categories');
    Route::get('/categories/create-{category}' , [CategoryController::class , 'categories_create'])->name('categories.create');
    Route::post('/categories/store' , [CategoryController::class , 'categories_store'])->name('categories.store');
    Route::get('/categories/createHead' , [CategoryController::class , 'categories_createHead'])->name('categories.createHead');
    Route::post('/categories/storeHead' , [CategoryController::class , 'categories_storeHead'])->name('categories.storeHead');
    Route::post('/categories/special' , [CategoryController::class , 'categories_special'])->name('categories.special');


    Route::get('/orders' , [OrderController::class , 'admin_orders'])->name('admin.orders');
    Route::post('/orders/update' , [OrderController::class , 'admin_orders_update'])->name('admin.orders.update');


    Route::get('/users' , [AdminController::class , 'admin_users'])->name('admin.users');
    Route::post('/users/roleUpdate' , [AdminController::class , 'admin_users_roleUpdate'])->name('admin.users.roleUpdate');
    Route::post('/users/sellerUpdate' , [AdminController::class , 'admin_users_sellerUpdate'])->name('admin.users.sellerUpdate');


    Route::get('/variations/color' , [ColorController::class , 'admin_variations_color'])->name('admin.variations.color');
    Route::post('/variations/color/store' , [ColorController::class , 'admin_variations_color_store'])->name('admin.variations.color.store');

    Route::get('/variations/size' , [SizeController::class , 'admin_variations_size'])->name('admin.variations.size');
    Route::post('/variations/size/store' , [SizeController::class , 'admin_variations_size_store'])->name('admin.variations.size.store');

    Route::get('/variations/volume' , [VolumeController::class , 'admin_variations_volume'])->name('admin.variations.volume');
    Route::post('/variations/volume/store' , [VolumeController::class , 'admin_variations_volume_store'])->name('admin.variations.volume.store');

    Route::get('/variations/weight' , [WeightController::class , 'admin_variations_weight'])->name('admin.variations.weight');
    Route::post('/variations/weight/store' , [WeightController::class , 'admin_variations_weight_store'])->name('admin.variations.weight.store');

    Route::get('/variations/num' , [NumController::class , 'admin_variations_num'])->name('admin.variations.num');
    Route::post('/variations/num/store' , [NumController::class , 'admin_variations_num_store'])->name('admin.variations.num.store');


    Route::get('brands' , [BrandController::class , 'admin_brands'])->name('admin.brands');
    Route::post('brands/store' , [BrandController::class , 'admin_brands_store'])->name('admin.brands.store');
    Route::post('brands/update' , [BrandController::class , 'admin_brands_update'])->name('admin.brands.update');




    Route::get('warranties' , [WarrantyController::class , 'admin_warranties'])->name('admin.warranties');
    Route::post('warranties/store' , [WarrantyController::class , 'admin_warranties_store'])->name('admin.warranties.store');


    Route::get('comments' , [AdminController::class , 'admin_comments'])->name('admin.comments');
    Route::post('comments/active' , [AdminController::class , 'admin_comments_active'])->name('admin.comments.active');
    Route::post('comments/update' , [AdminController::class , 'admin_comments_update'])->name('admin.comments.update');
    Route::post('comments/destroy' , [AdminController::class , 'admin_comments_destroy'])->name('admin.comments.destroy');


    Route::get('requests' , [AdminController::class , 'admin_requests'])->name('admin.requests');
    Route::get('requests/destroy-{sellerRequest}' , [AdminController::class , 'admin_requests_destroy'])->name('admin.requests.destroy');

    Route::post('massage' , [AdminController::class , 'admin_massage'])->name('admin.massage');

});
