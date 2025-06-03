<?php

namespace App\Services\Payment;

use Illuminate\Support\Facades\Http;

class MercadoPagoService
{
    public function criarPreferencia(array $items, float $total)
    {
        dd($items, $total);
        $payload = [
            'items' => array_map(function ($item) {
                return [
                    'id' => $item['product_id'],
                    'title' => $item['name'],
                    'quantity' => (int) $item['quantity'],
                    'unit_price' => (float) $item['price'],
                ];
            }, $items),
            'back_urls' => [
                'success' => 'https://sua-loja.com/sucesso',
                'failure' => 'https://sua-loja.com/erro',
                'pending' => 'https://sua-loja.com/pendente',
            ],
            'auto_return' => 'approved',
        ];

        $response = Http::withToken(env('MP_ACCESS_TOKEN'))
                        ->post('https://api.mercadopago.com/checkout/preferences', $payload);

        if ($response->failed()) {
            throw new \Exception('Erro ao criar preferência no Mercado Pago');
        }

        return $response->json()['init_point'];
    }
}
