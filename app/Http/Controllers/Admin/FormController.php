<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
class FormController extends Controller
{
       public function store(Request $request)
    {
        $member = new member;
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->password = bcrypt($request->input('password'));
        $member->save();

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }
}
