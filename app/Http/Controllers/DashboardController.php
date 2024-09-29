<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\users;
use App\login_hours;
use DB;
use App\attendances;
use App\Helpers\Helper;
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
// dd('test');
// if(Auth::user()->usertype_status == "3"){
//     return redirect('enquiry/get-detail/'.Auth::user()->employee_id);
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

    return view('index');
if(Auth::user()->usertype_status == 1){
    
return view('index');
}else{
    
    //return view('dashboard-lead');
}


    }
    
    
    function view_new_leads(Request $request){
         // startfilter
    $type = $request->type ;
// dd($type);
    
    
$where= " where ";
if(isset($request->filter_date_from) && !empty($request->filter_date_from)  && isset($request->filter_date_to) && !empty($request->filter_date_to)){
    $from = $request->filter_date_from;
    $from = str_replace('/', '-', $from);
    $todays_dates = date("d-m-Y");
    $todays = strtotime($todays_dates); 
    $expiration_date2 = strtotime($from);
    $request->filter_date_from2 = (date('Y-m-d',$expiration_date2));
    
    $exp_date = $request->filter_date_to;
    $exp_date = str_replace('/', '-', $exp_date);
    $todays_date = date("d-m-Y");
    $today = strtotime($todays_date); 
    $expiration_date = strtotime($exp_date);
    $request->filter_date_to2 = (date('Y-m-d',$expiration_date));
    $where .=" (date BETWEEN '$request->filter_date_from2' AND '$request->filter_date_to2') and ";
}else{
    $request->filter_date_from ='';
    $request->filter_date_to   ='';
}
if(isset($request->agent_id)   && !empty($request->agent_id) ){
    $where .= " enquiries.agent_unique_id  = '$request->agent_id' and ";
}else{
    $request->agent_id = '';
}
if(isset($request->status)   && !empty($request->status) ){
    $where .= " enquiries.disposition  = '$request->status' and ";
}else{
    $request->status = '';
}

if(isset($request->purpose_of_query)   && !empty($request->purpose_of_query) ){
    $where .= " enquiries.purpose_of_query  = '$request->purpose_of_query' and ";
}else{
    $request->purpose_of_query = '';
}



if(isset($request->searchbox)   && !empty($request->searchbox) ){
    
    $where .= " ( enquiries.name like '%$request->searchbox%' or enquiries.contact like '%$request->searchbox%' or enquiries.email like '%$request->searchbox%' or enquiries.id like '%$request->searchbox%' ) and ";
}else{
    $request->searchbox = '';
}

if(Auth::user()->usertype_status != 1){
    $where .= "  agent_unique_id =  " .Auth::user()->unique_id. " and ";
}
// dd($where);

// dd($request->new_leads);
  if(isset($request->new_leads)   && !empty($request->new_leads) ){
      if($request->new_leads  == "New leads"){
          
          
          
    //   $current_date = date('Y-m-d');
    //      $old_date = date('Y-m-d', strtotime("$current_date -1 month"));
    $where .= "  enquiries.lead_update = 0 and lead_upadte_on IS NULL and ";
      
          
      }
      elseif($request->new_leads  == "Follow Up")
      { 
           $current_date = date('Y-m-d');
         $old_date = date('Y-m-d', strtotime("$current_date -1 month"));

          $where .= " enquiries.disposition IN('Visited','Follow Up','In Progress','Pending')  and ";
          
      } 
      elseif($request->new_leads  == "Future Leads"){ 
          $where .= " enquiries.disposition IN('Future Lead')  and ";   
      }
      
      elseif($request->new_leads  == "Dead Leads"){ 
          $where .= " enquiries.disposition IN('Dead Lead')  and ";   
      }
      elseif($request->new_leads  == "Birthday"){
           $where .= " enquiries.dob != 'NULL'  and ";   
      }
      
      
      
      elseif($request->new_leads  == "New Students"){ 
           $where .= " enquiries.lead_update = 0 and ";
      }
      
      elseif($request->new_leads  == "Students Follow Up"){ 
            $where .= " enquiries.disposition IN('Visited','Follow Up','In Progress','Pending')  and ";
      }
      
      elseif($request->new_leads  == "Students Future Lead"){ 
            $where .= " enquiries.disposition IN('Future Lead')  and ";   
      }
      
      elseif($request->new_leads  == "Students Dead Lead"){ 
            $where .= " enquiries.disposition IN('Dead Lead')  and ";   
      }
      
      elseif($request->new_leads  == "Students Birthday"){  
             $where .= " enquiries.dob != 'NULL'  and ";   
      }
      
      elseif($request->new_leads  == "Students Payment"){ 
             $where .= " enquiries.payment_done = 1  and disposition = 'Payment Done' and ";   
      }
      
      elseif($request->new_leads  == "Students Payment Pending"){ 
             $where .= " enquiries.payment_done = 0  and disposition ='Payment Pending' and ";   
      }
      
      
    //   elseif($request->new_leads  == "Students Dead Lead"){ 
    //       $where .= " enquiries.lead_update = 0 and ";
    //   }
      
    //     elseif($request->new_leads  == "Student Birthday"){ 
    //       $where .= " enquiries.dob != 'NULL'  and ";   
    //   }
      
      
}else{
    $request->new_leads = '';
}
 $user = Auth::user()->unique_id;
 $where .= " enquiries.delete_client = 1 and  agent_unique_id = '$user' and " ;

if(isset($request->shortby)   && !empty($request->shortby) ){

    
  
   if($request->shortby == "Name"){
    
    $orderby = " ORDER BY enquiries.name ASC ";
}elseif($request->shortby == "Date"){
    
    $orderby = " ORDER BY enquiries.date DESC ";
}
elseif($request->shortby == "Email/phone number"){
    
    $orderby = " ORDER BY enquiries.email ASC ";
}elseif($request->shortby == "Id"){
    $orderby = " ORDER BY enquiries.id DESC ";
}else{
    $orderby = " ORDER BY enquiries.id DESC ";
    }}else{
$orderby = " ORDER BY enquiries.id DESC ";
    }

   $where .= "    conversion = ".$type . $orderby ;
   
 
// dd("SELECT * from enquiries  $where");
  
$search  = DB::select(DB::raw("SELECT * from enquiries  $where "));
// dd($search);
        // $arr = DB::table('enquiries');
        // $arr->where('delete_client',1);
        
        // $arr->where('agent_unique_id',Auth::user()->unique_id);
        
        // if($request->new_leads){ 
        //  $current_date = date('Y-m-d');
        //  $old_date = date('Y-m-d', strtotime("$current_date -1 month"));
        
        //  $arr->where("date", ">=", $old_date);
        // }
    // $search =     $arr->get();
    // dd($search);
       $search =(collect($search));
   if(isset($request->page)){
       $page = $request->page;
   }else{
   $page = 1;  
   }
   if(isset($request->range_filter)){
    $range_filter = $request->range_filter;
}else{
$range_filter = 10;  
}
    
    $get = new \Illuminate\Pagination\LengthAwarePaginator(
    $search->forPage($page, $range_filter),
    $search->count(),
    $range_filter,
    $page,
    ['path' => url('/view-new-leads'), "pageName" => "page"]
    );
  
        if(isset($request->new_leads )){
            $req =  $request->new_leads;
        }
        // dd($req);
        // return view('view-all/new-leads', compact('get' ))
        // ->with('new_leads',$req);
        
        
$enq_status = DB::table('enq_status')->get();
 $enq_purposes = DB::table('enq_purposes')->get();
        
        
          return view('view-all/new-leads', compact([ 'get', 'enq_status','enq_purposes' ]) )
        ->with('filter_date_from',$request->filter_date_from)
        ->with('filter_date_to',$request->filter_date_to)
        ->with('agent_id',$request->agent_id)
        ->with('status', $request->status)
        ->with('purpose_of_query', $request->purpose_of_query)
        ->with('search2',$request->searchbox)
        ->with('shortby2',$request->shortby)
        ->with('showentry',$request->range_filter)
        ->with('arr2', $request->shortby)
        ->with('new_leads',$req)
        ;
        
        
        
        
      
    }
}


