<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featured = \App\Models\Product::where('is_available', true)
        ->where('is_featured', true)
        ->orderBy('sort_order')
        ->get();
    return view('welcome', compact('featured'));
});

Route::prefix('tienda')->name('shop.')->group(function () {
    Route::get('/',                             [ShopController::class, 'index'])->name('index');
    Route::post('/carrito/{product}',           [ShopController::class, 'addToCart'])->name('cart.add');
    Route::get('/carrito',                      [ShopController::class, 'cart'])->name('cart');
    Route::post('/carrito/actualizar',          [ShopController::class, 'updateCart'])->name('cart.update');
    Route::get('/carrito/eliminar/{productId}', [ShopController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/pedido',                       [ShopController::class, 'checkout'])->name('checkout');
    Route::post('/pedido',                      [ShopController::class, 'placeOrder'])->name('order.place');
    Route::get('/gracias/{order}',              [ShopController::class, 'success'])->name('success');
});
