<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BrandController extends Controller
{
    public function Index()
    {
        $brands = brand::latest()->get();
        return view('admin.allbrand', compact('brands'));
    }
    public function EditBrand()
    {
        return view('admin.editbrand');
    }
    public function StoreBrand(Request $request)
    {
        $request->validate([
            'BrandName' => 'required|unique:brands',
            'Description' => 'required',

        ]);
        brand::insert([
            'BrandName' => $request->BrandName,
            'Description' => $request->Description,
        ]);
        return redirect()->route('allbrand')->with('message', 'Brand Added Successfully');
    }
    public function Edit2Brand($id)
    {
        $brand_info = brand::findOrFail($id);
        return view('admin.edit2brand', compact('brand_info'));
    }
    //updatecategory
    public function UpdateBrand(Request $request)
    {
        $brand_id = $request->brand_id;
        $brands = brand::latest()->get();
        $request->validate([
            'BrandName' => '',
            'Description' => ''

        ]);
        // DB::table('products')->where('id', $id)->update(['value' => $request->value"]);
        DB::table('brands')->where('id',$brand_id)->update(['BrandName'=>$request->BrandName]);
        DB::table('brands')->where('id',$brand_id)->update(['Description'=>$request->Description]);
        // Category::update([
        //     'category' =>$request->category
        // ]);

        //     // or die('Could not connect to MySQL: ' . mysqli_connect_error());
        return redirect()->route('allbrand')->with('message', 'Brand Updated Successfully');
    }
    public function DeleteBrand($id){
        brand::findOrFail($id)->delete();
        return redirect()->route('allbrand')->with('message', 'Brand Deleted Successfully');
    }
}
