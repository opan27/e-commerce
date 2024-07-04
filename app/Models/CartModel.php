<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'id_user',
        'id_product',
        'qty',
        'created_time'
    ];
}
