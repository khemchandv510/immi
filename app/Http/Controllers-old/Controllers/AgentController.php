<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Requests\AgentRequest;
use App\users;
use App\enquiries;
use App\enq_asign_clients;
use App\knowledgebases;
use App\login_hours;
use App\knowledgebase_categories;
use App\enq_comments;
use App\employee_documents;
use App\employee_experiences;
use App\enq_asign_alls;
use Auth;
use App\Http\Requests\KnowledgebaseRequest;

class AgentController extends Controller
{
    public function create_agent(AgentRequest $request){
        // dd($request->salary);
        $unique_id  =  mt_rand(10000000,99999999);
        $employee_id  = mt_rand(1000,9999);
        $employee_id  = 'Emp_'.$employee_id ;


// this is for upload document
$img = $request->file('employee_documents');
if($img != ''){
foreach ($img as $image) {
                      $destinationPath = "public/uploads/image/agent_document";
      $img =  $unique_id.$image->getClientOriginalName();
      $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
      $image  = 'i'.$img ;



$employee_documents = new employee_documents([
    'employee_name'  => $request->input('name'),
    'employee_id'  => $employee_id,
    'employee_unique_id'  => $unique_id,
    'documents'  => $image]);
$employee_documents->save();
}
}
    
// end of document upload



        $image = $request->file('image');
        if($image != ''){
                              $destinationPath = "public/uploads/image/agent";
              $img =  $unique_id.$image->getClientOriginalName();
              $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
              $image  = 'i'.$img ;
       }  
        $users = new users([
            'name'  => $request->input('name'),
            'number'  => $request->input('contact'),
            'dob'  => $request->input('dob'),
            'email'  => $request->input('agent_email'),
            'password' => Hash::make($request['password']),
            'country'  => $request->input('country'),
            'state'  => $request->input('state'),
            'city'  => $request->input('city'),
            'street'  => $request->input('street'),
            'pin'  => $request->input('pin') ,
            'employee_id' => $employee_id,
            'unique_id'   => $unique_id,
            'image'  => $image ,
            'designation'   => $request->designation,
            'salary'  => $request->salary,
            
            'office_id' => $request->office_id,
            'joinint_date' => $request->joining_date,
            'domain' => $request->employee_domain,
            'total_experience' => $request->total_experience,
            'bank_name' => $request->employee_bank_name,
            'account_number'  =>    $request->employee_account_number,
            'ifsc_code'  => $request->employee_ifsc,
            'bank_branch' => $request->employee_branch,
            'usertype_status' => $request->employee_category

        ]);
 
        $users->save();
        if($request->last_company != ''){
            $arr = count($request->last_company);
for($i=0; $i<$arr; $i++ ){
        $emp_exp = new employee_experiences([
            'employee_unique_id' => $unique_id,
            'last_company'  => $request->last_company[$i],
            'last_salary' => $request->last_salary[$i],
            'from_date'   => $request->from_date[$i],
            'to_date'  =>  $request->to_date[$i],
            'experience' => $request->experience[$i],
            'date'  => date('Y-m-d')
]);
$emp_exp->save();
        }}
        // return view('enquiry/existing-user');
        // return  app('App\Http\Controllers\EnquiryController')->existing_user();  
        return app('App\Http\Controllers\AgentController')->existing_agent();
    }




    public function existing_agent(){
        $users =  DB::table('users')->where('status' , '1')
                    ->orderBy('id','DESC')
        ->get();
        return view('agent', compact(['usres']));
    }

    public function delete_agent(Request $id){
        $a = $id->a;
        
    
            $users = new users; 
    return       $users->where('employee_id',$a)->update(['status' => '0']);
    
    }

    public function update_agent_profile(Request $request){
            $id =$request->id;
            
         $update_users =   DB::table('users')->where('status',1)->where('employee_id', $request->id)->get();
         
         return view('agent', compact(['update_users','id']));
    }

    public function update_agent(Request $request){
        $unique_id  =  mt_rand(10000000,99999999);

        $image = $request->file('image');
        if($image != ''){
                              $destinationPath = "public/uploads/image/agent";
              $img =  $unique_id.$image->getClientOriginalName();
              $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
              $image  = 'i'.$img ;
       }  
       else{
          $image =  db::table('users')->where('employee_id', $request->id)->select('image')->get();
          $image =   $image[0]->image;
       }

        $users = new users; 
              $users->where('employee_id',$request->id )->update([
            'name' => $request->name,
            
            'number' => $request->contact,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' =>Hash::make($request['password']),
            'country' => $request->country,
            'state' =>  $request->state,
            'city' =>  $request->city,
            'street' => $request->street,
            'pin' => $request->pin,
            'image' => $image,
            ]);
            return redirect()->action('AgentController@existing_agent');
    }

    public function trace_login(Request $request){
        $a = $request->a;
        date_default_timezone_set('Asia/Kolkata');              
        $users = new users;
                                           $users->where('employee_id',$a)->update([
                                             'login_trace' => 0
                                         ]); 


                                         $id = login_hours::select('id','start_time')->max('id');
                     $g = DB::table('login_hours')->where('id',$id)->get();
                     
                                         if($g[0]->start_time == null){
                                            $test = new login_hours;
                                            $test->where('employee_id', $a)->where('date',  date('Y-m-d'))->where('id',$id)
                                            ->update([
                                            'start_time'  => date("H:i:s")
                                            ]);       
                                         }
                                         
$test = new login_hours;
$test->where('employee_id', $a)->where('date',date('Y-m-d'))->where('id',$id)
->update([
'end_time'  => date("H:i:s")
]);
$get = DB::table('login_hours')->where('employee_id', $a)->where('date',date('Y-m-d'))->where('id',$id)->get();
   $time_calculate =   (strtotime($get[0]->end_time) - strtotime($get[0]->start_time));
   
                                                                                   
$test = new login_hours;
$test->where('employee_id', $a)->where('date',date('Y-m-d'))->where('id',$id)
->update([
'time_calculate'  => $time_calculate/60
]);



// $get = DB::table('login_hours')->where('employee_id', $a)->where('date',date('Y-m-d'))->get();
//       $time =  ( strtotime(date("Y-m-d h:i:s")) - strtotime($get[0]->start_time) );
//       $login_hours = new login_hours([
//             'employee_id' => $a,
//             'time_calculate' =>$time,
//             'date'  => date('Y-m-d')
//         ]);
//         $login_hours->save();

//         $hold = DB::table('login_hours')->where('employee_id', $a)->where('date',date('Y-m-d'))->SUM('time_calculate');
    

$login_hours = new login_hours;
$login_hours->where('employee_id', Auth::user()->employee_id)->where('date',date('Y-m-d'))
->update([
    'check_already_login' => 1
]);
}
        public function pause_login(Request $request){
            date_default_timezone_set('Asia/Kolkata');
            $id = login_hours::select('id')->max('id');
            
            $pause = new login_hours([
                'date' =>date('Y-m-d'), 
                'employee_id' => Auth::user()->employee_id,
                'employee_unique_id' => Auth::user()->unique_id,
                'name' => Auth::user()->name,
                'start_time' => date("H:i:s") 
                
            ]);
            $pause->save();
           
            // $pause->where('employee_id', $request->a)->where('date',date('Y-m-d'))->where('id',$id)
            // ->update([
            // 'end_time'  =>null,
            // 'start_time' =>null
            // ]);
        }

 



public function asign_client(Request $request){
    $ok2 = explode(',',$request->id);

    $agent = DB::table('users')->where('unique_id',$request->asign_client)->get();
    

    $get_client = DB::table('enquiries')
    ->whereIn('unique_id',$ok2)
    ->get();
    

foreach($get_client as $c){
    $enq_asign_clients = new  enq_asign_clients([
        'unique_id'  =>  $unique_id = mt_rand(11111111,99999999),
        'from_agent_unique_id' => $c->agent_unique_id ,
        'from_agent_id' =>  $c->agent_id,
        'from_agent_name' =>  $c->agent_name, 
        'client_enquiry_id' => $c->unique_id,
      
        'comment'  =>$request->asign_comment,
        'client_name'        => $c->name,
      
        'date'  =>date('Y-m-d'),
      
    ]);
    $enq_asign_clients->save();
    }


  $client = new enquiries;
  $client->whereIn('unique_id',$ok2)
            ->update([
                'agent_id' => $agent[0]->employee_id,
                'agent_name'=> $agent[0]->name,
                'agent_unique_id' => $agent[0]->unique_id
            ]);
            foreach($get_client as $c){
            $enq_asign_clients = new  enq_asign_clients;
            $enq_asign_clients->where('unique_id',$unique_id)
            ->update([
                'agent_name'   => $agent[0]->name ,
                'agent_id'  =>  $agent[0]->employee_id,
                'agent_unique_id' =>$agent[0]->unique_id 
            ]);


            $enq_comments = new enq_comments([
                'client_enquiry_id'=> $get_client[0]->unique_id,
                'comment'  =>$request->asign_comment,
                'agent_id'        => Auth::user()->employee_id,
                'agent_name' => Auth::user()->name,
                'name' => $agent[0]->name
            ]);
            $enq_comments->save();
            }
        return back();   
// dd($agent[0]->unique_id);

        }


public function asign_client_list(){
    $assign_client =  DB::table('enq_asign_clients')
    // ->where('status',1)
    ->select('client_enquiry_id','client_name')
    // ->groupBy('client_enquiry_id','client_name')
    ->orderBy('id','DESC')
    // all('total','client_enquiry_id');
   
    ->paginate(10);
    // dd($clients);
    return view('enquiry/asign-client-list',compact('assign_client'));
}

public function profile(){
    return view('profile/profile');
}



public function add_knowledgebase(Request $request){
    $unique_id  =   mt_rand(11111111,99999999);
    $audio   =  $request->audio;
  $image = $request->file('audio');
if($image != ''){
      $destinationPath = "public/uploads/knowledgebase";
    $img =  $unique_id.$image->getClientOriginalName();
    $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
    $image  = 'i'.$img ;
}  
else{
$image  ="audio_name";
}
  $knowledgebases = new  knowledgebases([
        'unique_id'  =>  $unique_id,
        'heading' => $request->heading ,
        'language' =>  $request->language, 
        'description' =>$request->description,
        'audio'     =>$request->audio]);
        $knowledgebases->save();
        return back();
}

public function add_category_knowledgebase(KnowledgebaseRequest $request){
    $knowledgebase_category = new  knowledgebase_categories([
        'unique_id'  =>  mt_rand(11111111,99999999),
        'category' =>  $request->category,
        'language' =>  $request->language
    ]);
    $knowledgebase_category->save();
    return back();
}


public function time_notification(Request $request){
    
    $enq_comments = new enq_comments;
    $enq_comments->where('client_enquiry_id',$request->a)
    ->update(['time_notification_status' =>'0']);
}


public function search_heading(Request $request){
    
    $knowledgebase_search =  DB::table('knowledgebases')->where('heading', $request->knowledgenase_heading)->where('status',1)->get();
    // return back(); compact(['knowledgebase_search']));
    // return redirect()->back()->with('knowledgebase_search', $knowledgebase_search);
    // return redirect()->back()->with('success', 'IT WORKS!');
    return view('knowledge-base/knowledge-base',compact(['knowledgebase_search']));
    // return back();
    
}


public function assign_all_client(Request  $request){

    
    $asign_client_from = (int) filter_var($request->asign_client_from, FILTER_SANITIZE_NUMBER_INT);
    $asign_client_to = (int) filter_var($request->asign_client_to, FILTER_SANITIZE_NUMBER_INT);
    
// dd($asign_client_from);

    $get = DB::table('users')
            ->where('status',1)
            ->where('unique_id',$asign_client_to)
            ->get();
            // dd($get);

foreach($get as $g){
    // dd($g->agent_unique_id, $g->agent_id, $g->agent_name, $asign_client_from);
        $t =  new enquiries;
                        $t->where('agent_unique_id',$asign_client_from)
                        ->update([
                            'agent_unique_id' =>$g->unique_id,
                            'agent_id'   =>    $g->employee_id,
                            'agent_name' =>    $g->name
                        ]);  
}
// dd($t, $asign_client_from, $asign_client_to);

date_default_timezone_set('Asia/Calcutta');
$unique_id = mt_rand(11111111,99999999);

$insert = new enq_asign_alls([
'unique_id'  =>$unique_id,
'from_unique_id'  =>$asign_client_from,
'to_unique_id'  =>$asign_client_to,
'date'          => now(),
'comment'    =>  $request->comment
]);
   $insert->save();             

return back();
}



public function search_assign_client(Request $request){

$type = $request->type ;

    
    
$where= " where ";
if(isset($request->agent_id)   && !empty($request->agent_id) ){
    $where .= " agent_unique_id  = '$request->agent_id' and ";
}else{
    $request->agent_id = '';
}


if(isset($request->status)   && !empty($request->status) ){
    $where .= " from_agent_unique_id  = '$request->from_agent_unique_id' and ";
}else{
    $request->status = '';
}




if(isset($request->searchbox)   && !empty($request->searchbox) ){
    
    $where .= " ( agent_name like '%$request->searchbox%' or agent_id like '%$request->searchbox%' or client_name like '%$request->searchbox%' or from_agent_name like '%$request->searchbox%' ) and ";
}else{
    $request->searchbox = '';
}


$where .= "    id != '". NULL ."' ORDER BY id DESC " ;
// dd($where); 

$assign_client =  DB::table('enq_asign_clients')->get();

// ->select('client_enquiry_id','client_name')



$search  = DB::select(DB::raw(" SELECT * from enq_asign_clients  $where "));

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

$search =(collect($search));
$assign_client = new \Illuminate\Pagination\LengthAwarePaginator(
    $search->forPage($page, $range_filter),
    $search->count(),
    $range_filter,
    $page,
    ['path' => url('enquiry/asign-client-list'), "pageName" => "page"]
    );

    return view('enquiry/asign-client-list', compact([ 'assign_client']) )
    ->with('agent_id',$request->agent_id)
    ->with('from_assign_id',$request->from_agent_unique_id)
    ->with('searchbox',$request->searchbox)
    
    
    ;
}


}


