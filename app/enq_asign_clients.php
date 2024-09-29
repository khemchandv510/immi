<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enq_asign_clients extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];
    
    
    // public static function get_enq_asign_clients($id){
    //     return self::where('agent_unique_id', $id)
    //     ->orderBy('date','DESC')
    //     ->get();
        
    // }
    
    
    public static function get_enq_asign_clients($id){
        
         return self::where('agent_unique_id', $id)
         ->select('id','unique_id','agent_unique_id','from_agent_unique_id','who_assigned','client_enquiry_id','date')
        ->orderBy('id','DESC')
        ->limit(25)
        ->get();
    }
}
