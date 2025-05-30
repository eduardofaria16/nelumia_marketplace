<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Cart\CartController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
