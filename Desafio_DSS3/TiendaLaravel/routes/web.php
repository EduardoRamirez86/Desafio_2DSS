<?php
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/cart', [ShopController::class, 'cart'])->name('cart.index');
Route::post('/cart/add/{id}', [ShopController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [ShopController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout/process', [ShopController::class, 'processCheckout'])->name('checkout.process');