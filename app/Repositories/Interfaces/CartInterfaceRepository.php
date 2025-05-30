<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface CartInterfaceRepository {

    public function createCart($cart);
    public function updateCart($request, $id);
    public function deleteCart($id);
}
