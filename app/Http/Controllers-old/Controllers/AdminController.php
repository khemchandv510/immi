<?php

namespace App\Http\Controllers;
use App\ip_addresses;
use App\leave_requests;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;

class AdminController extends Controller
{
public function  index(){
    return view('admin/ip-address');
}

public function add_ip_address(Request $request){
    $unique_id = mt_rand(11111111,99999999);
    $ip_address =  new ip_addresses([
        'unique_id'  => $unique_id,
        'ip'  => $request->ip_address
        ]);
        $ip_address->save();
        return back();
}

public function add_knowledgebase(){
    return view('knowledge-base/knowledge-base');
}

public function active_ip(Request $request){
    $ip_address =  new ip_addresses;
    $ip_address->where('unique_id',$request->a)->update([
'action' => 1 
    ]);
}
public function ip_deactive(Request $request){
    $ip_address =  new ip_addresses;
    $ip_address->where('unique_id',$request->a)->update([
'action' => 0 
    ]);
}

public function ip_delete(Request $request){
    $ip_address =  new ip_addresses;
    $ip_address->where('unique_id',$request->a)->update([
'status' => 0 
    ]);
}


public function leave_request(Request $request){
    $unique_id = mt_rand(11111111,99999999);

    $get = DB::table('leave_requests')->where('employee_id',Auth::user()->employee_id)->where('date', date('Y-m-d'))->get();
    
      if($get->count()  == 0){
           
    $leave_requests =  new leave_requests([
            'unique_id'   =>$unique_id,
        'employee_id'  => Auth::user()->employee_id,
        'date'   =>  date('Y-m-d'),
        'subject'  =>$request->subject,
        'description'  => $request->description,
        'day'         =>  $request->day,
        'from'   => $request->form,
        'to'   => $request->to,
        'employee_name'=> Auth::user()->name , 
        'employee_unique_id' => Auth::user()->unique_id
    ]);
$leave_requests->save();
Session::flash('message','Request Sent');
return back();

   }
   else{
    Session::flash('message','Already Apply');
    return back();
   }

}

}
