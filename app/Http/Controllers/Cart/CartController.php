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

    public function index(): JsonResponse
    {
        return $this->cartService->index();
    }
    

    public function update(Request $request, $id): JsonResponse
    {
        return $this->cartService->updateCart($request, $id);
    }


    public function destroy($id): JsonResponse
    {
        return $this->cartService->deleteCart($id);
    }

    public function add(Request $request) : JsonResponse 
    {
        return $this->cartService->addCart($request);
    }

    public function migrate(Request $request) : JsonResponse 
    {
        return $this->cartService->migrateCart($request);
    }
}
