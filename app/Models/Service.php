<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    use HasFactory;
    protected $fillable = [
        'customer_first_name',
        'customer_email',
        'customer_last_name',
        'customer_phone_number',
        'customer_stress_address',
        'day_buy_product',
        'day_thanks',
        'time_guarantee',
        'bill_id',
        'checkout_id'
    ];
}
