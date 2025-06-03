<?php

namespace App\Services\Payment;

use App\Interfaces\Payment\PaymentInterface;
use App\Services\Payment\MercadoPagoService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PaymentService implements PaymentInterface
{
    public function __construct(private readonly MercadoPagoService $mercadoPagoService)
    {
        // 
    }
    public function checkout(Request $request): JsonResponse
    {
        dd($request);
        try {
            $checkoutUrl = $this->mercadoPagoService->criarPreferencia($request->items, $request->total);
            return response()->json(['url' => $checkoutUrl]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao processar o checkout'], 500);
        }
    }
}
