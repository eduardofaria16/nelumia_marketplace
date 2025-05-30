<?php

namespace App\Interfaces\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface CartInterface
{
    public function createCart(Request $request): JsonResponse;
    public function updateCart(Request $request, $id): JsonResponse;
    public function deleteCart($id): JsonResponse;
}