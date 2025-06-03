<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse; // <-- Faltava essa linha
use App\Interfaces\Payment\PaymentInterface;

class PaymentController extends Controller
{
    public function __construct(private readonly PaymentInterface $paymentService)
    {
        //
    }   

    public function checkout(Request $request): JsonResponse
    {
        return $this->paymentService->checkout($request);
    }
}
