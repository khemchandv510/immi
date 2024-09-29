<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\unfollowdata;
use Session;
use App\enquiries;
use DB;
use Auth;
use App\enq_comments;
use App\enq_educations;
class NewClientController extends Controller
{
    public function index(){
$data = Helper::getUpfollowData();
return view('enquiry/new-client', compact(['data']));

    }


    public function take_followup(Request $request){
        $followup = new unfollowdata ;
$get = DB::table('unfollowdata')->where('unique_id', $request->unique_id)->get();


// unncomment if email also exist
// $exist = DB::table('enquiries')->where(function($query) use ($get){
//     $query->where('contact', '==' , $get[0]->mobile)
//     ->orWhere('email', $get[0]->email );})
//     ->whereNotNull('email')
//     ->get();
    
    
    
    
    $exist = DB::table('enquiries')
    ->where('contact', '==' , $get[0]->mobile)
    ->get();
    
    // dd($exist );
    
if(count($exist) == 0){

  
enquiries::Create([
    'unique_id'  =>$get[0]->unique_id,
    'name'        => $get[0]->name,
    'contact'      => $get[0]->mobile,
    'alternate_contact'  => $get[0]->alternet_mobile,
    
    'email'      => $get[0]->email,
    'alterate_email' => $get[0]->alternet_email,  
    'date'       =>date("Y-m-d"),
    'callbacklater' => $request->input('date'),
    'callbacklater_time'    =>$request->time,
    'device'   => 'fa fa-desktop',
    
'disposition'   => $request->status,
'agent_unique_id'  => Auth::user()->unique_id,
'agent_id' => Auth::user()->employee_id,
'agent_name'   =>  Auth::user()->name,
'conversion'   =>0,
'last_comment' =>  $request->comment]);



$enq_comments = new  enq_comments([
    'client_enquiry_id' => $get[0]->unique_id,
    'agent_id' =>   Auth::user()->unique_id,
    'status'  =>  $request->status,
    'comment'  =>$request->comment,
    'calling_date' => $request->input('date'),
            'callbacklater_time'    => $request->time,
            'name'        => $get[0]->name,
            'contact'      => $get[0]->mobile,
            'email'      => $get[0]->email,
            'agent_name'   =>  Auth::user()->name
]) ;
$enq_comments->save();
DB::table('unfollowdata')->where('unique_id', $request->unique_id)->delete();
                 Session::flash('message','You have successfully Picked Up ' .$get[0]->name);
                 return back(); 
    }else{
        Session::flash('message','Already Exist ');
        return back(); 
    }
}

public function unfollowList(Request $request){

    if(Auth::user()->usertype_status == 1){
        $getList = Helper::getAllUnfollowData($request->page);   
        $getStatus  = Helper::getAllStatus();
        $getPurpose = Helper::getPurpose();
        $getAllEmployee = Helper::getAllEmployee();
        return view('enquiry/unfollowup-client', compact(['getList','getStatus', 'getPurpose', 'getAllEmployee']));
    }

}

public function searchUnfollowClient(Request $request){
   
    $where = " where ";
    if(isset($request->agent_id)  && (!empty($request->agent_id))){
    $agent_id =  $request->agent_id;
    $where .= " unfollowdata.agent_unique_id   = '$agent_id'  and"; 
    }
    else{
    $agent_id = "";
    }
    
    
if(isset($request->purpose_of_query) && (!empty($request->purpose_of_query))){
    $purpose_of_query =  $request->purpose_of_query;    
    $where .= " unfollowdata.purpose  = '$purpose_of_query'  and";
    }
    else{
    $purpose_of_query = "";
    }
    
    
    $where .= "    unfollowdata.status=1 ";
    
      $getAllEmployee  = DB::select(DB::raw("SELECT * from unfollowdata  $where "));
      $getList = Helper::getAllUnfollowData($request->page);   
        $getStatus  = Helper::getAllStatus();
        $getPurpose = Helper::getPurpose();

      return view('enquiry/unfollowup-client', compact(['getList','getStatus', 'getPurpose', 'getAllEmployee']));
    
}

public function assignedUnfollowClient(Request $request){
    // $items = array();
    // foreach($request->client_id as  $id) {
    //  $items[] =  $username;
    // }

    

   $id = array_map('intval',  $request->client_id);
   

    unfollowdata::whereIn('unique_id', $id)->update(['agent_unique_id'=> $request->agent_id]);
    $getList = Helper::getAllUnfollowData($request->page);   
    $getStatus  = Helper::getAllStatus();
    $getPurpose = Helper::getPurpose();
    $getAllEmployee = Helper::getAllEmployee();
    return view('enquiry/unfollowup-client', compact(['getList','getStatus', 'getPurpose', 'getAllEmployee']));
}

public function add_lead(){
    return view('add-leads');
}

public function edit_leads(Request $request){
    
    $data = DB::table('enquiries')
    ->where('unique_id',$request->id)
    ->first();
$education = DB::table('enq_educations')
    ->where('enquiry_id',$request->id)
    ->first();
    
    return view('edit-leads', compact('data','education'));
}

public function edit_leads_save(Request $request){
    
    if($request->source == "Other"){
        $request->source = $request->source2;
    }
    
    if(isset($request->dob)){
    $dob = str_replace('/','-', $request->dob);
    $request->dob = date('Y-m-d', strtotime($dob));
        }

    $enquiries = enquiries::where('unique_id',$request->unique_id)
    ->update([
        'name'=>$request->name,
        'alternate_contact'  => $request->alternate_contact,
        'contact'      => $request->contact,
        'email'      => $request->email,
        'dob'        =>  $request->dob ,      
        'date'       =>date("Y-m-d"),
        'source'   => $request->source,
        'gender'  =>$request->gender,
        'purpose_of_query'     => $request->note,
        'disposition'   => $request->status,
        'agent_unique_id'  => Auth::user()->unique_id,
        'agent_id'  =>  Auth::user()->agent_id,
        'agent_name'   =>  Auth::user()->name,

        'last_comment' =>  $request->comment,
        'country' =>  $request->country,
        'callbacklater' => $request->input('date'),
        'callbacklater_time'    =>$request->time,
        ]);
        $enquiries = enq_comments::create([
    'client_enquiry_id' => $request->unique_id,
    'comment'  => $request->comment
    ]);
    
       $enq_educations = enq_educations::updateOrCreate(
            ['enquiry_id'    => $request->unique_id],
            ['class'         => $request->qualification_name
        ]);
      Session::flash('message', "Record Updated Successfully"); 
return back();
    }

}


