<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enq_residense_last_five_year extends Model
{
    protected $table = "enq_residense_last_five_year";
    public $timestamps = false;
    protected $guarded = ['id'];

    // protected $fillable[
    //     ''
    // ]

    public static function getdata($request){
        $data = DB::table('enq_residense_last_five_year')->where('enquiry_id', $request)->get();
        return ($data ? : []);
    } 
}
 