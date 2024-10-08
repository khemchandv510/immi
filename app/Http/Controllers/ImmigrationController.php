<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\countries;
use App\states;
use App\cities;
use App\enquiries;
use App\enq_educations;
use App\enq_exam_scores;
use App\enq_experiences;
use App\enq_imm_historys;
use App\enq_marriages;
use App\enq_course_enrolls;
use App\enq_new_users;
use App\enq_oet_scores;   
use App\enq_financials;
use App\enq_visa_rejected_countrys;
use App\enq_travelled_historys;
use App\enq_comments;
use App\enq_purposes;
use App\enq_exist_client_purposes;
use App\enq_asign_clients;
use App\gre_gmat_language_scores;
use Redirect;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;

class ImmigrationController extends Controller
{
 public function add(){
    return view('immigration.add-immigration');
 }

    public function index(){
        $getStudent = DB::table('enquiries')
        ->where('enquiries.delete_client',1)
        ->where('enquiries.conversion',2)
        
        ->orderBy('enquiries.id','DESC')
        ->get();
        
        return view('immigration.immigration-list' , compact(['getStudent']));
    }

    public function listDetails($id){
        $getStudent = DB::table('enquiries')
        ->where('enquiries.unique_id',$id)
        ->first();        
        // dd($getStudent);
        return view('immigration.process', compact('getStudent'));
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
                $from =  date("Y-m-d", strtotime($request->filter_date_from));   
                $to =   date("Y-m-d", strtotime($request->filter_date_to));
                
    
                $where .= " enquiries.date  between '$from' and '$to' and ";
                }
                else{
                $from = "";
                $to = "";
                }
    
            
    
    
        $where .= "    enquiries.delete_client=1 and enquiries.conversion = 2 ";
        
    $getStudent  = DB::select(DB::raw("SELECT * from enquiries  $where "));
          
          return view('immigration.immigration-list' , compact(['getStudent']));
          
    
    }
//      public function add(){
//         return view('institute.add_institute');
//     }
    public function add_immigration(Request $request){
        
    enquiries::create([
        'name'=>$request->name,
        'unique_id' => mt_rand(11111111,99999999),
        'alternate_contact'  => $request->alternate_contact,
        'contact'      => $request->contact,
        'email'      => $request->email,
        'date'       =>date("Y-m-d"),
        'callbacklater' => $request->input('date'),
        'callbacklater_time'    =>$request->time,
        'device'   => 'fa fa-desktop',
        'purpose_of_query'     => $request->note,
    'disposition'   => $request->status,
    'agent_unique_id'  => Auth::user()->unique_id,
    'agent_id'  =>  Auth::user()->agent_id,
    'agent_name'   =>  Auth::user()->name,
    'source' =>$request->source,
    'last_comment' =>  $request->comment,
    'conversion'  =>2
        ]);

    
    return redirect()->route('immigration-list');
}
public function dashboard(){
    return view('immigration.immigration-dashboard');
}
 public function exportCsv(Request $request)
{
   $fileName = 'immigration-list.csv';
   // $tasks = DB::table('enquiries')
   // ->where('enquiries.delete_client','1')
   // ->where('enquiries.conversion','2')
   // ->orderBy('enquiries.id','DESC')
   // ->get();
    $tasks = enquiries::where('delete_client','=','1')
    ->where('conversion','=','2')
    ->OrderBy('id','desc')->get();
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
    
$getStudent  = DB::table('enquiries')->where('delete_client','1')->orderBy('id', 'DESC')->where('conversion',2)->paginate($value);
// $new_user  = DB::table('enq_new_users')->where('complete_profile',0)->get();
// $enq_purposes = DB::table('enq_purposes')->get();
// $enq_status = DB::table('enq_status')->get();
return view('immigration/immigration-list', compact([ 'getStudent', 'value' ]));
// return view('enquiry/enquiry-list', compact([ 'get' , 'new_user', 'enq_purposes', 'enq_status','value' ]));
    }else{
      
$getStudent  = DB::table('enquiries')->where('delete_client','1')->where('conversion',2)->where('agent_unique_id',Auth::user()->unique_id)->orderBy('id', 'DESC')->paginate($value);

return view('immigration/immigration-list', compact([ 'getStudent', 'value' ]));
    }

    
$getStudent  = DB::table('enquiries')
->where('delete_client','1')
->where('agent_id',$id)
->where('conversion',2)
->orderBy('id', 'DESC')->paginate($value);
$new_user  = DB::table('enq_new_users')->where('complete_profile',0)->get();
$enq_purposes = DB::table('enq_purposes')->get();
$enq_status = DB::table('enq_status')->get();
return view('immigration/immigration-list', compact([ 'getStudent' , 'new_user', 'enq_purposes', 'enq_status' ]));

}

public function getallimmigration(Request $request){
    
  return  app('App\Http\Controllers\TabletEnquiryController')->get_list_immigration($request);  
}
 public function trash_clients(){
    // $get = DB::table('enquiries')->where('delete_client', '1')->get();
    // $enq_purposes = DB::table('enq_purposes')->get();
    // $enq_status = DB::table('enq_status')->get();    
    return view('immigration/trash_clients');
}

public function registration(){
    // dd('test');
    
    return view('immigration/registration');
}

public function immigrationDetails($id){
    return view('immigration.detail');
}

 public function immigrationProcess($id){
    return view('immigration.process');
}


public function pdfgenerate($id){

    $getStudent = DB::table('enquiries')
    ->where('enquiries.unique_id',$id)->first();

    $getStudentArray = (array) $getStudent;


        $data = [
                'name' => "ritik",
                'email' => 'ritik@test.com',
                'phone' => '1234567890'
        ];
     
        $pdf = Pdf::loadView('immigration.956-form',$getStudentArray);
     
        return $pdf->stream();

}

}
