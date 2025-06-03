<?php

namespace App\Interfaces\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface PaymentInterface
{
    public function checkout(Request $request): JsonResponse;
}