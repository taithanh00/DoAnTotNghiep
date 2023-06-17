<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WareHouse ;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
class WarehouseController extends Controller
{
    public function Index(){
        $warehouse = WareHouse::latest()->get();
        return view('admin.allwarehouse', compact('warehouse'));
    }
}
