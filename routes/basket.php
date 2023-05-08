<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::group([] , function () {
    Route::post('store', [HomeController::class, 'basket_store'])->name('basket.store');
    Route::get('index', [HomeController::class, 'basket_index'])->name('basket.index');
    Route::post('destroy', [HomeController::class, 'basket_destroy'])->name('basket.destroy');
    Route::get('destroyAll', [HomeController::class, 'basket_destroyAll'])->name('basket.destroyAll');
    Route::get('shipping', [HomeController::class, 'basket_shipping'])->name('basket.shipping');

    Route::post('complete', [HomeController::class, 'basket_complete'])->name('basket.complete');
});
