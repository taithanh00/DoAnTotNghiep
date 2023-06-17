<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'color',
        'quantity',
        'categories_id',
        'subcategories_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategories_id');
    }
}
