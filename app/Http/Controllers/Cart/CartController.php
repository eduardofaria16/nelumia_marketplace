<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Interfaces\Cart\CartInterface;


class CartController extends Controller
{
    public function __construct(private readonly CartInterface $cartService)
    {
    }

    public function store(Request $request): JsonResponse
    {
        
        return $this->cartService->createCart($request);
    }   
}
