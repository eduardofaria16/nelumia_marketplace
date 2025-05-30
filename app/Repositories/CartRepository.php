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

    public function updateCart($request, $id)
    {
        dd($request, $id);
        return Cart::where('id', $id)->update($request);
    }

    public function deleteCart($id)
    {
        dd($id);
        return Cart::where('id', $id)->delete();
    }
}