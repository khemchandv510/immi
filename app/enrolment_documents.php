<?php
 
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class enrolment_documents extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];

    protected $fillable = ['client_unique_id', 'qualification', 'unique_id'];

    public static function getUploadDocuments($enquery_id, $class){
    
// $data = db::select(DB::raw("SELECT * from enrolment_documents where client_unique_id= '$enquery_id' and qualification like '%$class%'"  ));
// dd($data);

        $data = DB::table('enrolment_documents')->where('status',1)->where('client_unique_id', $enquery_id)->where('qualification','like', "%$class%")->get();
    // dd($data);
        return ($data ? :[]);
    }

    public static function getAllEducations($enquery_id){
        $data = DB::table('enrolment_documents')->where('status',1)->where('client_unique_id', $enquery_id)->get();
        
        return ($data ? :[]);
    }
    

}
