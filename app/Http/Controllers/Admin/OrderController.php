<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\itemorder;
use DB ;
class OrderController extends Controller
{
    public function Index1()
    {
        $orders = order::latest()->get();
        return view('admin.allorderlist', compact('orders'));
    }
    public function EditOrderList()
    {
        return view('admin.editorderlist');
    }
    public function Index2()
    {
        $itemorders = itemorder::latest()->get();
        return view('admin.allitemlist', compact('itemorders'));
    }
    public function EditItemList()
    {
        return view('admin.edititemlist');
    }
    public function StoreItem__toString(Request $request)
    {
        $item = new itemorder;
        $item->order_time = $request->order_time;
        $item->quantity = $request->quantity;
        $item->request = $request->request;
        $item->price = $request->price;
        $item->total_price = $request->total_price;
        $item->order_time = $request->order_time;
        $item->order_id = $request->order_id;
        $item->save();
        return redirect()->route('allitemlist')->with('message', 'Item Added Successfully');
        // $request->validate([
        //     'order_time' => 'required|unique:item_orders',
        //     'quantity' => 'required',
        //     'request' => 'required',
        //     'price' => 'required',
        //     'total_price' => 'required',
        //     'order_time' => 'required',
        //     'order_id' => 'required',
        // ]);
        // itemorder::insert([
        //     'order_time' => $request->order_time,
        //     'quantity' => $request->quantity,
        //     'request' => $request->request,
        //     'price' => $request->price,
        //     'total_price' => $request->total_price,
        //     'order_time' => $request->order_time,
        //     'order_id' => $request->order_id,
        // ]);
        // return redirect()->route('allitemlist')->with('message', 'Item Added Successfully');
    }
    public function Complete()
    {
        return view('admin.complete');
    }
    public function Cancel()
    {
        return view('admin.cancel');
    }
}
