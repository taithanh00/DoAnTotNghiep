<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    use HasFactory;
    protected $fillable = [
        'Category',
        'Status',
        'Date_Created',
        'Change'
    ];
}
