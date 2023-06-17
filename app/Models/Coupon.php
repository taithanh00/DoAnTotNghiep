<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    use HasFactory;
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'coupon_validate',
        'Date_Created',
        'Change'
    ];
}
