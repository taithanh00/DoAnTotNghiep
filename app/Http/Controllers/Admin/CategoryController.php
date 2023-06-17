<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\WareHouse;
use App\Models\Subcategory;
use App\Models\News;
use App\Models\Product;
use App\Models\News_Detail;

class CategoryController extends Controller
{
    //all category
    public function Index()
    {
        $categories = category::latest()->paginate(100);
        return view('admin.allcategory', compact('categories'));
    }
    //add category-view
    public function Editcategory()
    {
        return view('admin.editcategory');
    }
    //add category-handle
    public function Storecategory(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories',
            'quantity' => 'required',

        ]);
        $quantity_warehouse = DB::table('warehouse')->value('quantity');
        if ($request->quantity >= $quantity_warehouse) {
            $response = redirect()->route('editcategory')->with('message', 'Add Failed');
            $response->send();
        } else {
            category::insert([
                'category' => $request->category,
                'quantity' => $request->quantity
            ]);
            DB::table('warehouse')->where('quantity', $quantity_warehouse)->update(['quantity' => $quantity_warehouse - $request->quantity]);
            return redirect()->route('allcategory')->with('message', 'Category Added Successfully');
        }
    }
    //updatecategory_view
    public function Edit2Category($id)
    {
        $category_info = Category::findOrFail($id);
        return view('admin.edit2category', compact('category_info'));
    }
    //updatecategory
    public function UpdateCategory(Request $request)
    {
        // Get the current quantity in the warehouse
        $quantity_warehouse = DB::table('warehouse')->value('quantity');

        // Get the category ID and list of all categories
        $category_id = $request->category_id;
        $categories = Category::latest()->get();

        // Validate the input fields
        $request->validate([
            'category' => 'required',
            'quantity' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) use ($category_id, $quantity_warehouse) {
                    $old_quantity = DB::table('categories')->where('id', $category_id)->value('quantity');
                    $new_quantity = $value;
                    if ($new_quantity > $quantity_warehouse + $old_quantity) {
                        $fail('The ' . $attribute . ' cannot be larger than the quantity in the warehouse.');
                    }
                },
            ],
        ]);

        // Get the old quantity of the category
        $old_quantity = DB::table('categories')->where('id', $category_id)->value('quantity');

        // Update the category name and quantity
        DB::table('categories')->where('id', $category_id)->update([
            'category' => $request->category,
            'quantity' => $request->quantity,
        ]);

        // Calculate the new quantity in the warehouse
        $new_quantity = $quantity_warehouse + ($old_quantity - $request->quantity);

        // Update the quantity in the warehouse
        DB::table('warehouse')->update(['quantity' => $new_quantity]);

        // Redirect to the page that displays all categories with a success message
        return redirect()->route('allcategory')->with('message', 'Category Updated Successfully');
    }
    public function DeleteCategory($id){
        category::findOrFail($id)->delete();
        return redirect()->route('allcategory')->with('message', 'Category D    eleted Successfully');
    }
}
