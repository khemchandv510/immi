<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
   public static function getAllCountry(){
       $data = DB::table('countries')->select('country_name', 'country_id')->get();
       return ($data ? :[]);
   }  


   public static function getCountry($id){
       $data = DB::table('countries')->select('country_name')->where('country_id',$id)->get();
       return ($data[0]->country_name);
   }
}
