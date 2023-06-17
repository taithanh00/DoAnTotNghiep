<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function Index()
    {
        $checkouts = Checkout::latest()->get();
        // foreach ($checkoutRecords as $record) {
        //     $checkoutProducts = json_decode($record->checkout_products);
        // }
        return view('admin.allcheckout', compact('checkouts'));
    }
    public function EditCheckout()
    {
        return view('admin.editcheckout');
    }
    public function StoreCheckout(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'stress_address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'bill_id' => 'required',
            'message' => 'required',
            'product_name' => 'required',
            'quantity' => 'required|integer',
            'product_img' => 'required',
            'product_price' => 'required|numeric',
        ]);

        $checkout = new Checkout();
        $checkout->first_name = $request->input('first_name');
        $checkout->last_name = $request->input('last_name');
        $checkout->stress_address = $request->input('stress_address');
        $checkout->phone_number = $request->input('phone_number');
        $checkout->email = $request->input('email');
        $checkout->bill_id = $request->input('bill_id');
        $checkout->message = $request->input('message');

        // Create an array of product information
        $product = [
            'product_name' => $request->input('product_name'),
            'quantity' => $request->input('quantity'),
            'product_img' => $request->input('product_img'),
            'product_price' => $request->input('product_price')
        ];

        $checkoutProducts = [$product];

        $checkout->checkout_products = json_encode($checkoutProducts);

        $checkout->save();

        return redirect()->route('allcheckout')->with('success', 'Checkout added successfully');
    }
    public function Edit2Checkout($id)
    {
        $checkout_info = Checkout::findOrFail($id);
        return view('admin.edit2checkout', compact('checkout_info'));
    }
    public function UpdateCheckout(Request $request)
    {
        $checkout_id = $request->checkout_id;
        $this->validate($request, [
            'first_name' => '',
            'last_name' => '',
            'stress_address' => '',
            'phone_number' => '',
            'email' => '',
            'bill_id' => '',
            'message' => '',
            'product_name' => '',
            'quantity' => '',
            'product_img' => '',
            'product_price' => '',
        ]);
        $checkoutProducts = json_encode([
            [
                'product_name' => $request->input('product_name'),
                'quantity' => $request->input('quantity'),
                'product_img' => $request->input('product_img'),
                'product_price' => $request->input('product_price')
            ]
        ]);

        DB::table('checkout')
            ->where('id', $checkout_id)
            ->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'stress_address' => $request->input('stress_address'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'bill_id' => $request->input('bill_id'),
                'message' => $request->input('message'),
                'checkout_products' => $checkoutProducts
            ]);

        return redirect()->route('allcheckout')->with('success', 'Checkout updated successfully');
    }
    public function DeleteCheckout($id)
    {
        Checkout::findOrFail($id)->delete();
        return redirect()->route('allcheckout')->with('message', 'Checkout Deleted Successfully');
    }
}
