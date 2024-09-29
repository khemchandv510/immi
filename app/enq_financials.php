<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class enq_financials extends Model
{
 public $timestamps = false;
 protected $guarded  = ['id'];

protected $fillable = [
    'enquiry_id',
    'financials_by',
    'amount',
    'registration_date',
    'visa_type',
    'visa_country',
    'service_type',
    'visa_consultant',
    'paid_date',
    'receipt_date',
    'gen_by',
    'gen_date',
    'receipt',
    'status',
    'other'
];

public static function getdata($request){
    
    $data = DB::table('enq_financials')->where('enquiry_id',$request)->get();
    
    return ($data?:[]);
} 
 
}