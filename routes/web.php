<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Payment\PaymentController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/migrate', [CartController::class, 'migrate'])->name('cart.migrate');



Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [PaymentController::class, 'success'])->name('checkout.success');
Route::get('/checkout/error', [PaymentController::class, 'error'])->name('checkout.error');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
