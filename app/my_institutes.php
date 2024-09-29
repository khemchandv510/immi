<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class my_institutes extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;


    public static function insertData($data){

        $value=DB::table('my_institutes')->where('code', $data['code'])->get();
        if($value->count() == 0){
           DB::table('my_institutes')->insert($data);
        }
     }

     public static function getAllUniversityName(){
        $data = DB::table('my_institutes')->select('name','code','city')->limit(15)->get();
        return ($data ? :[]);
     }
     
      public static function getUniversityName($code){
        $data = DB::table('my_institutes')->select('name','city')->where('code',$code)->get();
        return $data;
     }


}
