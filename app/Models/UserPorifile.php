<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPorifile extends Model
{
    use HasFactory;
    protected $table = 'userprofile';
    protected $fillable = [
        'uid',
        'fname',
        'lname',
        'mobileNumber',
        'address',
        'postal',
        'createTime',
        'updatedTime',
        'status'
    ];
}
