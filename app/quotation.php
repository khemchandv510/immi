<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotation extends Model
{
    public $timestamps  = false;
    protected $guarded = ['id'];

    public static function getList(){
        return self::where('status',1)->get();
    } 
    public static function getQuotationById($unique_id, $id){
        return self::where('customer_unique_id',$unique_id)->where('id',$id)->first();
    }
}

?>