<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    protected $table = 'warehouse';
    use HasFactory;
    protected $fillable = [
        'quantity',
        'Date_Created',
        'Change'
    ];
}
