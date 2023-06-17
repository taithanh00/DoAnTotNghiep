<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function Index()
    {
        $product = DB::table('products')->select('*');
        $product = $product->get();
        $pageName = 'Tên Trang - News';
        return view('admin.allproducts', compact('product', 'pageName'));
    }
    public function EditProduct()
    {
        $categories = category::latest()->get();
        $brands = Brand::latest()->get();
        $coupons = DB::table('coupon')->select('*');
        $coupons = $coupons->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.editproducts', compact('categories', 'brands', 'coupons', 'subcategories'));
    }
    public function StoreProduct(Request $request)
    {
        $products = new Product;
        $products->product_name = $request->product_name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->color = $request->color;
        $products->quantity_product = $request->quantity_product;
        $products->product_rating = $request->product_rating;
        $products->product_img = $request->product_img;
        $products->categories_id = $request->category_id;
        $products->coupons_id = $request->coupons_id;
        $products->brands_id = $request->brands_id;
        $products->subcategories_id = $request->sub_category_id;
        $products->save();

        // Update quantity of selected category
        if ($request->category_id != 'Select Category ID') {
            $category = Category::find($request->category_id);
            if ($category) {
                $category->quantity -= $request->quantity_product;
                $category->save();
            }
        }

        // Update quantity of selected subcategory
        if ($request->sub_category_id != 'Select SubCategory ID') {
            $subcategory = SubCategory::find($request->sub_category_id);
            if ($subcategory) {
                $subcategory->quantity -= $request->quantity_product;
                $subcategory->save();
            }
        }

        return redirect()->route('allproducts')->with('message', 'Product Added Successfully');
    }
    public function Edit2Product($id)
    {
        $product_info = product::findOrFail($id);
        $categories = category::latest()->get();
        $brands = Brand::latest()->get();
        $coupons = DB::table('coupon')->select('*');
        $coupons = $coupons->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.edit2product', compact('product_info', 'categories', 'brands', 'subcategories', 'coupons'));
    }
    public function UpdateProduct(Request $request)
    {
        $product = Product::find($request->input('product_id'));

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Kiểm tra các trường nhập liệu và thực hiện cập nhật
        $request->validate([
            'product_name' => '',
            'description' => '',
            'price' => 'numeric',
            'color' => '',
            'quantity_product' => 'numeric',
            'product_rating' => '',
            'product_img' => '',
            'category_id' => '',
            'coupons_id' => '',
            'brands_id' => '',
            'sub_category_id' => ''
        ]);

        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->color = $request->input('color');
        $product->quantity_product = $request->input('quantity_product');
        $product->product_rating = $request->input('product_rating');
        $product->categories_id = $request->input('category_id');
        $product->coupons_id = $request->input('coupons_id');
        $product->brands_id = $request->input('brands_id');
        $product->subcategories_id = $request->input('sub_category_id');

        $product->save();

        if ($request->has('sub_category_id')) {
            // Nếu người dùng chọn subcategories
            $subcategoryIds = Subcategory::where('id', $request->input('sub_category_id'))->pluck('id')->all();

            $canUpdate = Subcategory::whereIn('id', $subcategoryIds)
                ->where('quantity', '>=', $product->quantity_product)
                ->exists();

            if (!$canUpdate) {
                return redirect()->back()->with('error', 'Không đủ số lượng trong danh mục con.');
            }

            Subcategory::whereIn('id', $subcategoryIds)
                ->decrement('quantity', $product->quantity_product);
        } elseif ($request->has('category_id')) {
            // Nếu người dùng chọn categories
            $categoryIds = Category::where('id', $request->input('category_id'))->pluck('id')->all();

            $canUpdate = Category::whereIn('id', $categoryIds)
                ->where('quantity', '>=', $product->quantity_product)
                ->exists();

            if (!$canUpdate) {
                return redirect()->back()->with('error', 'Không đủ số lượng trong danh mục.');
            }

            Category::whereIn('id', $categoryIds)
                ->decrement('quantity', $product->quantity_product);
        }

        return redirect()->route('allproducts')->with('message', 'Cập nhật sản phẩm thành công.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        // Lấy danh mục con hoặc danh mục mà sản phẩm đang sử dụng
        if ($product->sub_category_id) {
            $subcategory = Subcategory::find($product->sub_category_id);

            if ($subcategory) {
                $subcategory->decrement('quantity', $product->quantity_product);
            }
        } elseif ($product->category_id) {
            $category = Category::find($product->category_id);

            if ($category) {
                $category->decrement('quantity', $product->quantity_product);
            }
        }

        $product->delete();

        return redirect()->route('allproducts')->with('message', 'Product Deleted Successfully');
    }
    //updatecategory
    // public function UpdateProduct(Request $request)
    // {
    //     $product_id = $request->product_id;
    //     $products = products::latest()->get();
    //     $request->validate([
    //         'product_name' => 'required|unique:products',
    //         'status' => 'required',

    //     ]);
    //     // DB::table('products')->where('id', $id)->update(['value' => $request->value"]);
    //     DB::table('products')->where('id',$product_id)->update(['product_name'=>$request->product_name]);
    //     // DB::table('categories')->where('id',$category_id)->update(['status'=>$request->status]);
    //     // Category::update([
    //     //     'category' =>$request->category
    //     // ]);

    //     //     // or die('Could not connect to MySQL: ' . mysqli_connect_error());
    //     return redirect()->route('allproduct')->with('message', 'Products Updated Successfully');
    // }
}
