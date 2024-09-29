<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Notification extends Controller
{
    public function index(){
        $date = date("Y-m-d");
    
          $notification = DB::table('enquiries')->where('callbacklater', $date)->get(); 
            return view('layouts/app', ['notification' , $notification]);
    }
}
