<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB ;

class MailController extends Controller
{
    public function SendMail(){
        return view('frontend.layouts.contact') ;
    }
}
