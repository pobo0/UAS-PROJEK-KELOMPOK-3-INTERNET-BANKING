<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'dob',
        'gender',
        'address',
        'phone',
        'email',
        'username',
        'pin',
        'confirm-pin',
        'terms',
    ];
}
