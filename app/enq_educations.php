<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class enq_educations extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];
    protected $fillable = ['enquiry_id', 'class', 'id'];



    public static function getEducations($enquery_id){
        $data = DB::table('enq_educations')->where('enquiry_id', $enquery_id)->get();
        
        
        return ($data ? :[]);
    }

}
