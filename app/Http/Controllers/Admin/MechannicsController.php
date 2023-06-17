<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MechannicsController extends Controller
{
    public function Index()
    {
        return view('admin.allmechannics');
    }
    public function EditMechannics()
    {
        return view('admin.editmechannics');
    }
}
