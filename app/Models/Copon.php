<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copon extends Model
{
    use HasFactory;
    protected $fillable = [
        'copon_name', 'discoute', 'status'
    ];
}