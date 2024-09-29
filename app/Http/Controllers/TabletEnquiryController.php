<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Enquiryrequest;
use DB;
use Auth;
use App\countries;
use App\states;
use App\cities;
use App\enquiries;
use App\enq_educations;
use App\enq_exam_scores;
use App\enq_experiences;
use App\enq_imm_historys;
use App\enq_marriages;
use App\enq_oet_scores;
use App\enq_comments;
use App\enq_financials;
use App\enq_travelled_historys;
use App\enq_visa_rejected_countrys;
use App\users;
use Session;
use Illuminate\Support\Facades\Hash;

use Mail;
 
class TabletEnquiryController extends Controller
{
    public function index(){

        $countries  =  DB::table('countries')->get();
                    return view('enquiry/tablet-enquiry',['countries'=>$countries]);
}




    public function state(request $id){
        $id = $id->id;
     return $states  =  DB::table('states')->where('country_id',$id)->get();
       // return view('enquiry/tablet-enquiry',['states'=>$states]);
    }


    public function city(request $id){
        $id = $id->id;
        
        return $cities  =  DB::table('cities')->where('state_id',$id)->get();
        
        // return view('enquiry/tablet-enquiry',['cities'=>$cities]);
    }


public function upload_image(Request $get){
     $a = $get->imgdata;

     define('UPLOAD_DIR', 'images/');
     $img = $a ;
     $img = str_replace('data:image/png;base64,', '', $img);
    //  $img = str_replace(' ', '+', $img);
     $data = base64_decode($img);
     $file = url().'/public/uploads' . uniqid() . '.png';
     $success = file_put_contents($file, $data);
     print $success ? $file : 'Unable to save the file.';

//    echo "<img src='$a'>";
//    $content = "some text here";
//    $fp = fopen(url(). "/myText.txt","wb");
//    $a = fwrite($fp,$content);
//    echo "<img src='$a'>";

  

//    $img = $_POST['img']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';

//    $img = str_replace('data:image/png;base64,', '', $a);
//    $img = str_replace(' ', '+', $img);
    $data = base64_decode($a);
   $fp = fopen(url(). "/myText.txt","w");
      return $a = fwrite($fp,$data);
   file_put_contents(url().'public/uploads/image.png', $data);

    
   $fileLocation = getenv("DOCUMENT_ROOT") . "/myfile.txt";
   $file = fopen($fileLocation,"w");
   $content = "Your text here";
   fwrite($file,$content);
   fclose($file);


}

    public function insert_date(Request $request){

     


        $unique_id = mt_rand(10000000,99999999);
        $name = $request->input('name');
        $dob = $request->input('dob');
$session = $request->input('session');
$course_country = $request->input('course_country');
$course = $request->input('course');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $address = $request->input('address');
        $country = $request->input('country');
        $state = $request->input('state');
        $city  = $request->input('city');
        $nationality  = $request->input('nationality');
        $marriage  = $request->input('marriage');
        $gender  = $request->input('gender');
        $host = $request->input('host');



        if( $request->input('marriage') == 'y'){
            
        $dom  = $request->input('dom');
    
        $spouse_qualification  = $request->input('spouse_qualification');
        $sip  = $request->file('sip');



        if($sip  != ""){
            $DestinationSip  =  'public/uploads/sip';
            $sipname = $unique_id.$sip->getClientOriginalName();
            $sip->move($DestinationSip, 'sip'.$sipname, $sip->getClientOriginalName()); 
            $sip =  'sip'.$sipname; 
        }
        else{
            $get =  DB::table('enq_marriages')->where('enquiry_id', $unique_id)->get();
            foreach ($get as $get2) {
                $sip  = $get2->spouse_income_proof;
            }
        }



        }
  
        $interested_intake  = $request->input('interested_intake');




$qualification_name = $request->input('qualification_name');
$edu_stream = $request->input('edu_stream');
        $institute_name = $request->input('institute_name');
        $passing_year = $request->input('passing_year');
  $percentage = $request->input('percentage');


        // $twelve_percentage = $request->input('twelve_percentage');
        // $twelve_edu = $request->input('twelve_edu');
        // $bachelore_year = $request->input('bachelore_year');
        // $bachelore_percentage  = $request->input('bachelore_percentage');

      
        
            


if($request->input('toefl') == 'y'){
    $enq_exam_scores = new enq_exam_scores([
        'enquiry_id'=> $unique_id,
        'language' => 'toefl',
    'listening' => $request->input('ToeflListning'),
    'reading'  =>$request->input('ToeflReading'),
    'writing'  =>$request->input('ToeflWriting'),
    'speaking' =>$request->input('ToeflSpeaking')]);
    
    $enq_exam_scores->save();
}


if($request->input('ielts') == 'y'){
 $enq_exam_scores = new enq_exam_scores([
        'enquiry_id'=> $unique_id,
        'language' => 'ielts',
    'listening' => $request->input('IeltsListning'),
    'reading'  =>$request->input('IeltsReading'),
    'writing'  =>$request->input('IeltsWriting'),
    'speaking' =>$request->input('IeltsSpeaking')]);
        $enq_exam_scores->save();

    }

    if($request->input('pte') == 'y'){
    $enq_exam_scores = new enq_exam_scores([
           'enquiry_id'=> $unique_id,
           'language' => 'pte',
       'listening' => $request->input('PteListning'),
       'reading'  =>$request->input('PteReading'),
       'writing'  =>$request->input('PteWriting'),
       'speaking' =>$request->input('PteSpeaking')]);
           $enq_exam_scores->save();
   }


      
if($request->input('oet') == 'y'){

    $enq_oet_scores = new enq_oet_scores([
        'enquiry_id'=> $unique_id,
       'listening' => $request->input('OetListening'),
    'reading'  =>$request->input('OetReading'),
    'writing'  =>$request->input('OetWriting'),
    'speaking' =>$request->input('OetSpeaking')]);
        $enq_oet_scores->save();

    $enq_oet_scores = new enq_oet_scores([  
           'enquiry_id'=> $unique_id,
          'listening' => $request->input('oet_listening_score'),
       'reading'  =>$request->input('oet_reading_score'),
       'writing'  =>$request->input('oet_writing_score'),
       'speaking' =>$request->input('oet_speaking_score')]);
           $enq_oet_scores->save();
   }


  $financial  = $request->input('financial');
  
  $financial_amount  = $request->input('financial_amount');
  $history  = $request->input('history');

$image = $request->file('image');


if($image  != ''){
$destinationPath = "public/uploads/image";
$img =  $unique_id.$image->getClientOriginalName();
$image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
$image  = 'i'.$img ;
}

else{
$image  ='image';
}





        $enquiry = new enquiries([
            'image'        => $image,
            'name'        => $name,
            'dob'   =>$dob,
            'contact'      => $contact,
            'email'      => $email,
            'address_line1'  =>$address,
            'city'  =>  $city,
            'country' => $country,
            'state'  =>$city,
            'contact'  => $contact,
            'state'  => $state,
            'gender'  => $gender,
            'unique_id'  =>$unique_id,
            'purpose_of_query'=>$request->input('purpose_of_query'),
             'date'       =>date("Y-m-d"),
            'device'  =>'fa fa-tablet',
            'course_session' => $session,
'course_country' => $course_country,
'course'  =>   $course,
'host' => $host,
            'agent_unique_id'  =>  Auth::user()->unique_id,
'agent_id'  =>  Auth::user()->employee_id,
'agent_name'   =>  Auth::user()->name
            ]);
$enquiry->save();



$file = $request->file('image');

// $destinationPath = 'uploads';
// $file->move($destinationPath,$file->getClientOriginalName());
if($qualification_name != ''){
    for($i=0; $i<count($qualification_name); $i++){
    $enq_education1 = new enq_educations([
                'enquiry_id' =>   $unique_id,
                'class'   => $qualification_name[$i],
                'stream'  => $edu_stream[$i],
                'passing_year'        => $passing_year[$i],
                'percentage'        =>$percentage[$i] ,
                'education_name'   =>$institute_name[$i]
                ]);
$enq_education1->save();
    }
}
    


if($financial != ''){
    $get  = DB::table('enq_financials')->where('enquiry_id',$unique_id)->get();
       if($get->count() > 0){
           $enq_financials  = new enq_financials;
    for($i=0; $i<count($financial); $i++){
           $enq_financials->where('enquiry_id', $unique_id)->update([
               'enquiry_id'    =>   $unique_id,
               'financials_by' =>  $financial[$i],
               'amount'        =>  $financial_amount[$i]
           ]);
           }
       }
   else{
       for($i=0; $i<count($financial); $i++){
   $enq_financials   = new enq_financials([
           'enquiry_id'    =>   $unique_id,
           'financials_by' =>  $financial[$i],
           'amount'        =>  $financial_amount[$i]
       ]);
       $enq_financials->save();
       }
   }
   }


$visa_rejected_country = $request->input('visa_rejected_country');

   
if($visa_rejected_country != '' ){
    $get = DB::table('enq_visa_rejected_countrys')->where('enquiry_id', $unique_id)->get();
    if($get->count() > 0){
        for($i=0; $i<count($visa_rejected_country); $i++){
    $enq_visa_rejected_countrys  = new enq_visa_rejected_countrys;
foreach($get as $get2){
    $enq_visa_rejected_countrys->where('enquiry_id',$unique_id)->where('country', $get[$i]->country)->update([
        'enquiry_id'  => $unique_id,
        'country'   =>  $visa_rejected_country[$i]
    ]);
        }
    }
    }
    else{    
    for($i=0; $i<count($visa_rejected_country); $i++){ 
    $enq_visa_rejected_countrys =  new enq_visa_rejected_countrys([
            'enquiry_id'  => $unique_id,
            'country'   =>  $visa_rejected_country[$i]
    ]);
    $enq_visa_rejected_countrys->save();
}
}
}

// if($request->input('ielts') == 'y'){
//                 $enq_exam_scores = new enq_exam_scores([
//                     'enquiry_id' =>   $unique_id,
//                 'writing'  => $writing,
//                 'speaking'  => $speaking,
//                 'listening'  => $listening,
//                 'reading'   =>  $reading]);

//                 $enq_exam_scores->save();
//                 }

  
                
                // $company = $request->input('company1');
                
                // $start_date  = $request->input('exp_start1');
                // $end_date  = $request->input('exp_end1');
                

//                 $company2 = $request->input('company2');
//                 $start_date2  = $request->input('exp_start2');
//                 $end_date2  = $request->input('exp_end2');

                
//                 $enq_experiences = new enq_experiences([
//                                         'enquiry_id' => $unique_id,
//                     'company_name'=>$company1,
//                     'start_date' =>$start_date1,
//                     'end_date'  =>$end_date1]);

//                     $enq_experiences->save();

$company    = $request->input('company');
$designation  = $request->input('designation');
$exp_start  = $request->input('exp_start');
$end_date  = $request->input('exp_end');
$exp_duration  = $request->input('exp_duration');

if($company != ''){

    $get  = DB::table('enq_experiences')->where('enquiry_id',$unique_id)->get();
    
    if($get->count() > 0){
 
         
        for($i=0; $i<count($company); $i++){
            
            
         $enq_experiences = new enq_experiences; 
         foreach ($get as $get2) {
           
              $enq_experiences->where('enquiry_id', $unique_id)->where('company_name', $get[$i]->company_name)->update([
                'enquiry_id' => $unique_id,
                'company_name'=>$company[$i],
                'start_date' =>$exp_start[$i],
                'end_date'  =>$end_date[$i], 
                'designation'=>$designation[$i]    
            ]); 
          
             
          }              }     
              
    }
    else{

for($i=0; $i<count($company); $i++){

    $enq_experiences = new enq_experiences([
    'enquiry_id' => $unique_id,
'company_name'=>$company[$i],
'start_date' =>$exp_start[$i],
'end_date'  =>$end_date[$i], 
'designation'=>$designation[$i]
]);
$enq_experiences->save();
     }
    }
}








$appliciant_name = $request->input('appliciant_name');
$old_imm_country  = $request->input('old_imm_country');
$visa_decision  = $request->input('visa_decision');
$visa_decision_date  = $request->input('visa_decision_date');

if( $request->input('imm_history') != ''){
    for($i=0; $i<count($request->input('company')); $i++){
$enq_imm_historys = new enq_imm_historys([
    'enquiry_id' => $unique_id,
    'name' => $appliciant_name[$i],
    'country' =>$old_imm_country[$i],
    'visa_decision'=>$visa_decision[$i],
    'visa_decision_date' => $visa_decision_date[$i]
]);
$enq_imm_historys->save();
    }
}







$travelled_before_country = $request->input('imm_history');
$travelled_before_from = $request->input('imm_history_from');
$travelled_before_to = $request->input('imm_history_to');
$travelled_before_duration = $request->input('imm_history_duration');




if( $travelled_before_country != ""){
    $get  = DB::table('enq_travelled_historys')->where('enquiry_id',$unique_id)->get();
    
    if($get->count() > 0){
        for($i=0; $i<count($travelled_before_country); $i++){
        $enq_travelled_history  =  new enq_travelled_historys;
        foreach($get as $get2){
        $enq_travelled_history->where('enquiry_id', $unique_id)->where('travelled_before_country', $get[$i]->travelled_before_country)->update([
            'enquiry_id'  =>  $unique_id,
            'travelled_before_country'=>$travelled_before_country[$i],
            'travelled_before_from'  => $travelled_before_from[$i],
            'travelled_before_to'   => $travelled_before_to[$i],
            'travelled_before_duration'  => $travelled_before_duration[$i]
  ]);
        }
        }
        
        }

        else{
            for($i=0; $i<count($travelled_before_country); $i++){
           $enq_travelled_history  = new enq_travelled_historys([
            'enquiry_id'  =>  $unique_id,
            'travelled_before_country'=>$travelled_before_country[$i],
            'travelled_before_from'  => $travelled_before_from[$i],
            'travelled_before_to'   => $travelled_before_to[$i],
            'travelled_before_duration'  => $travelled_before_duration[$i]
           ]) ;
           $enq_travelled_history->save();
        }
        }
    
    }







     

$dom = $request->input('dom');
$spouse_qualification  = $request->input('spouse_qualification');
$interested_intake  = $request->input('interested_intake');

if( $request->input('marriage') == 'y'){
$enq_marriages = new enq_marriages([
    'enquiry_id' => $unique_id,
    'dom' => $dom,
    'spouse_qualification' =>$spouse_qualification,
    'spouse_income_proof'=>$sip,
    'interested_intake' => $interested_intake 
]);
$enq_marriages->save();
}
 
return back();
}


  public function get_list(Request $request){
      $id = decrypt($request->id);
      
      $find_agent = DB::table('users')->where('employee_id', $id)->get();
      
if($find_agent[0]->usertype_status == 1){

    $get  = DB::table('enquiries')
      ->where(function ($q) {
        $q->where('disposition', '!=', 'Dead Lead')
        ->orWhereNull('disposition');
    })
    ->where('conversion',0)->where('delete_client','1')->orderBy('date', 'DESC')->orderBy('enquiries.id', 'DESC')->paginate(20);
    
}
elseif($find_agent[0]->usertype_status == 5 || $find_agent[0]->usertype_status == 6){
    // dd(Auth::user()->unique_id);
    $get  = DB::table('enquiries')
    ->select('*','enquiries.id as id','enquiries.source as source', 'enquiries.date as date', 'enquiries.name as name','enquiries.contact as contact', 'enquiries.country as country','enquiries.unique_id as unique_id')
    ->join('users', 'enquiries.agent_unique_id', 'users.unique_id')
      ->where(function ($q) {
        $q->where('disposition', '!=', 'Dead Lead')
        ->orWhereNull('disposition');
    })
    ->where('conversion',0)
    ->where('users.company_id', Auth::user()->unique_id)
    ->where('delete_client','1')
    // ->where('usertype_status',4)
    ->orderBy('date', 'DESC')
    ->orderBy('enquiries.id', 'DESC')
    ->paginate(20);
    
}
else{
$get  = DB::table('enquiries')
  ->where(function ($q) {
        $q->where('disposition', '!=', 'Dead Lead')
        ->orWhereNull('disposition');
    })
->where('conversion',0)
->where('agent_unique_id', Auth::user()->unique_id)
->where('delete_client','1')->orderBy('date', 'DESC')->orderBy('enquiries.id', 'DESC')->paginate(20);
 
}

            // return view('enquiry/enquiry-list', [ 'get' => $get ]);
// $get  =  enquiries::paginate(15);
            $new_user  = DB::table('enq_new_users')->where('complete_profile',0)->get();
            $enq_purposes = DB::table('enq_purposes')->get();
            $enq_status = DB::table('enq_status')->get();
          
            return view('enquiry/enquiry-list', compact([ 'get' , 'new_user', 'enq_purposes', 'enq_status' ]));
            
}

public function BulkDeleteViewList(request $request){
    // print_r($request->deleteid);
    foreach($request->deleteid as $khemchand){
        DB::table('enquiries')->where('unique_id', '=', $khemchand)->update(['delete_client' => 0]);
    echo    $khemchand;
        echo "<br>";
    }
    
redirect(Request::url());
}

public function get_detail(Request $request){
    Session::forget('unique_id_sess');
    $id = $request->id;

    $enquiries  = DB::table('enquiries')->where('unique_id' ,$id)->get();
    $enq_educations  = DB::table('enq_educations')->where('enquiry_id' ,$id)->orderBy('id','DESC')->get();
    $enq_exam_scores  = DB::table('enq_exam_scores')->where('enquiry_id' ,$id)->get();
    $enq_experiences  = DB::table('enq_experiences')->where('enquiry_id' ,$id)->get();
    // $enq_imm_historys  = DB::table('enq_imm_historys')->where('enquiry_id' ,$id)->get();
    $enq_marriages  = DB::table('enq_marriages')->where('enquiry_id' ,$id)->get();
    $enq_financials  = DB::table('enq_financials')->where('enquiry_id', $id)->get();
    $enq_travelled_historys = DB::table('enq_travelled_historys')->where('enquiry_id', $id)->get();
    $enq_visa_rejected_countrys = DB::table('enq_visa_rejected_countrys')->where('enquiry_id', $id)->get();
    $enq_oet_scores =  DB::table('enq_oet_scores')->where('enquiry_id', $id)->get();
    $enq_comments = DB::table('enq_comments')->where('client_enquiry_id', $id)->orderBy('id','DESC')->get();
    
                   
    //    ->join('enq_educations','enquiries.unique_id', '=' , 'enq_educations.enquiry_id' )
    //    ->join('enq_exam_scores','enquiries.unique_id', '=' , 'enq_exam_scores.enquiry_id')
    //    ->join('enq_experiences','enquiries.unique_id', '=' , 'enq_experiences.enquiry_id')
    //    ->join('enq_imm_historys','enquiries.unique_id', '=' , 'enq_imm_historys.enquiry_id')
    //    ->join('enq_marriages','enquiries.unique_id', '=' , 'enq_marriages.enquiry_id')
    //    ->select('enquiries.*','enquiries.name','enq_educations.*','enq_exam_scores.*','enq_experiences.*','enq_imm_historys.name', 'enq_marriages.*')->where('unique_id',81322036 )
    //    ->get();

    

                   
    return view('enquiry/enquiry-detail', compact(['id','enquiries' , 'enq_educations', 'enq_exam_scores','enq_experiences', 'enq_marriages','enq_financials', 'enq_travelled_historys', 'enq_visa_rejected_countrys','enq_oet_scores','enq_comments'] ));

}


public function updateFurtureDate(Request $req){
    $date = $req->id;
  $courseId = $req->courseId;
    DB::table('courses')->where('unique_id', '=', $courseId)->update(array('courseExpDate' => $date));
}


   public function update_status(Request $id){
        // $unique_id  = $id->unique_id;

        $a = $id->a;
        $id = $id->id;

// $enq_comments   = new enquiries;([
//     'disposition' =>$id,
    
//     'unique_id' => $a
//     ]);
//     $enq_comments->save();

if($id == "Payment Done"){
    
    $add_client =  new enquiries;
    $add_client->where('unique_id',$a)
    ->update([
            'payment_done' => "Payment Done",
            'lead_update'=>1,
            'lead_upadte_on' => date('Y-m-d')
    ]);
    $get_client = DB::table('enquiries')->where('unique_id',$a)->get();
if($get_client[0]->email == null){
  return        "Please Add Client Email First";     
}
// $token = mt_rand(111111111,999999999);
$password = str_shuffle("ajise8457o");

$add_user = new users([
    'employee_id'=> $get_client[0]->unique_id,
    'email' => $get_client[0]->email,
    'usertype_status' => 3,
    'password' =>Hash::make($password),
    'employee_id' => $get_client[0]->unique_id
]);
$add_user->save();

    ini_set('max_execution_time', 120);
 Mail::send('enquiry.client-login-mail', ['user_id'=>$get_client[0]->email, 'password' =>$password], function($message)  {
 $message->to('chandrapalsingh1004@gmail.com', 'chandrapal')
 ->subject('Welcome');
 $message->from('chandrapal@klifftech.com','Chandrapal');
});
}elseif($id == "Future Lead"){
      $enquiries = new enquiries; 
           return       $enquiries->where('unique_id',$a)->update(['disposition' => $id, 'lead_update'=> 1,   'future_lead_date' => date('Y-m-d')]);
}
 elseif($id == "Dead Lead"){
      $enquiries = new enquiries; 
           return       $enquiries->where('unique_id',$a)->update(['disposition' => $id, 'lead_update'=> 1,   'dead_lead_date' => date('Y-m-d')]);
}else{
                        $enquiries = new enquiries; 
           return       $enquiries->where('unique_id',$a)->update(['disposition' => $id, 'lead_update'=> 1,   'lead_upadte_on' => date('Y-m-d')]);
}
                    }

    
                     

public function delete(Request $request){
         $enquiries = new enquiries; 
        $enquiries->where('unique_id',$request->id)->delete();
        return  app('App\Http\Controllers\TabletEnquiryController')->get_list(); 
        // return  $this->get_list();
        // redirect()->action('EnquiryController@getalllist');           
        // url('get-all-list');
    }
        
public function delete_list(Request $id){
    $a = $id->a;
    // $id = $id->id;

        $enquiries = new enquiries; 
return       $enquiries->where('unique_id',$a)->update(['delete_client' => '0']);

}


public function callbacklater(Request $id){
    // dd($_GET);
    $a = $id->a;
    
    $get = DB::table('enquiries')->where('unique_id',$a)->get();
    
    $name = $get[0]->name;
    $contact = $get[0]->contact;
    $email = $get[0]->email;
    $comment = $id->comment;
    $status = $id->val;
    if(!empty($id->input('callbacklater'))){
    $d = explode('/', $id->input('callbacklater'));
    $date =    date("$d[2]-$d[1]-$d[0]");
    }else{
    $date = '';
    }
    // $id->input('callbacklater');
    $comment = $id->input('comment');
    $time = $id->input('callbacklater_time');
    $time = date("H:i", strtotime($time));
    
    $enquiries = new enquiries;
    $enquiries->where('unique_id',$a)->update(['last_comment' => $comment, 'lead_update'=> 1, 'lead_upadte_on' => date('Y-m-d')]);

    $enq_comments = new enq_comments([
        'client_enquiry_id'=> $a,
        'calling_date' =>$date,
        'comment'  =>$comment,
        'agent_id'  =>  Auth::user()->employee_id,
        'status'=>$status,
        'callbacklater_time' => $time,
        'name' =>$name,
        'email' =>$email,
        'contact' =>$contact,
        'agent_name'=> Auth::user()->name,
        'employee_unique_id' => Auth::user()->unique_id
        
        ]);
 $enq_comments->save();
//  dd($enq_comments);
return back();
    }

public function trash_clients(){
    // $get = DB::table('enquiries')->where('delete_client', '1')->get();
    // $enq_purposes = DB::table('enq_purposes')->get();
    // $enq_status = DB::table('enq_status')->get();    
    return view('enquiry/trash-clients');
}

public function undo_client(Request $request){
    $a = $request->a;
        $enquiries = new enquiries; 
return       $enquiries->where('unique_id',$a)->update(['delete_client' => '1']);
}

public function permanent_delete_client(Request $request){
    $a = $request->a;
        $enquiries = new enquiries; 
return       $enquiries->where('unique_id',$a)->update(['delete_client' => '2']);
}



public function add_priority(Request $id){
    $a = $id->a;
    $val = $id->val;
    // this code for toggle like set 1 or 0 as made previous
    // $toggle = DB::table('enquiries')->select('set_priority')->where('delete_client',1)->where('unique_id',$a)->where('set_priority',1)->get();
    // $con = $toggle->count();
    // $enquiries = new enquiries;
    // if($con == 1){
    //     return       $enquiries->where('unique_id',$a)->update(['set_priority' => '0']);
    //     }
    // else{
    //     return       $enquiries->where('unique_id',$a)->update(['set_priority' => '1']);
    // }
    $enquiries = new enquiries;
    return $enquiries->where('unique_id',$a)
    ->update(['set_priority' => $val ]);


}


public function get_all_priority(Request $request){
    
    // if(Auth::user()->usertype_status == 1){
    //     $get = DB::table('enquiries')->where('delete_client',1)->where('set_priority',$request->id)
    //     ->where('conversion',$request->conversion)
    //     ->paginate(10);     
    // }else{
    // $get = DB::table('enquiries')->where('delete_client',1)->where('set_priority',$request->id)->where('agent_unique_id',Auth::user()->unique_id)
    // ->where('conversion',$request->conversion)
    // ->paginate(10);
    // }
    // if($request->conversion ==0){
        
    // return view('enquiry/enquiry-list', compact(['get']));
    // }else{
    //     $get2 = $get;
    //     return view('student/student-list', compact(['get2']));
    // }
    
    
    if(Auth::user()->usertype_status == 1){
        $get = DB::table('enquiries');
        $get->where('delete_client',1);
        $get->where('set_priority',$request->id);
        if($request->conversion == 'dead-leads'){
            $get->whereIn('conversion',[0,1,2,3]);
            $get->where('disposition', 'Dead Lead');
        }else{
        $get->where('conversion',$request->conversion);
        $get->where('disposition', '!=', 'Dead Lead');
        }
        $get = $get->paginate(10);     
    }

    else{
    $get = DB::table('enquiries');
    $get->where('delete_client',1);
    $get->where('set_priority',$request->id);
    $get->where('agent_unique_id',Auth::user()->unique_id);
    if($request->conversion == 'dead-leads'){
        $get->whereIn('conversion',[0,1,2,3]);
        $get->where('disposition', 'Dead Lead');
    }else{
    $get->where('conversion',$request->conversion);
    $get->where('disposition', '!=', 'Dead Lead');
    }
    $get->paginate(10);
    $get = $get->paginate(10);  
    }
    
    if($request->conversion == '0'){
    return view('enquiry/enquiry-list', compact(['get']));
    }
    elseif($request->conversion == 'dead-leads'){
        $get2 = $get;
        return view('dead-leads', compact(['get2']));
    }
    else{
        $get2 = $get;
        return view('student/student-list', compact(['get2']));
    }
}

// public function priority_list(){
// $priority = DB::table('enquiries')->where('delete_clent',1)->where('set_priority', 1)->get();
//     return 
// }

public function search_course(Request $request){
    // dd($request->college);
    // dd($request->get_course_data);
$search =  DB::table('courses')->where('course_name',$request->get_course_data)->where('status',1)->get();
// dd($search);
$collage_code =  $request->college;

return view('education/ccc-courses',compact(['search','collage_code']));
}

 public function get_list_student(Request $request){
      $id = decrypt($request->id);
      
      $find_agent = DB::table('users')->where('employee_id', $id)->get();
if($find_agent[0]->usertype_status == 1){

    $getStudent  = DB::table('enquiries')->where('conversion',1)->where('delete_client','1')->orderBy('id', 'DESC')->paginate(15);
    
}
else{
$getStudent  = DB::table('enquiries')->where('conversion',1)->where('agent_id', $id)->where('delete_client','1')->orderBy('id', 'DESC')->paginate(15);
 
}

            // return view('enquiry/enquiry-list', [ 'get' => $get ]);
// $get  =  enquiries::paginate(15);
            $new_user  = DB::table('enq_new_users')->where('complete_profile',1)->get();
            $enq_purposes = DB::table('enq_purposes')->get();
            $enq_status = DB::table('enq_status')->get();
          
            return view('student/student-list', compact([ 'getStudent' , 'new_user', 'enq_purposes', 'enq_status' ]));
            
}

public function get_list_institute(Request $request){
      $id = decrypt($request->id);
      
      $find_agent = DB::table('users')->where('employee_id', $id)->get();
if($find_agent[0]->usertype_status == 1){

    $getStudent  = DB::table('enquiries')->where('conversion',3)->where('delete_client','1')->orderBy('id', 'DESC')->paginate(15);
    
}
else{
$getStudent  = DB::table('enquiries')->where('conversion',3)->where('agent_id', $id)->where('delete_client','1')->orderBy('id', 'DESC')->paginate(15);
 
}

            // return view('enquiry/enquiry-list', [ 'get' => $get ]);
// $get  =  enquiries::paginate(15);
            $new_user  = DB::table('enq_new_users')->where('complete_profile',1)->get();
            $enq_purposes = DB::table('enq_purposes')->get();
            $enq_status = DB::table('enq_status')->get();
          
            return view('institute/institute-list', compact([ 'getStudent' , 'new_user', 'enq_purposes', 'enq_status' ]));
            
}

public function get_list_immigration(Request $request){
      $id = decrypt($request->id);
      
      $find_agent = DB::table('users')->where('employee_id', $id)->get();
if($find_agent[0]->usertype_status == 1){

    $getStudent  = DB::table('enquiries')->where('conversion',2)->where('delete_client','1')->orderBy('id', 'DESC')->paginate(15);
    
}
else{
$getStudent  = DB::table('enquiries')->where('conversion',2)->where('agent_id', $id)->where('delete_client','1')->orderBy('id', 'DESC')->paginate(15);
 
}

            // return view('enquiry/enquiry-list', [ 'get' => $get ]);
// $get  =  enquiries::paginate(15);
            $new_user  = DB::table('enq_new_users')->where('complete_profile',1)->get();
            $enq_purposes = DB::table('enq_purposes')->get();
            $enq_status = DB::table('enq_status')->get();
          
            return view('immigration/immigration-list', compact([ 'getStudent' , 'new_user', 'enq_purposes', 'enq_status' ]));
            
}




public function undo_hot_lead(Request $request){
    $a = $request->id;
    
      DB::table('mbbsgo')->where('unique_id',$a)->update(['status' => '1']);
      return back();
}
public function permanent_delete_hot_lead(Request $request){
    $a = $request->id;
      DB::table('mbbsgo')->where('unique_id',$a)->update(['status' => '3']);
      return back();
}




}
