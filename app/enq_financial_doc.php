<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class enq_financial_doc extends Model
{
protected $table  = "enq_financial_doc";
protected $guarder = ['id'];
protected $fillable = ['doc_name','doc_image','enquiry_id', 'other'];


public static function getDoc($id){
    $data = DB::table('enq_financial_doc')->where('enquiry_id',$id)->where('status',1)->get();
    
       return ($data);
} 

}
