<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\WareHouse;

class SubCategoryController extends Controller
{
    public function Index()
    {
        $subcategory = Subcategory::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.allsubcategory', compact('subcategory', 'categories'));
    }
    public function EditSubCategory()
    {
        $categories = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        return view('admin.editsubcategory', compact('categories', 'subcategory'));
    }
    public function StoreSubCategory(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'quantity' => 'required|numeric|min:1',
            'category_id' => 'required',
        ]);

        // Get the category with the given ID
        $category = Category::findOrFail($request->category_id);

        // Check if the category has enough quantity
        if ($category->quantity < $request->quantity) {
            return back()->withInput()->withErrors(['quantity' => 'The category has insufficient quantity.']);
        }

        // Create a new subcategory with the given data
        $subcategory = new Subcategory();
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->quantity = $request->quantity;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        // Update the quantity of the category
        $category->quantity -= $request->quantity;
        $category->save();

        // Update the quantity of the warehouse
        $warehouse = Warehouse::first();
        $warehouse->quantity -= $request->quantity;
        $warehouse->save();

        // Redirect to the page that displays all subcategories with a success message
        return redirect()->route('allsubcategory')->with('message', 'Subcategory Created Successfully');
    }
    public function Edit2SubCategory($id)
    {
        $categories = Category::latest()->get();
        $subcategory_info = Subcategory::findOrFail($id);
        return view('admin.edit2subcategory', compact('subcategory_info', 'categories'));
    }
    public function UpdateSubCategory(Request $request)
    {
        // Lấy thông tin subcategory từ request
        $subcategory_id = $request->subcategory_id;
        $subcategory_name = $request->subcategory_name;
        $quantity = $request->quantity;
        $category_id = $request->category_id;

        // Lấy thông tin subcategory trước khi cập nhật
        $old_subcategory = Subcategory::find($subcategory_id);
        $old_quantity = $old_subcategory->quantity;
        $old_category_id = $old_subcategory->category_id;

        // Tìm category cũ và cập nhật quantity
        $old_category = Category::find($old_category_id);
        $old_category->quantity += $old_quantity; // Cộng lại quantity của subcategory cũ vào category cũ
        $old_category->save();

        // Cập nhật thông tin subcategory
        $subcategory = Subcategory::find($subcategory_id);
        $subcategory->subcategory_name = $subcategory_name;
        $subcategory->quantity = $quantity;
        $subcategory->category_id = $category_id;
        $subcategory->save();

        // Tìm category mới và cập nhật quantity
        $new_category = Category::find($category_id);
        $new_category->quantity -= $quantity; // Trừ đi quantity của subcategory mới từ category mới
        $new_category->save();

        // Tính toán và cập nhật quantity trong warehouse (giả sử là bảng Warehouse)
        $warehouse = Warehouse::first();
        $warehouse->quantity += ($old_quantity - $quantity); // Cập nhật warehouse bằng sự thay đổi quantity giữa subcategory cũ và mới
        $warehouse->save();

        // Redirect hoặc trả về thông báo thành công
        return redirect()->route('allsubcategory')->with('message', 'Subcategory Updated Successfully');
    }
    public function DeleteSubCategory($id)
    {
        // Get the subcategory with the given ID
        $subcategory = Subcategory::findOrFail($id);

        // Get the corresponding category and update its quantity
        $category_id = $subcategory->category_id;
        $category = Category::findOrFail($category_id);
        $category->quantity += $subcategory->quantity;
        $category->save();

        // Update the quantity of the warehouse
        $warehouse = Warehouse::first();
        $warehouse->quantity += $subcategory->quantity;
        $warehouse->save();

        // Delete the subcategory
        $subcategory->delete();

        // Redirect to the page that displays all subcategories with a success message
        return redirect()->route('allsubcategory')->with('message', 'Subcategory Deleted Successfully');
    }
}
