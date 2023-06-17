<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_name',
        'quantity',
        'request',
        'price',
        'total_price',
        'order_time',
        'Date_Created',
        'Change'
    ];
}
