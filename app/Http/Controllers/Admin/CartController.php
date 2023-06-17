<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Product ;
use App\Models\Category ;
use App\Models\Subcategory ;
class CartController extends Controller
{
    public function Index()
    {
        $carts = Cart::latest()->get();
        return view('admin.allcart', compact('carts'));
    }
    public function EditCart()
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.editcarts',compact('products','categories','subcategories'));
    }
    public function StoreCart(Request $request)
    {
        $products = Product::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $cart_id = $request->cart_id;
        print_r($cart_id);
        $request->validate([
            'product_name' => 'required|unique:cart',
            'category_name' => 'required',
            'product_img' => 'required',
            'quantity' => 'required',
            'product_price' => 'required'

        ]);
        Cart::insert([
            'product_name' => $request->product_name,
            'category_name' => $request->category_name,
            'product_img' => $request->product_img,
            'quantity' => $request->quantity,
            'product_price' => $request->product_price
        ]);
        return redirect()->route('allcart',compact('products','categories','subcategories'))->with('message', 'Cart Added Successfully');
    }
    public function Edit2Cart($id)
    {
        $cart_info = Cart::findOrFail($id);
        return view('admin.edit2cart', compact('cart_info'));
    }
    public function UpdateCart(Request $request)
    {
        $cart_id = $request->cart_id;
        $carts = DB::table('cart')->select('*');
        $carts = $carts->get();
        $request->validate([
            'product_name' => '',
            'category_name' => '',
            'product_img' => '',
            'quantity' => '',
            'product_price' => ''
        ]);
        // DB::table('products')->where('id', $id)->update(['value' => $request->value"]);
        DB::table('cart')->where('id', $cart_id)->update(['product_name' => $request->product_name]);
        DB::table('cart')->where('id', $cart_id)->update(['category_name' => $request->category_name]);
        DB::table('cart')->where('id', $cart_id)->update(['product_img' => $request->product_img]);
        DB::table('cart')->where('id', $cart_id)->update(['quantity' => $request->quantity]);
        DB::table('cart')->where('id', $cart_id)->update(['product_price' => $request->product_price * $request->quantity]);
        return redirect()->route('allcart')->with('message', 'Cart Updated Successfully');
    }
    public function DeleteCart($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('allcart')->with('message', 'Cart Deleted Successfully');
    }
}
    // //updatecategory
    // public function UpdateCategory(Request $request)
    // {
    //     // Get the current quantity in the warehouse
    //     $quantity_warehouse = DB::table('warehouse')->value('quantity');

    //     // Get the category ID and list of all categories
    //     $category_id = $request->category_id;
    //     $categories = Category::latest()->get();

    //     // Validate the input fields
    //     $request->validate([
    //         'category' => 'required',
    //         'quantity' => [
    //             'required',
    //             'numeric',
    //             'min:0',
    //             function ($attribute, $value, $fail) use ($category_id, $quantity_warehouse) {
    //                 $old_quantity = DB::table('categories')->where('id', $category_id)->value('quantity');
    //                 $new_quantity = $value;
    //                 if ($new_quantity > $quantity_warehouse + $old_quantity) {
    //                     $fail('The ' . $attribute . ' cannot be larger than the quantity in the warehouse.');
    //                 }
    //             },
    //         ],
    //     ]);

    //     // Get the old quantity of the category
    //     $old_quantity = DB::table('categories')->where('id', $category_id)->value('quantity');

    //     // Update the category name and quantity
    //     DB::table('categories')->where('id', $category_id)->update([
    //         'category' => $request->category,
    //         'quantity' => $request->quantity,
    //     ]);

    //     // Calculate the new quantity in the warehouse
    //     $new_quantity = $quantity_warehouse + ($old_quantity - $request->quantity);

    //     // Update the quantity in the warehouse
    //     DB::table('warehouse')->update(['quantity' => $new_quantity]);

    //     // Redirect to the page that displays all categories with a success message
    //     return redirect()->route('allcategory')->with('message', 'Category Updated Successfully');
    // }

    // //delete category
    // public function DeleteCategory($id)
    // {
    //     $category = category::findOrFail($id);
    //     $quantity_deleted = $category->quantity;
    //     $category->delete();
    //     $quantity_warehouse = DB::table('warehouse')->value('quantity');
    //     DB::table('warehouse')->where('id', 1)->update(['quantity' => $quantity_warehouse + $quantity_deleted]);
    //     return redirect()->route('allcategory')->with('message', 'Category Deleted Successfully');
    // }
