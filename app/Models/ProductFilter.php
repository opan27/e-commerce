<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFilter extends Model
{
    use HasFactory;
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $table = 'productfilter';
    protected $fillable = [
        'key',
        'value',
        'status'
    ];
}
