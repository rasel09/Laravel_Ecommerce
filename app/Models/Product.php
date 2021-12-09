<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brind_id', 'category_id', 'product_name', 'product_code', 'price', 'quantity', 'short_description', 'long_description', 'image', 'status', 'slug',
    ];
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}