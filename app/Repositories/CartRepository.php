<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;
use App\Models\Cart;
use App\Repositories\Interfaces\CartInterfaceRepository;


class CartRepository implements CartInterfaceRepository
{
    public function createCart($cart): Cart
    {
        dd($cart);
        return Cart::create($cart);
    }
}