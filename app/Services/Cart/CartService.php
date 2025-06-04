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
        
        $cart =[
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'name' => $request->name,
            'quantity' => 1,
        ];

        $cartExists = Cart::where('user_id', $user->getAuthIdentifier())->first();

        if($cartExists){
            $cartExists->products()->attach($cart['product_id'], [
                'quantity' => $cart['quantity'],
                'price' => $cart['price'],
                'name' => $cart['name'],
            ]);

            return response()->json(['message' => 'Produto adicionado ao carrinho']);
        }else{
            $createCart = $this->cartRepository->createCart($cart);
            $createCart->products()->attach($cart['product_id'], [
                'quantity' => $cart['quantity'],
                'price' => $cart['price'],
                'name' => $cart['name'],
            ]);
            return response()->json(['message' => 'Produto adicionado ao carrinho']);
        }



        return response()->json(['message' => 'Erro ao adicionar produto ao carrinho']);
    }

    public function index(): JsonResponse
    {
        $user = auth()->user();
        $pivotItems = [];
        $cart = Cart::where('user_id', $user->id)->with('products')->first();

        if ($cart) {
            foreach ($cart->products as $product) {
                $pivotItems[] = $product->pivot; // acessa os dados da tabela pivô
            }
        }
        
        return response()->json($pivotItems);
    }

    public function updateCart(Request $request, $id): JsonResponse
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->with('products')->first();

        $quantity = $request->quantity;
        $product_id = $request->id;

        
        if ($quantity <= 0) {
            
            $cart->products()->detach($product_id);
        } else {
            
            $cart->products()->updateExistingPivot($product_id, [
                'quantity' => $quantity,
            ]);
        }
        return response()->json(['message' => 'Produto atualizado com sucesso']);
    }

    public function deleteCart($id): JsonResponse
    {   
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->with('products')->first();
        $cart->products()->detach($id);
        
        return response()->json(['message' => 'Produto removido do carrinho']);
    }

    public function addCart(Request $request): JsonResponse
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();

        if(!$cart){
            $cart = $this->cartRepository->createCart($request->all());
        }

        return response()->json(['message' => 'Carrinho criado com sucesso']);
    }

    public function migrateCart() : JsonReponse {
        
        // $user = auth()->user(Request $request);
        dd($request);

        foreach ($request->items as $item) {
            $productId = $item['id'];
            $quantity = $item['quantity'];
            $price = $item['price']
    
            // Adiciona ou atualiza o item no carrinho do banco
            $user->cart()->updateOrCreate(
                ['product_id' => $productId],
                ['quantity' => DB::raw("quantity + $quantity")]
            );
        }
    
        return response()->json(['message' => 'Carrinho migrado com sucesso.']);
        
    }
}
