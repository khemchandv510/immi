<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class sort_list_courses extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];


public static function getData_rank_course($request){
    $data = DB::table('sort_list_courses')->where('student_unique_id',$request)->where('priority','!=','N')->get();
    // dd($data);
    return ($data?:[]);
}


public static function getData_list_course($request){
    $data = DB::table('sort_list_courses')->where('student_unique_id',$request)->get();
    
    return ($data?:[]);
}


}


