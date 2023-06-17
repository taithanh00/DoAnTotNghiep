<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'email',
        'sex',
        'address',
        'phone_number',
        'Change'
    ];
}
