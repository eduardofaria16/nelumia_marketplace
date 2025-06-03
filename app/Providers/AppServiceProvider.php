<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Cart\CartInterface;
use App\Services\Cart\CartService;
use App\Repositories\Interfaces\CartInterfaceRepository;
use App\Repositories\CartRepository;
use App\Interfaces\Payment\PaymentInterface;
use App\Services\Payment\PaymentService;
use App\Services\Payment\MercadoPagoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartInterface::class, CartService::class);
        $this->app->bind(CartInterfaceRepository::class, CartRepository::class);
        $this->app->bind(PaymentInterface::class, PaymentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
