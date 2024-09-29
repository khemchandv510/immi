<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Helpers\Helper;
use App\enquiries;
use App\Task;
use Session;
use App\users;
class TaskManagement extends Controller
{
    


        public function index(Request $request){
             

// dd($request->review);
            if(Request()->segment(2) == 'edit-task'){
                $gets = Task::find($request->id);
                $request->assigned_to  =  $gets->assigned_to;
             $request->client_unique_id = $gets->belonged_client;
             $request->task   =  $gets->task;
     $request->due_date       =   $gets->due_date;

   
                }
                
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
         $where .=" ( task.due_date BETWEEN '$request->filter_date_from2' AND '$request->filter_date_to2') and ";
     }else{
         $request->filter_date_from ='';
         $request->filter_date_to   ='';
     }
     if(isset($request->agent_id)   && !empty($request->agent_id) ){
         $where .= " task.assigned_to  = '$request->agent_id' and ";
     }else{
         $request->agent_id = '';
     }
     if(isset($request->task_status)   ){
         $where .= " task.task_status  = '$request->task_status' and "; 
     }else{
         $request->task_status = ''; 
     }
     
     if(isset($request->review)   && !empty($request->review) ){
        if($request->review == 2)
        {
            $request->review = 0;
         $where .= " task.review  = '$request->review' and ";
        }
    }else{
        $request->review = '';
    }
    // dd($request->review);
    

     if(isset($request->searchbox)   && !empty($request->searchbox) ){
         
         $where .= " ( task.task_completed_comment like '%$request->searchbox%' or task.task like '%$request->searchbox%'  ) and ";
     }else{
         $request->searchbox = '';
     }
     
     if(Auth::user()->usertype_status == 4){
         $where .= "  task.assigned_to =  " .Auth::user()->unique_id. " and ";
     }
     
     if(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){
        // dd(Auth::user()->unique_id, Auth::user()->usertype_status);
         $where .= "  task.assigned_by =  " .Auth::user()->unique_id. " and ";
     }

      $where .= " task.status = 1  ORDER BY id DESC ";

        if(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){ 
            
          

         $search = DB::select(DB::raw(" SELECT task.id as id,  task.due_date as due_date, task.task_completed_comment as task_completed_comment, task.belonged_client as belonged_client, task.task as task, task.assigned_by as assigned_by, users.name as name, task.assigned_to as assigned_to, task.task_status as task_status, task.review as review   from task join users on task.assigned_by = users.unique_id  $where "));
         
        }
     else{
     $search  = DB::select(DB::raw(" SELECT * from task  $where "));
     }
    
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
         ['path' => url(request()->segment(1).'/task-management'), "pageName" => "page"]
         );
     
        
     
      $exp_date = $request->filter_date_from;
             $exp_date = str_replace('-', '/', $exp_date);
             $request->filter_date_from  = ($exp_date);
             if(Auth::user()->usertype_status == 1){
             $agent_id2 = Helper::getTotalEmployee();      
             }
             elseif(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 5){
                 
            $agent_id2  = users::getEmployeeByCompany(Auth::user()->unique_id);
             
             
                 
             }else{
                $agent_id2 =[];
             }
 //dd( $agent_id2 , Auth::user()->unique_id);
    //    dd($request->review );
                 $id = $request->id;
                    $get2 = $get;
                    
             return view('task-management', compact([ 'get2',  'agent_id2','id' ]) )
             ->with('filter_date_from',$request->filter_date_from)
             ->with('filter_date_to',$request->filter_date_to)
             ->with('client2',$request->client_unique_id)
             ->with('status', $request->task_status)
             ->with('agent_id', $request->agent_id)
             ->with('search2',$request->searchbox)
             ->with('task',$request->task)
             ->with('due_date', $request->due_date)
             ->with('showentry',$request->range_filter)
             ->with('assigned_to', $request->assigned_to)
            ->with('review', $request->review)
             ;
             
                 
         
     
    }
    
    public function add_task(Request $request){
  
        if(isset($request->due_date)){
  $d = explode('/', $request->due_date);  
  $due_date =    date("$d[2]-$d[1]-$d[0]");
  }else{
      $due_date = '';
  }

 $id =  str_replace('IC','',$request->client_unique_id);
    $gets = enquiries::find($id);
if(isset($gets->unique_id)){
    $request->client_unique_id =  $gets->unique_id;
}
        Task::updateOrCreate(['id' => $request->id],
[              'belonged_client' => $request->client_unique_id,
              'created_by'  => Auth::user()->unique_id,
              'assigned_by' => Auth::user()->unique_id,
              'assigned_to' => $request->assigned_to,
              'task'        => $request->task_details,
            //   'task_status' => 0,
              'due_date'    => $due_date
        ]);
        session::flash('message','Task Added Successfully!');
        return back();
        return view('task-management');
    }

    public function update_task_status(Request $request){
        // dd($request);
        Task::where('id', $request->id)->update([
            'id'  =>   $request->id,
            'task_completed_comment' => $request->task_details,
            'task_status' =>$request->processing
        ]);
        session::flash('message','Task Updated Successfully!');
        return back();
    }

public function edit_task(Request $request){
    
        $gets = Task::find($request->id);
        $request->assigned_to  =  $gets->assigned_to;
     
     $request->client_unique_id = $gets->belonged_client;

     $request->task   =  $gets->task  ;
$request->due_date       =   $gets->due_date;
           return view('task-management')
           ->with('assigned_to', $request->assigned_to)
           ->with('client_unique_id', $request->client_unique_id)
           ->with('task', $request->task)
           ->with('due_date', $request->due_date);
}



public function delete_task(Request $request){
    Task::where('id', $request->id)->update([
        'status' => 0
    ]);
    session::flash('message','Task Deleted Successfully!');
    return back();
}

public function update_task_review(Request $request){
    $a = Task::find($request->id);
    
  return  Task::where('id', $request->id)->update([
        'review' => !$a->review
    ]);
    // session::flash('message','Task Deleted Successfully!');
    // return back();
}


}
