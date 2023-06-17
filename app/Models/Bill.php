<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
     protected $table = 'bill';
    protected $fillable = [
        'quantity_product',
        'total_final_product',
        'date_bill_launch',
        'Change'
    ];
}
