<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class enq_id_proof_type extends Model
{ 
protected $table   = 'enq_id_proof_type';
public $timestamps = false;
protected $guarded =['id'];


public static function getdata(){
    $data =  DB::table("enq_id_proof_type")->select('name')->get();    
    return ($data ? : []);
}


}
