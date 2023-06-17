<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function Index()
    {
        $coupons = DB::table('coupon')->select('*');
        $coupons = $coupons->get();
        return view('admin.allcoupon', compact('coupons'));
    }
    public function EditCoupon()
    {
        return view('admin.editcoupon');
    }
    public function StoreCoupon(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required|unique:coupon',
            'coupon_code' => 'required',
            'coupon_validate' => 'required'
        ]);
        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_validate' => $request->coupon_validate
        ]);
        return redirect()->route('allcoupon')->with('message', 'Coupon Added Successfully');
    }
    public function Edit2Coupon($id)
    {
        $coupon_info = Coupon::findOrFail($id);
        return view('admin.edit2coupon', compact('coupon_info'));
    }
    public function UpdateCoupon(Request $request)
    {
        $coupon_id = $request->coupon_id;
        $coupons = DB::table('coupon')->select('*');
        $coupons = $coupons->get();
        $request->validate([
            'coupon_name' => '',
            'coupon_code' => '',
            'coupon_validate' => ''
        ]);
        // DB::table('products')->where('id', $id)->update(['value' => $request->value"]);
        DB::table('coupon')->where('id', $coupon_id)->update(['coupon_name' => $request->coupon_name]);
        DB::table('coupon')->where('id', $coupon_id)->update(['coupon_code' => $request->coupon_code]);
        DB::table('coupon')->where('id', $coupon_id)->update(['coupon_validate' => $request->coupon_validate]);
        // Category::update([
        //     'category' =>$request->category
        // ]);

        //     // or die('Could not connect to MySQL: ' . mysqli_connect_error());
        return redirect()->route('allcoupon')->with('message', 'Coupon Updated Successfully');
    }
    public function DeleteCoupon($id)
    {
        Coupon::findOrFail($id)->delete();
        return redirect()->route('allcoupon')->with('message', 'Coupon Deleted Successfully');
    }
}

