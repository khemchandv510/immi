<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enq_comments extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];
    
    public static function get_all_enq_comments(){
        return self::select('client_enquiry_id')->groupBy('client_enquiry_id')->get();
    }
}
