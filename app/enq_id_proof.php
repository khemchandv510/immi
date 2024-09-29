<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
 

class enq_id_proof extends Model
{

    protected $table = 'enq_id_proof';
public $timestamps = false;
protected $guarder = ['id'];

    protected $fillable = [
        'enquiry_id',
        'id_proof',
        'name_on_id_proof',
        'id_proof_number',
        'id_image',
        'date_of_birth',
        'place_of_issue',
        'date_of_issue_passport',
        'date_of_expiry_passport',
        'passport_back_image'
    ];

    public static function getdata($request){
        
        $data =  DB::table("enq_id_proof")->select('enq_id_proof.*')->where('enquiry_id',$request)->whereNotIn('id_proof',
        function($quer){
            $quer->select('id_proof')->where('id_proof','Passport')->from('enq_id_proof');
        }
        )->get();
        
        // dd(($data));
        return ($data ? : []);
    }



    public static function getPassport($enquiry_id){
    
        $data = DB::table('enq_id_proof')->where('id_proof','Passport')->where('enquiry_id',$enquiry_id)->get();
        
        return ($data ?:[]);
    }

}
 