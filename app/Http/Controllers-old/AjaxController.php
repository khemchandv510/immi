<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\enquiries;
use DB;

class AjaxController extends Controller
{
    public function getDepartment(Request $request){
        $branch= join("','", $request->branch);
        
    
    
    
        // $stream = DB::select(DB::raw("SELECT usertype_status FROM courses where `usertype_status` IN('$level') group by stream"));
    
        $output = '';
            
            
    
            $output .= '<option value="0">Admin</option>';
            $output .= '<option value="1">Excecutive</option>';
        return ($output);
    }

public function adminFilterdashboard(Request $request){
    
    
    
    $where = " where";
    if(isset($request->users) &&  (!empty($request->users))){

     $users = join("','",$request->users);
       $where .= " enquiries.agent_unique_id IN ('".$users."') ";
    }
    else{
        $users = "";
    }
    if(isset($request->from_date) &&  (!empty($request->from_date))   && (isset($request->to_date) &&  (!empty($request->to_date)))){
        $from_date = date('Y-m-d',strtotime($request->from_date));
        $to_date = date('Y-m-d',strtotime($request->to_date)); 
$where .= " and (enquiries.date BETWEEN '$from_date' AND '$to_date') ";
    }else{
        $from_date ="";
$to_date ="";
    }


    if(isset($request->country) &&  (!empty($request->country))){

        $country = join("','",$request->country);
        
          $where .= "and enquiries.course_country IN ('".$country."') ";
       }
       else{
           $country = "";
       }

    $walkin = count(DB::select(DB::raw("SELECT * from enquiries $where and delete_client = '1' and  disposition != 'DND'" )));
    $all = count(DB::select(DB::raw("SELECT * from enquiries $where and delete_client = '1' ")));
   
    $active = count(DB::select(DB::raw("SELECT * from enquiries $where and delete_client = '1' and disposition = 'DND'")));
    $source = count(DB::select(DB::raw("SELECT * from enquiries $where and delete_client = '1' and source = 'google' ")));

    $recentlyActivity1   = DB::SELECT(DB::raw("SELECT `id`,`name`,`client_enquiry_id`,`created_at`,`status` FROM enq_comments where  enq_comments.employee_unique_id IN ('".$users."')   ORDER BY id DESC "  ));
    
//     = DB::table('enq_comments')->select('id','name','client_enquiry_id','created_at','status')
// ->where('agent_id',Auth::user()->employee_id)
// ->orderBy('id','ASC')
// ->limit(5)
// ->get();
// $app = ''; 
// foreach($recentlyActivity1 as $a){
// $app .= '<tr><td style="padding-top:7px;"><p style="color:blue;">'.$a->name?$a->name:'-'.'</p><p style="margin-bottom:0px;">'.$a->status.'<small style="margin-left:170px;"><i class="fa fa-clock-o" aria-hidden="true"></i> <small>    Posted</small></p></td></tr>';
// }

return array($walkin, $active, $all,$source, $recentlyActivity1) ;

   } 
    // elseif($source == 'active'){
    //     $getAllClientForAdmin = count(self::where('delete_client',1)->where('disposition','!=','Not Intrested')->whereOr('disposition','!=','DND')->get());    
    // }
    // elseif($source == 'inactive'){
    //     $getAllClientForAdmin = count(self::where('delete_client',1)->where('disposition','=','Not Intrested')->whereOr('disposition','=','DND')->get());    
    // }
    // else{
    //     $getAllClientForAdmin = count(self::where('delete_client',1)->where('source',$source)->get());
    // }
    // return $getAllClientForAdmin;

public function conversion(Request $request){
    
return    enquiries::where('unique_id',$request->unique_id)
    ->update([
        'conversion'=>$request->data,
        'updated_at'=>now()  
    ]);

}

}
