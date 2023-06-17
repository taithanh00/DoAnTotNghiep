<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member ;
use Illuminate\Support\Facades\DB;
class MemberController extends Controller
{
    public function Index()
    {
        $members = Member::latest()->get();
        return view('admin.allmember', compact('members'));
    }
    public function EditMember()
    {
        return view('admin.editmember');
    }
    public function StoreMember(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'phone_number' => 'required'
        ]);
        Member::insert([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'sex' => $request->sex,
            'address' => $request->address,
            'phone_number' => $request->phone_number

        ]);
        return redirect()->route('allmember')->with('message', 'Member Added Successfully');
    }
    public function Edit2Member($id)
    {
        $member_info = Member::findOrFail($id);
        return view('admin.edit2member', compact('member_info'));
    }
    //updatecategory
    public function UpdateMember(Request $request)
    {
        $member_id = $request->member_id;
        $request->validate([
            'username' => '',
            'password' => '',
            'email' => '',
            'sex' => '',
            'address' => '',
            'phone_number' => ''

        ]);
        // DB::table('products')->where('id', $id)->update(['value' => $request->value"]);
        DB::table('member')->where('id',$member_id)->update(['username'=>$request->username]);
        DB::table('member')->where('id',$member_id)->update(['password'=>$request->password]);
        DB::table('member')->where('id',$member_id)->update(['email'=>$request->email]);
        DB::table('member')->where('id',$member_id)->update(['sex'=>$request->sex]);
        DB::table('member')->where('id',$member_id)->update(['address'=>$request->address]);
        DB::table('member')->where('id',$member_id)->update(['phone_number'=>$request->phone_number]);
        // Category::update([
        //     'category' =>$request->category
        // ]);

        //     // or die('Could not connect to MySQL: ' . mysqli_connect_error());
        return redirect()->route('allmember')->with('message', 'Member Updated Successfully');
    }
    public function DeleteMember($id){
        Member::findOrFail($id)->delete();
        return redirect()->route('allmember')->with('message', 'Member Deleted Successfully');
    }
}
