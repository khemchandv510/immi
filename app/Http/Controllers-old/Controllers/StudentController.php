<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\enquiries;
use App\student_communications;
use App\user;
class StudentController extends Controller
{
public function index(){
    if(Auth::user()->usertype_status != 1 ){
        // dd(Auth::user()->unique_id);
    $get2 = DB::table('enquiries')
    
    // ->leftjoin('enq_comments','enq_comments.client_enquiry_id', '=','enquiries.unique_id')
    ->where('enquiries.delete_client',1)
    ->where('enquiries.conversion',1)
    ->where('agent_unique_id', Auth::user()->unique_id)
    ->orderBy('enquiries.updated_at','DESC')
    ->paginate(10);
    return view('student.student-list' , compact(['get2']));
    }
    $get2 = DB::table('enquiries')
    
    // ->leftjoin('enq_comments','enq_comments.client_enquiry_id', '=','enquiries.unique_id')
    ->where('enquiries.delete_client',1)
    ->where('enquiries.conversion',1)
    
    ->orderBy('enquiries.updated_at','DESC')
    ->paginate(10);
    return view('student.student-list' , compact(['get2']));
}


public function search(Request $request){
    $where = " where ";
    if(isset($request->agent_id)  && (!empty($request->agent_id))){
    $agent_id =  $request->agent_id;
    $where .= " enquiries.agent_unique_id   = '$agent_id'  and"; 
    }
    else{
    $agent_id = "";
    }
    
    
if(isset($request->purpose_of_query) && (!empty($request->purpose_of_query))){
    $purpose_of_query =  $request->purpose_of_query;    
    $where .= " enquiries.purpose_of_query  = '$purpose_of_query'  and";
    }
    else{
    $purpose_of_query = "";
    }
    
    if(isset($request->status) && (!empty($request->status))){
        $status =  $request->status;    
        $where .= " enquiries.disposition  = '$status'  and";
        }
        else{
        $status = "";
        }

        if(isset($request->search) && (!empty($request->search))){
            $search =  $request->search;    
            $where .= " (enquiries.name  like '%$search%'  or  enquiries.contact  like '%$search%' or enquiries.email  like '%$search%' or enquiries.dob  like '%$search%' )  and ";
            }
            else{
            $search = "";
            }
        
        if(isset($request->filter_date_from) && (!empty($request->filter_date_from))   && (isset($request->filter_date_to) && (!empty($request->filter_date_to))) ){
            $from =  date('Y-m-d', strtotime('30/04/2012'));   
            $to =   date("Y-m-d", strtotime($request->filter_date_to));
            
// $date = "30/04/2012";

// $array = explode("/",$date);
// echo  $array[2].'/'.$array[0].'/'.$array[1];
// dd($from);
            $where .= " enquiries.date  between '$from' and '$to' and ";
            }
            else{
            $from = "";
            $to = "";
            }

        


    $where .= "    enquiries.delete_client=1 and enquiries.conversion = 1 ";
    
$getStudent  = DB::select(DB::raw("SELECT * from enquiries  $where "));


      return view('student.student-list' , compact(['getStudent']));
      

}


public function addStudent(){
    return view('student.add-student');
}

public function studentdashboard(){
    return view('student.student-dashboard');
}
// public function get_list(Request $request){
//       $id = decrypt($request->id);
      
//  $find_agent = DB::table('users')->where('employee_id', $id)->get();
// if($find_agent[0]->usertype_status == 1){

//     $get  = DB::table('enquiries')->where('conversion',1)->where('delete_client','1')->orderBy('id', 'DESC')->paginate(15);
    
// }
// else{
// $get  = DB::table('enquiries')->where('conversion',1)->where('agent_id', $id)->where('delete_client','1')->orderBy('id', 'DESC')->paginate(15);
 
// }

//             // return view('enquiry/enquiry-list', [ 'get' => $get ]);
// // $get  =  enquiries::paginate(15);
//             $new_user  = DB::table('enq_new_users')->where('complete_profile',1)->get();
//             $enq_purposes = DB::table('enq_purposes')->get();
//             $enq_status = DB::table('enq_status')->get();
          
//             return view('student/student-list', compact([ 'get' , 'new_user', 'enq_purposes', 'enq_status' ]));
            
// }

public function getallstudent(Request $request){
    
  return  app('App\Http\Controllers\TabletEnquiryController')->get_list_student($request);  
}

 public function exportCsv(Request $request)
{
   $fileName = 'students-list.csv';
   // $tasks = DB::table('enquiries')
   // ->where('enquiries.delete_client','1')
   // ->where('enquiries.conversion','2')
   // ->orderBy('enquiries.id','DESC')
   // ->get();
    $tasks = enquiries::where('delete_client','=','1')
    ->where('conversion','=','1')->
    orderBy('id','desc')->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id', 'name', 'contact', 'email', 'dob','address_line1','financial_amount','image','country','state','city','history','gender','id_proof_no','father_name','occupation','alternate_contact','address_line2','district','pincode','signature','course_country','course','agent_name');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['id']  = $task->id;
                $row['name']    = $task->name;
                $row['contact']    = $task->contact;
                $row['email']  = $task->email;
                $row['dob']  = $task->dob;
                $row['address_line1']  = $task->address_line1;
                $row['financial_amount']  = $task->efinancial_amount;
                $row['image']  = $task->image;
                $row['country']  = $task->country;
                $row['state']  = $task->state;
                $row['city']  = $task->city;
                $row['history']  = $task->history;
                $row['gender']  = $task->gender;
                $row['id_proof_no']  = $task->id_proof_no;
                $row['father_name']  = $task->father_name;
                $row['occupation']  = $task->occupation;
                $row['alternate_contact']  = $task->alternate_contact;
                $row['address_line2']  = $task->address_line2;
                $row['district']  = $task->district;
                $row['pincode']  = $task->signature;
                $row['course_country']  = $task->course_country;
                $row['course']  = $task->course;
                $row['agent_name']  = $task->agent_name;

                fputcsv($file, array($row['id'], $row['name'],  $row['contact'], $row['email'], $row['dob'], $row['address_line1'], $row['financial_amount'] , $row['image'], $row['country'],$row['state'], $row['city'], $row['history'],$row['gender'],$row['id_proof_no'],$row['father_name'],$row['occupation'], $row['alternate_contact'], $row['address_line2'],$row['district'],$row['pincode'], $row['course_country'], $row['course'],$row['agent_name'] ));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

public function search_filter(Request $request){

    $value = $request->range_filter;
    
    $id = Auth::user()->usertype_status;
    
    $find_agent = DB::table('users')->where('usertype_status', $id)->get();
    if($find_agent[0]->usertype_status == 1){
    
$getStudent  = DB::table('enquiries')->where('delete_client','1')->orderBy('id', 'DESC')->where('conversion',1)->paginate($value);
// $new_user  = DB::table('enq_new_users')->where('complete_profile',0)->get();
// $enq_purposes = DB::table('enq_purposes')->get();
// $enq_status = DB::table('enq_status')->get();
return view('student/student-list', compact([ 'getStudent', 'value' ]));
// return view('enquiry/enquiry-list', compact([ 'get' , 'new_user', 'enq_purposes', 'enq_status','value' ]));
    }else{
      
$getStudent  = DB::table('enquiries')->where('delete_client','1')->where('conversion',1)->where('agent_unique_id',Auth::user()->unique_id)->orderBy('id', 'DESC')->paginate($value);

return view('student/student-list', compact([ 'getStudent', 'value' ]));
    }

    
$getStudent  = DB::table('enquiries')
->where('delete_client','1')
->where('agent_id',$id)
->where('conversion',1)
->orderBy('id', 'DESC')->paginate($value);
$new_user  = DB::table('enq_new_users')->where('complete_profile',0)->get();
$enq_purposes = DB::table('enq_purposes')->get();
$enq_status = DB::table('enq_status')->get();
return view('student/student-list', compact([ 'getStudent' , 'new_user', 'enq_purposes', 'enq_status' ]));

}
public function trash_clients(){
    // $get = DB::table('enquiries')->where('delete_client', '1')->get();
    // $enq_purposes = DB::table('enq_purposes')->get();
    // $enq_status = DB::table('enq_status')->get();    
    return view('student/trash_clients');
}

public function communication_student(Request $request){

    return student_communications::create([
        'enquiry_id'  => $request->id,
        'msg'         =>$request->data,
        'msg_sent_by' =>Auth::user()->unique_id,
        'employee_id' =>Auth::user()->unique_id
    ]);
}

public function get_communication_student(Request $request){

    $ret = 
     DB::table('student_communications')
     ->select('student_communications.enquiry_id','student_communications.employee_id','student_communications.created_at as created_at','student_communications.msg', 'users.name', 'users.image','student_communications.msg_sent_by')
    ->leftjoin('users','student_communications.msg_sent_by','users.unique_id')
     ->where('student_communications.enquiry_id',$request->id)
     ->get();
     return  $ret;
}

}
