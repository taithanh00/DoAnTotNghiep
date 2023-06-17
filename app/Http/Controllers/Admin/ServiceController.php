<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Bill;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function Index()
    {
        $services = Service::latest()->get();
        return view('admin.allservicelist', compact('services'));
    }
    public function EditService()
    {
        $bills = Bill::latest()->get();
        $checkouts = Checkout::latest()->get();
        return view('admin.editservicelist', compact('bills', 'checkouts'));
    }
    public function StoreService(Request $request)
    {
        $request->validate([
            'customer_first_name' => 'required',
            'customer_last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'stress_address' => 'required',
            'day_buy_product' => 'required',
            'day_thanks_hidden' => 'required',
            'time_guarantee_hidden' => 'required',
            'bill_id' => 'required',
            'checkout_id' => 'required'
        ]);
        $dayThanks = $request->input('day_thanks_hidden');
        $timeGuarantee = $request->input('time_guarantee_hidden');

        Service::insert([
            'customer_first_name' => $request->customer_first_name,
            'customer_last_name' => $request->customer_last_name,
            'customer_email' => $request->email,
            'customer_phone_number' => $request->phone_number,
            'customer_stress_address' => $request->stress_address,
            'day_buy_product' => $request->day_buy_product,
            'day_thanks' => $dayThanks,
            'time_guarantee' => $timeGuarantee,
            'bill_id' => $request->bill_id,
            'checkout_id' => $request->checkout_id
        ]);

        return redirect()->route('allservice')->with('message', 'Service Added Successfully');
    }
    public function Edit2Service($id)
    {
        $service_info = Service::findOrFail($id);
        $bills = Bill::latest()->get();
        $checkouts = Checkout::latest()->get();
        return view('admin.edit2service', compact('service_info','bills','checkouts'));
    }
    public function UpdateService(Request $request)
    {
        $service_id = $request->service_id;
        $service = Service::latest()->get();
        $dayThanks = $request->input('day_thanks_hidden');
        $timeGuarantee = $request->input('time_guarantee_hidden');
        $request->validate([
            'customer_first_name' => '',
            'customer_last_name' => '',
            'customer_email' => '',
            'customer_phone_number' => '',
            'customer_stress_address' => '',
            'day_buy_product' => '',
            'day_thanks_hidden' => '',
            'time_guarantee_hidden' => '',
            'bill_id' => '',
            'checkout_id' => ''

        ]);
        // dd($request->day_thanks);
        // DB::table('products')->where('id', $id)->update(['value' => $request->value"]);
        DB::table('service')->where('id',$service_id)->update(['customer_first_name'=>$request->customer_first_name]);
        DB::table('service')->where('id',$service_id)->update(['customer_last_name'=>$request->customer_last_name]);
        DB::table('service')->where('id',$service_id)->update(['customer_email'=>$request->customer_email]);
        DB::table('service')->where('id',$service_id)->update(['customer_phone_number'=>$request->customer_phone_number]);
        DB::table('service')->where('id',$service_id)->update(['customer_stress_address'=>$request->customer_stress_address]);
        DB::table('service')->where('id',$service_id)->update(['day_buy_product'=>$request->day_buy_product]);
        DB::table('service')->where('id',$service_id)->update(['day_thanks'=>$dayThanks]);
        DB::table('service')->where('id',$service_id)->update(['time_guarantee'=>$timeGuarantee]);
        DB::table('service')->where('id',$service_id)->update(['bill_id'=>$request->bill_id]);
        DB::table('service')->where('id',$service_id)->update(['checkout_id'=>$request->checkout_id]);

        return redirect()->route('allservice')->with('message', 'Servive Updated Successfully');
    }
    public function DeleteService($id){
        Service::findOrFail($id)->delete();
        return redirect()->route('allservice')->with('message', 'Service Deleted Successfully');
    }
}
