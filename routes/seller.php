<?php


use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::group([] , function (){

    Route::get('dashboard' , [SellerController::class , 'seller_dashboard'])->name('seller.dashboard');

    Route::get('products' , [SellerController::class , 'seller_products'])->name('seller.products');
    Route::get('products/create' , [SellerController::class , 'seller_products_create'])->name('seller.products.create');
    Route::post('products/store' , [SellerController::class , 'seller_products_store'])->name('seller.products.store');
    Route::get('products/addVar-{product}' , [SellerController::class , 'seller_products_addVar'])->name('seller.products.addVar');
    Route::post('products/addVar/store-{product}' , [SellerController::class , 'seller_products_addVar_store'])->name('seller.products.addVar.store');

    Route::get('varieties' , [SellerController::class , 'seller_varieties'])->name('seller.varieties');
    Route::post('varieties/values' , [SellerController::class , 'seller_varieties_values'])->name('seller.varieties.values');
    Route::post('varieties/active' , [SellerController::class , 'seller_varieties_active'])->name('seller.varieties.active');



    Route::get('orders' , [SellerController::class , 'seller_orders'])->name('seller.orders');
    Route::post('/orders/update' , [SellerController::class , 'seller_orders_update'])->name('seller.orders.update');


    Route::post('request/category' , [SellerController::class , 'seller_request_category'])->name('seller.request.category');
    Route::post('request/brand' , [SellerController::class , 'seller_request_brand'])->name('seller.request.brand');
    Route::post('request/warranty' , [SellerController::class , 'seller_request_warranty'])->name('seller.request.warranty');
    Route::get('request/variety-{product}' , [SellerController::class , 'seller_request_variety'])->name('seller.request.variety');
    Route::post('request/variety/store' , [SellerController::class , 'seller_request_variety_store'])->name('seller.request.variety.store');
    Route::get('request/image-{product}' , [SellerController::class , 'seller_request_image'])->name('seller.request.image');
    Route::post('request/image/store-{product}' , [SellerController::class , 'seller_request_image_store'])->name('seller.request.image.store');

    Route::get('massages' , [SellerController::class , 'seller_massages'])->name('seller.massages');
    Route::post('massages/seen' , [SellerController::class , 'seller_massages_seen'])->name('seller.massages.seen');

});
