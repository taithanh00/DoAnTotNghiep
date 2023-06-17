<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill ;
use Illuminate\Support\Facades\DB;
class BillController extends Controller
{
    public function Index(){
        $bills = Bill::latest()->get();
        return view('admin.allbill',compact('bills'));
    }
    public function EditBill()
    {
        return view('admin.editbill');
    }
    public function StoreBill(Request $request)
    {
        $request->validate([
            'quantity_product' => 'required',
            'total_final_product' => 'required',
            'date_bill_launch' => 'required',
            'product_name' => 'required'

        ]);
        Bill::insert([
            'quantity_product' => $request->quantity_product,
            'total_final_product' => $request->total_final_product,
            'date_bill_launch' => $request->date_bill_launch,
            'product_name' => $request->product_name,
        ]);
        return redirect()->route('allbill')->with('message', 'Bill Added Successfully');
    }
    public function Edit2Bill($id)
    {
        $bill_info = Bill::findOrFail($id);
        return view('admin.edit2bill', compact('bill_info'));
    }
    public function UpdateBill(Request $request)
    {
        $bill_id = $request->bill_id;
        $brands = Bill::latest()->get();
        $request->validate([
            'quantity_product' => '',
            'total_final_product' => '',
            'date_bill_launch' => '',
            'product_name' => ''

        ]);
        // DB::table('products')->where('id', $id)->update(['value' => $request->value"]);
        DB::table('bill')->where('id',$bill_id)->update(['quantity_product'=>$request->quantity_product]);
        DB::table('bill')->where('id',$bill_id)->update(['total_final_product'=>$request->total_final_product]);
        DB::table('bill')->where('id',$bill_id)->update(['date_bill_launch'=>$request->date_bill_launch]);
        DB::table('bill')->where('id',$bill_id)->update(['product_name'=>$request->product_name]);
        return redirect()->route('allbill')->with('message', 'Bill Updated Successfully');
    }
    public function DeleteBill($id){
        Bill::findOrFail($id)->delete();
        return redirect()->route('allbill')->with('message', 'Brand Deleted Successfully');
    }
}
