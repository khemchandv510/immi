<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\users;
use App\login_hours;
use DB;
use App\attendances;

class DashboardController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

if(Auth::user()->usertype_status == "3"){
    return redirect('enquiry/get-detail/'.Auth::user()->employee_id);
}

// if(Auth::user()->usertype_status == "4"){
//     $id = encrypt(Auth::user()->id);
//     header("Location:enquiry-list/".$id);   
//     // return redirect('enquiry-list/'.$id);
// }



        $users = new users;
            $users->where('unique_id',Auth::user()->unique_id)->update([
                'login_trace' => 1
            ]);


            // $test  =   DB::table('login_hours')->where('date',date('y-m-d'))->where('employee_id',Auth::user()->employee_id)->get();
            date_default_timezone_set('Asia/Kolkata'); 
            // $login_hours = DB::table('login_hours')->where('employee_id',Auth::user()->employee_id)->where('date', date('Y-m-d'))->where('check_already_login',1)->get(); 

$users = DB::table('users')->where('employee_id',Auth::user()->employee_id)->where('login_trace',1)->get();

$check_login = DB::table('login_hours')->where('employee_id', Auth::user()->employee_id)->where('check_already_login', 0)->where('date',date('Y-m-d'))->get();
// dd($check_login);
if($check_login->count() == null){
            // if($users->count() > 0){ 
            $login_hours  = new login_hours([
                'date' =>date('Y-m-d'), 
                'employee_id' => Auth::user()->employee_id,
                'employee_unique_id' => Auth::user()->unique_id,
                'name' => Auth::user()->name,
                'start_time' => date("H:i:s")
                
                 ]);
            $login_hours->save();
            // }
        }

          if((date('H') == 10) && (date('i')<30)){
              $check_attendance = DB::table('attendances')->where('employee_id',Auth::user()->employee_id)->where('date', date('Y-m-d'))->get();
// dd(       $check_attendance);
              if($check_attendance->count() == 0){
               $attendance = new attendances([
                'employee_id' => Auth::user()->employee_id,
                'name' => Auth::user()->name,
                'attendance' => 'Present',
                'date' => date('Y-m-d'),
                // 'time' => date("H:i:s") 
        ]);
        $attendance->save();
          }
}
elseif((date('H') >= 10) && (date('i')<30))
{
    // dd(date("H:i", strtotime(date("H:i"))));
    $check_attendance = DB::table('attendances')->where('employee_id',Auth::user()->employee_id)->where('date', date('Y-m-d'))->get();
    if($check_attendance->count() == 0){
        $attendance = new attendances([
            'employee_id' =>Auth::user()->employee_id,
            'name' =>  Auth::user()->name,
            'attendance' => 'Half Day',
            'date' => date('Y-m-d'),
            'time'  =>date('H-i-s')
            ]);
            $attendance->save();    
}
}
// elseif((date('H') == 14) && (date('i') > 00)){
//     $c = DB::table('attendances')->where('date', date('Y-m-d'))->get();
    
// $users = DB::table('users')->get();
// foreach($users as $user){
    
//     $attendance = new attendances([
//         'employee_id' => $user->employee_id,
//         'name' => $user->name,
//         'attendance' => 'Absent',
//         'date' => date('Y-m-d')
// ]);
// $attendance->save();
// }
// }
    
else{
    $check_attendance = DB::table('attendances')->where('employee_id',Auth::user()->employee_id)->where('date', date('Y-m-d'))->get();
    $count_hours = DB::table('login_hours')->where('date', date('Y-m-d'))
    ->where('employee_id',Auth::user()->employee_id)->SUM('time_calculate');
    if($count_hours >= 480){
    if($check_attendance->count() == 0){
        $attendance = new attendances;
        $attendance->where('employee_id',Auth::user()->employee_id)->where('date', date('Y-m-d'))
        ->update([
        
        'attendance' => 'Half Day',
        'date' => date('Y-m-d'),
        'time'  =>date('H-i-s')
        ]);
        $attendance->save();
    }
}
}



// $login_hours = new login_hours;
// $login_hours->where('employee_id', Auth::user()->employee_id)->where('date',date('Y-m-d'))
// ->update([
//     'check_already_login' => 1
// ]);


 
// here is end of if section

   

         
// dd(date("H:i:s"));


// $get_data = DB::table('login_hours')->where('date',date('y-m-d'))->where('employee_id',Auth::user()->employee_id)->get();

// if($get_data->count()== 0){
    
//     $login_hours  = new login_hours([
//         'date' =>date('Y-m-d'), 
//         'employee_id' => Auth::user()->employee_id,
//         'employee_unique_id' => Auth::user()->unique_id,
//         'name' => Auth::user()->name,
//         'start_time' => date("h:i:s") 
         
//     ]);
//     $login_hours->save();
// }

// else{

//     $login_hours  = new login_hours;
//     $login_hours->where('date',date('Y-m-d'))->where('employee_id',Auth::user()->employee_id)
//     ->update([
//         'employee_id' => Auth::user()->employee_id,
//         'employee_unique_id' => Auth::user()->unique_id,
//         'name' => Auth::user()->name,
//         'start_time' => date("h:i:s")
//         ]);

// }


          
            
            
          
             

            
            
        return view('dashboard-lead');
        
    }
}


