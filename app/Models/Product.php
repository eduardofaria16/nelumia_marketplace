<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = ['name', 'price'];

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class)
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
