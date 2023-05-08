<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('Panel/order' , [HomeController::class , 'user_panel_order'])->name('user.panel.order');
Route::get('Panel/favorite' , [HomeController::class , 'user_panel_favorite'])->name('user.panel.favorite');
Route::get('Panel/order/cancel-{order}' , [HomeController::class , 'user_panel_order_cancel'])->name('user.panel.order.cancel');
Route::get('Panel/order/sent' , [HomeController::class , 'user_panel_order_sent'])->name('user.panel.order.sent');
Route::get('Panel/order/canceled' , [HomeController::class , 'user_panel_order_canceled'])->name('user.panel.order.canceled');
Route::get('Panel/comments' , [HomeController::class , 'user_panel_comments'])->name('user.panel.comments');
