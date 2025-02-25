<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'email',
        'mobile',
        'pass',
        'activated',
        'activationCode',
        'createdTime',
        'updatedTime',
        'status'
    ];
}
