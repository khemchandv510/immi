<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\attendances;
use DB;
use App\users;
use App\employee_experiences;   
use App\employee_documents;
class HrController extends Controller
{




    public function job_left(){
        return view('hr-section/ktslogin/php/job-left.php');
    }

public function attendance(){
    return view('hr/attendance');
}

public function attendance_by_date(Request $request){
    
      $attendance = DB::table('attendances')->where('date',$request->input('date'))->get();
    return view('hr/attendance', compact(['attendance']));
}

public function make_present(Request $request){
    $attendance = new attendances([
        'employee_id' => $request->id,
        'name' => $request->name,
        'attendance' => 'Present',
        'date' => date('Y-m-d')
]);
$attendance->save();
}

public function make_absent(Request $request){
    $attendance = new attendances([
        'employee_id' => $request->id,
        'name' => $request->name,
        'attendance' => 'Absent',
        'date' => date('Y-m-d')
]);
$attendance->save();
}

public function half_day(Request $request){
    $attendance = new attendances([
        'employee_id' => $request->id,
        'name' => $request->name,
        'attendance' => 'Half Day',
        'date' => date('Y-m-d'),
        'time'  =>$request->halfdayTime
]);
$attendance->save();
}

public function attendance_by_month(Request $request){
    $emp = $request->select_month;
    $attendance_by_month =  DB::table('attendances')->where('employee_id',$request->select_month)->get(); 
    // dd($attendance);
    return view('hr/attendance', compact(['attendance_by_month', 'emp']));

}

// public public attendance(){

// }

public function payroll(){
    return view('hr/payroll');
}

public function select_employee_payroll(Request $request){

//  DB::table('login_hours')->where('employee_unique_id',$request->employee_name)->groupBy(DB::raw('employee_unique_id'))->get();

$get_emp = DB::table('login_hours')
->select(DB::raw('date, SUM(time_calculate) as total, MIN(start_time) as min_time, MAX(end_time) as max_time, name, employee_id' ))
->groupBy('date', 'name', 'employee_id')
->where('employee_unique_id',$request->employee_name)->where('date','like',$request->month.'%')
->get();
// dd($get_emp);
// $login_time = DB::table('login_hours')
// ->where('employee_unique_id',$request->employee_name)
// ->groupBy('date')
// ->select(DB::raw(' MIN(start_time) as min_time'))
// ->get();

// $logout_time = DB::table('login_hours')
// ->where('employee_unique_id',$request->employee_name)
// ->groupBy('date')
// ->select(DB::raw(' MAX(end_time) as max_time'))
// ->get();

// dd($logout_time);
if(!empty($request->month)){
$month = $request->month;
}
else{
    $month = date('Y-m');
}
if($get_emp->count() > 0){
return view('hr/payroll', compact('get_emp','month'));
}
else{
    return view('hr/payroll');
}
}


 
public function recruitment(){
    return view('hr/recruitment');
}

public function empoyee_detail(Request $request){
    $id = $request->id;
    return view('hr/employee-detail', compact(['id']));
}

public function edit_emp_name(Request $request){
    $users = new users;
    $users->where('unique_id',$request->unique_id)
    ->update([
        'name' => $request->name
    ]);
  }

public function edit_emp_designation(Request $request){
    $users = new users;
    $users->where('unique_id',$request->unique_id)
    ->update([
        'designation' => $request->designation
    ]);
}

public function emp_other_detail_edit_form(Request $request){
$emp_edit = new users;
    return $emp_edit->where('email',$request->email)
    ->update([
        'email' => $request->email,
        'number'=> $request->contact,
        'DOB'=>  $request->dob,
        'address'=> $request->address,
        'salary'=> $request->salary,
        'joinint_date'=> $request->joinint_date,
        'domain'=> $request->domain,
        'total_experience'=> $request->experience,
        'address' => $request->address
    ]);
    // Session::flash('message','Invalid File Extension.');
}

public function previous_company_edit_form(Request $request){
    
//     $get  = DB::table('employee_experiences')->where('employee_unique_id',$request->id)->get();
//     dd($get)
//     if($get->count() > 0){

//     $con = count($request->last_company);
//     for($i=0; $i<$con; $i++){
    
//         $employee_experiences = new employee_experiences;
//         foreach($get as $get2){
//      dd($employee_experiences->where('employee_unique_id',$request->id)->where('last_company',$get2->last_company)
//     ->update([
        
//         'last_company' => $request->last_company[$i],
//         'last_salary'=> $request->salary[$i],
//         'from_date'=>  $request->from_date[$i],
//         'to_date'=> $request->to_date[$i],
//         'experience'=> $request->experience[$i] 
//         ]));
// }
//     }}


    if($request->last_company != ''){
        $get  = DB::table('employee_experiences')->where('employee_unique_id',$request->id)->get();
        if($get->count() > 0){
    
            for($i=0; $i<count($request->last_company); $i++){
            $employee_experiences  = new employee_experiences;
            foreach ($get as $get2) {
    $employee_experiences->where('employee_unique_id', $request->id)->where('last_company', $get[$i]->last_company)->update([
        'last_company' => $request->last_company[$i],
        'last_salary'=> $request->salary[$i],
        'from_date'=>  $request->from_date[$i],
        'to_date'=> $request->to_date[$i],
        'experience'=> $request->experience[$i] 
    ]);
    }
            }
        }

    //     else{
    //     for($i=0; $i<count($qualification_name); $i++){
    //     $enq_education1 = new enq_educations([
    //                 'enquiry_id' =>   $unique_id,
    //                 'class'   => $qualification_name[$i],
    //                 'passing_year'        => $passing_year[$i],
    //                 'percentage'        =>$percentage[$i] ,
    //                 'stream'   =>$edu_stream[$i]  ,
    //                 'education_name'   =>$institute_name[$i]
    //                 ]);
    // $enq_education1->save();
    //     }
    // }
    }  




}


public function bank_detail_edit_form(Request $request){

    $emp_edit = new users;
    return $emp_edit->where('unique_id',$request->id)
    ->update([
        'bank_name' => $request->bank_name,
        'ifsc_code'=> $request->ifsc_code,
        'bank_branch'=>  $request->bank_branch,
        'account_number'=> $request->account_number
    ]);
}

public function delete_emp_document(Request $request){
    
    $employee_documents =new employee_documents;
     $employee_documents->where('id',$request->a)
    ->update([
        'status' => 0
    ]);
    echo     $request->a;
}

public function add_ducument(Request $request){
    // dd($request->employee_documents);
    $img = $request->file('employee_documents');

    
if($request->employee_documents != ''){
    
foreach($img as $image) {
    // dd($img);
                      $destinationPath = "public/uploads/image/agent_document";
      $img =  $request->unique_id.$image->getClientOriginalName();
      $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
      $image  = 'i'.$img ;

$employee_documents = new employee_documents([
    // 'employee_name'  => $request->input('employee_documents'),
    // 'employee_id'  => $employee_id,
    'employee_unique_id'  => $request->unique_id,
    
    'documents'  => $image]);
$employee_documents->save();

}
// dd($employee_documents );
}
return back();
}

}
