<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'qty', 'user_ip', 'price',

    ];
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}