<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'products';
    protected $fillable = [
        'sku',
        'productName',
        'productDesc',
        'productCat',
        'productGroup',
        'productType',
        'price',
        'discount',
        'priceAfterDiscount',
        'netWeight',
        'grossWeight',
        'uom',
        'stock',
        'bpom',
        'halal',
        'productVideo',
        'productImage',
        'slug',
        'createdTime',
        'status'
    ];
}
