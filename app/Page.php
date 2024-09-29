<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public static function insertData($data){

        $value=DB::table('my_institutes')->where('code', $data['code'])->get();
        if($value->count() == 0){
           DB::table('my_institutes')->insert($data);
        }
     }

    // public static function insertData($date){
    //     DB::table('users')->insert($data);
    // }
}
