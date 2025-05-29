<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Cart\CartController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
