<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    use HasFactory;


    // define a method to update the cart data

    protected $fillable = [
        'product_name',
        'category_name',
        'product_img',
        'quantity',
        'product_price',
        'checkout_id',
        'Change'
    ];
    public static function updateCart()
    {
        // get all the cart items
        $cart = Cart::all();

        // update the quantity of each cart item
        foreach ($cart as $c) {
            $quantity = Cart::where('product_name', $c->product_name)->sum('quantity');
            $c->quantity = $quantity;
            $c->save();
        }
    }
}
