<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class states extends Model
{
public static function getState($id){
    $data = DB::table('states')->select('state_name')->where('state_id',$id)->get();
    
       return ($data[0]->state_name);
} 
}
