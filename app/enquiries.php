<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class enquiries extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];


public static function getUpfollowData(){
    $client = self::where('follow_up_status',0)->inRandomOrder()->limit(1)->get();
    
    return $client;
}

public static function getWorkedClientByUser($id){
    $getWorkedClientByUser = self::where('agent_unique_id',$id)->get();
    return $getWorkedClientByUser;
}

public static function getAllClientForAdmin($source){
    if(Auth::user()->usertype_status ==1 ){
    if($source == 'all'){
        $getAllClientForAdmin = count(self::where('delete_client',1)->get());    
    }
    elseif($source == 'active'){
        $getAllClientForAdmin = count(self::where('delete_client',1)->where('disposition','!=','Not Intrested')->whereOr('disposition','!=','DND')->get());    
    }
    elseif($source == 'inactive'){
        $getAllClientForAdmin = count(self::where('delete_client',1)->where('disposition','=','Not Intrested')->whereOr('disposition','=','DND')->get());    
    }
    else{
        $getAllClientForAdmin = count(self::where('delete_client',1)->where('source',$source)->get());
    }
    return $getAllClientForAdmin;
    }
    
    elseif(Auth::user()->usertype_status ==4){
          if($source == 'all'){
        $getAllClientForAdmin = count(self::where('delete_client',1)
        ->where('agent_unique_id', Auth::user()->unique_id)
        ->whereIn('conversion',[0,1])
        ->get());    
        //dd($getAllClientForAdmin, Auth::user()->unique_id);
    }
    elseif($source == 'active'){
        $getAllClientForAdmin = count(self::where('delete_client',1)
        ->where('agent_unique_id', Auth::user()->unique_id)
        ->whereIn('conversion',[0,1])
        ->where('disposition','!=','Not Intrested')->whereOr('disposition','!=','DND')->get());    
    }
    elseif($source == 'inactive'){
        $getAllClientForAdmin = count(self::where('delete_client',1)
        ->where('agent_unique_id', Auth::user()->unique_id)
        ->whereIn('conversion',[0,1])
        ->where('disposition','=','Not Intrested')->whereOr('disposition','=','DND')->get());    
    }
    else{
        $getAllClientForAdmin = count(self::where('delete_client',1)
        ->where('agent_unique_id', Auth::user()->unique_id)
        ->whereIn('conversion',[0,1])
        ->where('source',$source)->get());
    }
    return $getAllClientForAdmin;
    }
    
    elseif(Auth::user()->usertype_status ==5){
          if($source == 'all'){
        $getAllClientForAdmin = count(self::where('delete_client',1)
        ->leftjoin('users','enquiries.agent_unique_id','users.unique_id') 
        ->where('users.company_id', Auth::user()->company_id)
        ->get());    
       //  dd($getAllClientForAdmin, Auth::user()->company_id);
    }
    elseif($source == 'active'){
        $getAllClientForAdmin = count(self::where('delete_client',1)
        ->join('users','enquiries.agent_unique_id','users.unique_id') 
        ->where('users.company_id', Auth::user()->company_id)
        ->where('disposition','!=','Not Intrested')->whereOr('disposition','!=','DND')->get());    
    }
    elseif($source == 'inactive'){
        $getAllClientForAdmin = count(self::where('delete_client',1)
        ->join('users','enquiries.agent_unique_id','users.unique_id') 
        ->where('users.company_id', Auth::user()->company_id)
        ->where('disposition','=','Not Intrested')->whereOr('disposition','=','DND')->get());    
    }
    else{
        $getAllClientForAdmin = count(self::where('delete_client',1)
        ->join('users','enquiries.agent_unique_id','users.unique_id') 
        ->where('users.company_id', Auth::user()->company_id)
        ->where('source',$source)->get());
    }
    return $getAllClientForAdmin;
    }
}

public static function recentActivity($id){
    // $getAll = self::select('id')->where('delete_client',1)->where('agent_unique_id',$id)->where->max('created_at')->first();
    $getAll = self::whereRaw('created_at = (select max(`created_at`))')->get();
    dd($getAll);
    return $getAll;
}

// public static function get_enquiries($id){
//     return self::where('unique_id', $id)->get();
// }

public static function get_enquiries($id){
    return self::select('id','unique_id','last_comment')->where('unique_id', $id)->get();
}


public static function getClientName($unique_id){
    return self::select('id', 'name')->where('unique_id', $unique_id)->first();
}


}
