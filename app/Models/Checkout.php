<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkout';
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'stress_address',
        'phone_number',
        'email',
        'bill_id',
        'product_name',
        'message',
        'product_name',
        'quantity',
        'product_price',
        'product_img',
        'Date_Created',
        'Change'
    ];
}
