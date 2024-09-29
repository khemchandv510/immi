<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public static function insertData($data){

        $value=DB::table('courses')->where('course_code', $data['course_code'])->get();
        if($value->count() == 0){
           DB::table('courses')->insert($data);
        }
     }   
     
     public static function fetchData($id){
        $value=DB::table('courses')->where('unique_id', $id)->get();
        return $value;
     }

}
