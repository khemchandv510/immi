<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
 

class client_notification extends Model
{

    protected $table = 'client_notification';
public $timestamps = false;
protected $guarder = ['id'];

    protected $fillable = [
        'enquiry_id',
        'date',
        'agent_unique_id',
        'message',
        
    ];

    // public static function getdata($request){
        
    //     $data =  DB::table("enq_id_proof")->select('enq_id_proof.*')->where('enquiry_id',$request)->whereNotIn('id_proof',
    //     function($query){
    //         $query->select('id_proof')->where('id_proof','Passport')->from('enq_id_proof');
    //     }
    //     )->get();
        
    //     // dd(($data));
    //     return ($data ? : []);
    // }



    // public static function getPassport($enquiry_id){
    
    //     $data = DB::table('enq_id_proof')->where('id_proof','Passport')->where('enquiry_id',$enquiry_id)->get();
        
    //     return ($data ?:[]);
    // }

}
 