<?php

namespace App\Services\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Cart;
use App\Repositories\Interfaces\CartInterfaceRepository;
use App\Interfaces\Cart\CartInterface;

class CartService implements CartInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(private readonly CartInterfaceRepository $cartRepository)
    {
        //
    }

    public function createCart(Request $request): JsonResponse{

        $user = auth()->user();

        $cartExists = Cart::where('user_id', $user->getAuthIdentifier())->where('product_id', $request->product_id)->first();

        if($cartExists){
            $cartExists->update([
                'quantity' => $cartExists->quantity + 1,
            ]);
            return response()->json(['message' => 'Produto adicionado ao carrinho']);
        }

        $cart =[
            // 'user_id' => $user->id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'name' => $request->name,
            'quantity' => 1,
        ];
        
        $createCart = $this->cartRepository->createCart($cart);

        if($createCart){
            return response()->json(['message' => 'Produto adicionado ao carrinho']);
        }

        return response()->json(['message' => 'Erro ao adicionar produto ao carrinho']);
    }

    public function updateCart(Request $request, $id): JsonResponse
    {
        return $this->cartRepository->updateCart($request, $id);
    }

    public function deleteCart($id): JsonResponse
    {
        return $this->cartRepository->deleteCart($id);
    }
}
