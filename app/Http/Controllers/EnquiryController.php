<?php

namespace App\Http\Controllers;
use Crypt;
use Illuminate\Http\Request;
use App\Http\Requests\EnquiryDesktopRequest;
use App\Http\Requests\RequestNewUser;
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
use App\enq_course_enrolls;
use App\enq_new_users;
use App\enq_oet_scores;   
use App\enq_financials;
use App\enq_visa_rejected_countrys;
use App\enq_travelled_historys;
use App\enq_comments;
use App\enq_purposes;
use App\enq_exist_client_purposes;
use App\enq_asign_clients;
use App\gre_gmat_language_scores;
use Redirect;
use Session;
use App\user;
use Mail;

class EnquiryController extends Controller
{


    public function index(Request $request){
//dd('sdfsd');

        $id = $request->id ;
        
        $countries  =  DB::table('countries')->get();
        $enquiries  = DB::table('enquiries')->where('unique_id' ,$id)->where('conversion',0)->get();
    $enq_educations  = DB::table('enq_educations')->where('enquiry_id' ,$id)->get();
    $enq_exam_scores  = DB::table('enq_exam_scores')->where('enquiry_id' ,$id)->get();
    
    $enq_exam_scores_toefl  = DB::table('enq_exam_scores')->where('enquiry_id' ,$id)->where('language', 'toefl')->get();
    
    $enq_exam_scores_ielts  = DB::table('enq_exam_scores')->where('enquiry_id' ,$id)->where('language', 'ielts')->get();
// dd($enq_exam_scores_ielts);

    $enq_exam_scores_pte  = DB::table('enq_exam_scores')->where('enquiry_id' ,$id)->where('language', 'pte')->get();
    
    $enq_experiences  = DB::table('enq_experiences')->where('enquiry_id' ,$id)->get();
    $enq_imm_historys  = DB::table('enq_imm_historys')->where('enquiry_id' ,$id)->get();
    $enq_marriages  = DB::table('enq_marriages')->where('enquiry_id' ,$id)->get();

    
    $enq_financials  = DB::table('enq_financials')->where('enquiry_id' ,$id)->get();
    $enq_travelled_historys = DB::table('enq_travelled_historys')->where('enquiry_id' ,$id)->get();
    $enq_visa_rejected_countrys = DB::table('enq_visa_rejected_countrys')->where('enquiry_id', $id)->get();
    $enq_comments = DB::table('enq_comments')->where('client_enquiry_id', $id)->get();
    

        // dd($enq_marriages, $id, Session()->get('unique_id_sess'));    
                   
return view('enquiry/enquiry-desktop', compact(['id','enquiries' , 'enq_educations', 'enq_exam_scores','enq_experiences', 'enq_imm_historys', 'enq_marriages', 'countries','enq_financials','enq_travelled_historys','enq_visa_rejected_countrys', 'enq_exam_scores_toefl', 'enq_exam_scores_ielts', 'enq_comments'] ));
}


public function sendEmailer(Request $request){
    
    $data = array(
            "email"=>$request->email,
            "courses"=>$request->courses_ids,
        );
    
    // view("emailer", ["data"=>$data]);    
        $email = $request->email;
        
    Mail::send(['html'=>'emailer'], ["data"=>$data], function($message) use ($email) {
         $message->to($email, 'Immigration')->subject
            ('Immigration');
         $message->from('admin@immigration.craftzvilla.com','Immigration');
      });
      
      enquiries::where('unique_id', $request->user_id)
      ->update([
          'email'  =>  $request->email
          ]);
        Session::flash('message', "Mail Sent Successfully!"); 
        
      return back();
      echo "Email Sent. Check your inbox.";
      
}


// whatsapp pdf send
public function whatsappSender(Request $request){
    $data = array(
        'phone' => $request->phone,
        'courses' => $request->courses_ids,
    );
        

    // dd($data);
        // print_r($courses_ids);
        return view('whatsapp', ['data' => $data]);

        
        // View::make("whatsapp")->with('phone',$phone);
        // $email = $request->email;
    
        // Mail::send(['html'=>'whatsapp'], ["data"=>$data], function($message) use ($email) {  
      
}

// whatsapp download pdf
public function whatsappSenderdownload(Request $request){
    $data = array(
        // 'phone' => $request->phone,
        'courses' => $request->courses_ids,
    );
        

    // dd($data);
        // print_r($courses_ids);
        return view('whatsapppdfdownload', ['data' => $data]);

}


// return view('enquiry/enquiry-desktop',['countries'=>$countries]);

    public function state(Request $request){
        $id = $id->id;
        $states  =  DB::table('states')->where('country_id',$request->id)->get();
        
        // return view('enquiry/enquiry-desktop',['states' => $states]);
    }




    public function city(request $id){
        $id = $id->id;
        
        return $cities  =  DB::table('cities')->where('state_id',$id)->get();
        
        // return view('enquiry/tablet-enquiry',['cities'=>$cities]);
    }

    public function new_user(){
        return view('enquiry/new-user');
    }

    public function add_new_user(RequestNewUser $request){
        // dd('test');
        $time = date("H:i", strtotime($request->time));

 $unique_id = mt_rand(10000000,99999999);
                  $name = $request->input('name');
        $alternate_contact  = $request->input('alternate_contact');
        $phone =$request->input('contact');
    $email =$request->input('email'); 
    $note  =  $request->input('note');
    $status   =  $request->input('status');
    $comment = $request->input('comment');

    if($request->input('asign_to_agent'))
{

    $agent = DB::table('users')->where('employee_id', $request->input('asign_to_agent'))->get();
    // dd($agent);
    $agent_unique_id =  $agent[0]->unique_id;
    $agent_id  =   $agent[0]->employee_id;
    $agent_name = $agent[0]->name;
} 
else{
    $agent_unique_id  =  Auth::user()->unique_id ;
    $agent_id  =  Auth::user()->employee_id ;
    $agent_name   =  Auth::user()->name ;
}

$get = DB::table('enquiriers')
->where('unique_id', $unique_id)
->get();
// dd($get);

$enquiries = new enquiries([
            'unique_id'  =>$unique_id,
            'name'        => $name,
              'alternate_contact'  => $alternate_contact,
            'contact'      => $phone,
            'email'      => $email,
            'date'       =>date("Y-m-d"),
            'callbacklater' => $request->input('date'),
            'callbacklater_time'    =>$time,
            'device'   => 'fa fa-desktop',
            'purpose_of_query'           => $note,
'disposition'   => $status,
'agent_unique_id'  => $agent_unique_id,
'agent_id'  =>  $agent_id,
'agent_name'   =>  $agent_name,
'source' =>$request->source,
'last_comment' =>  $comment

            ]);
            
$enquiries->save();

Session()->put('unique_id_sess',$unique_id);    
Session()->put('name',$name);
Session()->put('alternate_contact',$alternate_contact);
Session()->put('phone',$phone);
Session()->put('email',$email);
// $get_user  =  DB::table('enq_new_users')->where('unique_id' , $unique_id)->get();
//  return re('enquiry/enquiry-desktop', ['get_user'=> $get_user]); 
//  return redirect()->back()->with('data', ['some kind of data']);
//  Redirect::route('enquiry', $get_user);
//  return Redirect::route('enquiry')->width('get_user', $get_user);
//  echo"<script> window.location.href = '/enquiry' </script>";

$enq_comments = new  enq_comments([
    'client_enquiry_id' => $unique_id,
    'agent_id' =>   $agent_id ,
    'status'  =>  $status,
    'comment'  =>$comment,
    'calling_date' => $request->input('date'),
            'callbacklater_time'    => $time,
            'name'        => $name,
            'contact'      => $phone,
            'email'      => $email,
            'agent_name'   =>  $agent_name
]) ;
$enq_comments->save();

if($request->input('asign_to_agent')){
$enq_asign_clients = new  enq_asign_clients([
    'unique_id'  => mt_rand(11111111,99999999),
    'client_enquiry_id' => $unique_id,
    'agent_id'  =>  Auth::user()->employee_id ,
    'comment'  =>$comment,
    'client_name'        => $name,
    'agent_name'   =>  Auth::user()->name,
    'date'  =>date('Y-m-d'),
    'agent_unique_id' =>Auth::user()->unique_id
]);

$enq_asign_clients->save();
}
return redirect()->action('EnquiryController@index');
// return Redirect::route(request()->segment(1)/'sdaf');
     }


    public function insert_date(Request $request){
        // dd( $_POST);
        // dd($request->student_country);
if($request->source == "Other"){
            $request->source = $request->source2;
        }
        
        $time = date("H:i", strtotime($request->time));
 $unique_id = mt_rand(10000000,99999999);
                  $name = $request->input('name');
        $alternate_contact  = $request->input('alternate_contact');
        $phone =$request->input('contact');
    $email =$request->input('email'); 
    $note  =  $request->input('note');
    $status   =  $request->input('status');
    $comment = $request->input('comment');
    if($request->input('asign_to_agent'))
{
    $agent = DB::table('users')->where('employee_id', $request->input('asign_to_agent'))->get();
    $agent_unique_id =  $agent[0]->unique_id;
    $agent_id  =   $agent[0]->employee_id;
    $agent_name = $agent[0]->name;
} 
else{
    $agent_unique_id  =  Auth::user()->unique_id ;
    $agent_id  =  Auth::user()->employee_id ;
    $agent_name   =  Auth::user()->name ;
}



$resume = "resume"; 
// resume
if($request->upload_resume != ''){
    $resume = $request->upload_resume;
       $destinationPath = "public/uploads/resume";
  $img =  $unique_id.$resume->getClientOriginalName();
  $resume->move($destinationPath ,'i'.$img,$resume->getClientOriginalName());
  $resume  = 'i'.$img ;
}  
else{
$get =  DB::table('enquiries')->where('unique_id',$unique_id)->get();
foreach($get as $resume)
$resume  = $resume->resume;
}
// end resume

if(!empty($request->input('date'))){
    $d = explode('/', $request->input('date'));
    $date =    date("$d[2]-$d[1]-$d[0]");
    }else{
    $date = '';
    }
$time = $request->input('time');
    $time = date("H:i", strtotime($time));
$enquiries = new enquiries([
            'unique_id'  =>$unique_id,
            'name'        => $name,
              'alternate_contact'  => $alternate_contact,
            'contact'      => $phone,
            'email'      => $email,
            'date'       =>date("Y-m-d"),
            'callbacklater' => $date,
            'callbacklater_time'    =>$time,
            'device'   => 'fa fa-desktop',
            'purpose_of_query'           => $note,
'disposition'   => $status,
'agent_unique_id'  => $agent_unique_id,
'agent_id'  =>  $agent_id,
'agent_name'   =>  $agent_name,
'source' =>$request->source,
'last_comment' =>  $comment,
'resume'       => $resume,
'conversion'   => 1
            ]);            
$enquiries->save();

// Session()->put('unique_id_sess',$unique_id);    
// Session()->put('name',$name);
// Session()->put('alternate_contact',$alternate_contact);
// Session()->put('phone',$phone);
// Session()->put('email',$email);
// $get_user  =  DB::table('enq_new_users')->where('unique_id' , $unique_id)->get();
//  return re('enquiry/enquiry-desktop', ['get_user'=> $get_user]); 
//  return redirect()->back()->with('data', ['some kind of data']);
//  Redirect::route('enquiry', $get_user);
//  return Redirect::route('enquiry')->width('get_user', $get_user);
//  echo"<script> window.location.href = '/enquiry' </script>";

$enq_comments = new  enq_comments([
    'client_enquiry_id' => $unique_id,
    'agent_id' =>   $agent_id ,
    'status'  =>  $status,
    'comment'  =>$comment,
    'calling_date' => $date,
            'callbacklater_time'    => $time,
            'name'        => $name,
            'contact'      => $phone,
            'email'      => $email,
            'agent_name'   =>  $agent_name
]) ;
$enq_comments->save();

if($request->input('asign_to_agent')){
$enq_asign_clients = new  enq_asign_clients([
    'unique_id'  => mt_rand(11111111,99999999),
    'client_enquiry_id' => $unique_id,
    'agent_id'  =>  Auth::user()->employee_id ,
    'comment'  =>$comment,
    'client_name'        => $name,
    'agent_name'   =>  Auth::user()->name,
    'date'  =>date('Y-m-d'),
    'agent_unique_id' =>Auth::user()->unique_id
]);
$enq_asign_clients->save();
}

    //  $dob = str_replace('/','-', $request->dob);
        
         $name = $request->input('name');
        //  $dob = date('Y-m-d', strtotime($dob));
         
         if(!empty($request->input('dob'))){
    $d = explode('/', $request->input('dob'));
    $dob =    date("$d[2]-$d[1]-$d[0]");
    }else{
    $dob = '';
    }
        //  dd($dob);
         
         $gender  = $request->input('gender');
         $category =$request->input('category');
         $id_proof = $request->input('id_proof');
         $id_proof_name = $request->input('id_proof_name');
         $id_proof_no = $request->input('id_proof_no');
         $father_name = $request->input('father_name');
         $occupation = $request->input('occupation');
         $alternet_contact = $request->input('alternet_contact');
         $address_line1 = $request->input('address_line1');
         $address_line2 = $request->input('address_line2');
         $district = $request->input('district');
         $pincode = $request->input('pincode');
         $session = $request->input('session');
         $course_country = $request->input('course_country');
         $course = $request->input('course');
         $batch = $request->input('batch');
         $exam = $request->input('exam');
         $course_stream = $request->input('course_stream');
         $institute_name = $request->input('institute_name');
         $passing_year = $request->input('passing_year');
         $percentage = $request->input('percentage');
         $edu_stream = $request->input('edu_stream');
         $company = $request->input('company');
         $designation = $request->input('designation');
         $exp_start  = $request->input('exp_start');
         $end_date  = $request->input('exp_end');
         $financial  = $request->input('financial');
         $financial_amount  = $request->input('financial_amount');
         $alternate_contact  = $request->input('alternate_contact');
         $qualification_name  = $request->qualification_name;
         $contact = $request->input('contact');
        $email = $request->input('email');
        $country = $request->input('country');
        $state = $request->input('state');

        $city  = $request->input('city');
        $nationality  = $request->input('nationality');
        $marriage  = $request->input('marriage');
        $visa_rejected_country  =  $request->input('visa_rejected_country');
       
        $image = $request->file('image');
        $signature = $request->file('signature');
        $sip  = $request->file('sip');

        if($image != ''){
             $destinationPath = "public/uploads/image";
        $img =  $unique_id.$image->getClientOriginalName();
        $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
        $image  = 'i'.$img ;
 }  
 else{
    $get =  DB::table('enquiries')->where('unique_id',$unique_id)->get();
    foreach($get as $image)
    $image  =$image->image;
 }

  


 if($signature  != ''){
        $DestinationSignature  = "public/uploads/signature";
       $sig = $unique_id.$signature->getClientOriginalName();

  $signature->move($DestinationSignature, 's'.$sig ,$signature->getClientOriginalName());
                $signature = 's'.$sig ;
}

else{
 $get =  DB::table('enquiries')->where('unique_id',$unique_id)->get();
    foreach($get as $sig)
    $signature = $sig->signature;
}

if($sip  != ""){
    $DestinationSip  =  'public/uploads/sip';
    $sipname = $unique_id.$sip->getClientOriginalName();
    $sip->move($DestinationSip, 'sip'.$sipname, $sip->getClientOriginalName()); 
    $sip =  'sip'.$sipname ; 
}
else{
    $get =  DB::table('enq_marriages')->where('enquiry_id', $unique_id)->get();
    foreach ($get as $get2) {
        $sip  = $get2->spouse_income_proof;
    }
}


        
        if( $request->input('marriage') == 'y'){
        $dom  = $request->input('dom');
        $spouse_qualification  = $request->input('spouse_qualification');

        $sip  = $sip ;
        }
        

$interested_intake = $request->input('interested_intake');
if($interested_intake  == null){
    $interested_intake = 0;
}
                
   $exp_batct2  = $request->input('exp_batct2');
        $exp_end2  = $request->input('exp_end2');
                $history  = $request->input('history');
$listening  = $request->input('listening');
        $writing  = $request->input('writing');
        $reading  = $request->input('reading');
        $speaking  = $request->input('speaking');

            $enquiries = new enquiries;
            $enquiries->where('unique_id',$unique_id)->update([
                  'image'        => $image,
            'name'        => $name,
            'dob'   =>$dob,
            'contact'      => $contact,
            'email'      => $email,
            'address_line1'  =>$address_line1,
            'city'  =>  $city,
            'country' => $country,
            'state'  =>$city,
            'contact'  => $contact,
            'state'  => $state,
            'unique_id'  =>$unique_id,
             'history' =>$history,
            'gender'  =>$gender,
            'category' =>$category,
            'id_proof' =>$id_proof,
            'id_proof_name'=>$id_proof_name,
            'id_proof_no' =>$id_proof_no,
            'father_name' =>$father_name,
            'occupation'  =>$occupation,
            'alternate_contact' =>$alternate_contact,
            'address_line2'   =>    $address_line2,
            'district'   => $district,
            'date'    => date("Y-m-d"),
'pincode'   => $pincode,
'signature'   => $signature,
'course_session' => $session,
'course_country' => $course_country,
'course'  =>   $course,
'course_intake'  => $interested_intake
]);

 







if($qualification_name != ''){
    $get  = DB::table('enq_educations')->where('enquiry_id',$unique_id)->get();
    if($get->count() > 0){


        for($i=0; $i<count($qualification_name); $i++){
        $enq_educations  = new enq_educations;
        foreach ($get as $get2) {
$enq_educations->where('enquiry_id', $unique_id)->where('class', $get[$i]->class)->update([
    'enquiry_id' =>   $unique_id,
    'class'   => $qualification_name[$i],
    'passing_year'        => $passing_year[$i],
    'percentage'        =>$percentage[$i] ,
    'stream'   =>$edu_stream[$i] ,
    'education_name' => $institute_name[$i]
]);
}
        }
    }
    else{
    for($i=0; $i<count($qualification_name); $i++){
    $enq_education1 = new enq_educations([
                'enquiry_id' =>   $unique_id,
                'class'   => $qualification_name[$i],
                'passing_year'        => $passing_year[$i],
                'percentage'        =>$percentage[$i] ,
                'stream'   =>$edu_stream[$i]  ,
                'education_name'   =>$institute_name[$i]
                ]);
$enq_education1->save();
    }
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
            'amount'        =>  $financial_amount[$i],
            'other'         => $request->other[$i]
        ]);
        }
    }
else{
    for($i=0; $i<count($financial); $i++){
$enq_financials   = new enq_financials([
        'enquiry_id'    =>   $unique_id,
        'financials_by' =>  $financial[$i],
        'amount'        =>  $financial_amount[$i],
        'other'         => $request->other[$i]
    ]);
    $enq_financials->save();
    }
}
}



// if($request->input('toefl') == 'on'){
//     dd($request->toefl);
// dd($request->input('ToeflReading'));

    $get  = DB::table('enq_exam_scores')->where('enquiry_id',$unique_id)->get();

    if($get->count() > 0){
$enq_exam_scores  = new enq_exam_scores;

$enq_exam_scores->where('enquiry_id', $unique_id)->where('language','toefl')->update([
    'enquiry_id'=> $unique_id,
        'language' => 'TOEFL',
    'listening' => $request->input('ToeflListning'),
    'reading'  =>$request->input('ToeflReading'),
    'writing'  =>$request->input('ToeflWriting'),
    'speaking' =>$request->input('ToeflSpeaking') ,
    'overall'  =>$request->input('toefl_over_all')
]);
    }
    else{
    $enq_exam_scores = new enq_exam_scores([
        'enquiry_id'=> $unique_id,
        'language' => 'TOEFL',
    'listening' => $request->input('ToeflListning'),
    'reading'  =>$request->input('ToeflReading'),
    'writing'  =>$request->input('ToeflWriting'),
    'speaking' =>$request->input('ToeflSpeaking'),
    'overall'  =>$request->input('toefl_over_all')
    ]);
    
    $enq_exam_scores->save();
}  
// }


// if($request->input('ielts') == 'on'){
    $get  = DB::table('enq_exam_scores')->where('enquiry_id',$unique_id)->where('language','ielts')->get();

    if($get->count() > 0){

 $enq_exam_scores = new enq_exam_scores;
 $enq_exam_scores->where('enquiry_id', $unique_id)->update([
    'enquiry_id'=> $unique_id,
    'language' => 'IELTS',
'listening' => $request->input('IeltsListning'),
'reading'  =>$request->input('IeltsReading'),
'writing'  =>$request->input('IeltsWriting'),
'speaking' =>$request->input('IeltsSpeaking'), 
'overall' =>$request->input('ieltsoverall') 
 ]);
 }
 else{
    $enq_exam_scores = new enq_exam_scores([
 
        'enquiry_id'=> $unique_id,
        'language' => 'IELTS',
    'listening' => $request->input('IeltsListning'),
    'reading'  =>$request->input('IeltsReading'),
    'writing'  =>$request->input('IeltsWriting'),
    'speaking' =>$request->input('IeltsSpeaking'),
    'overall' =>$request->input('ieltsoverall')
    ]);
        $enq_exam_scores->save();

    }
    // }
    





    // if($request->input('pte') == 'on'){

        $get  = DB::table('enq_exam_scores')->where('enquiry_id',$unique_id)->where('language','pte')->get();

        if($get->count() > 0){
$enq_exam_scores  =  new enq_exam_scores;
$enq_exam_scores->where('enquiry_id', $unique_id)->update([
    'enquiry_id'=> $unique_id,
    'language' => 'PTE',
'listening' => $request->input('PteListning'),
'reading'  =>$request->input('PteReading'),
'writing'  =>$request->input('PteWriting'),
'speaking' =>$request->input('PteSpeaking') , 
'overall' =>$request->input('pteoverall')  
]);


        }
        else{

    $enq_exam_scores = new enq_exam_scores([
           'enquiry_id'=> $unique_id,
           'language' => 'PTE',
       'listening' => $request->input('PteListning'),
       'reading'  =>$request->input('PteReading'),
       'writing'  =>$request->input('PteWriting'),
       'speaking' =>$request->input('PteSpeaking'),
       'overall' =>$request->input('pteoverall')  
       ]);
           $enq_exam_scores->save();
   }
    // }



      
// if($request->input('oet') == 'on'){
    
//   $get  = DB::table('enq_oet_scores')->where('enquiry_id',$unique_id)->where('language','pte')->get();



    $enq_oet_scores = new enq_exam_scores([  
           'enquiry_id'=> $unique_id,
           'language'  =>'OET',
    //       'listening' => $request->input('OetListening'),
    //    'reading'  =>$request->input('OetReading'),
    //    'writing'  =>$request->input('OetWriting'),
    //    'speaking' =>$request->input('OetSpeaking')
       
    'writing'        => json_encode([$request->OetWriting,$request->oet_writing_score] ),
    'speaking'        => json_encode([$request->OetSpeaking,$request->oet_speaking_score] ),
    'listening'   =>json_encode([$request->OetListening,$request->oet_listening_score] ),
    'reading' => json_encode([$request->OetReading,$request->oet_reading_score])
       ]);
           $enq_oet_scores->save();
           
           
           
        //    $enq_oet_scores = new enq_exam_scores([  
        //     'enquiry_id'=> $unique_id,
        //     'language'  =>'OET Score',
        //    'listening' => $request->input('oet_listening_score'),
        // 'reading'  =>$request->input('oet_reading_score'),
        // 'writing'  =>$request->input('oet_writing_score'),
        // 'speaking' =>$request->input('oet_speaking_score')]);
        //     $enq_oet_scores->save();

         
//    }


// if($request->gre_radio == "on"){
    $gre_gmat_language_scores = new gre_gmat_language_scores([
        'enquiry_id'=> $unique_id,
        'language'  => 'GRE',
        'gre_exam_date' => $request->input('gre_exam_date'),
        'gre_verbal_score'  =>$request->input('gre_verbal_score'),
        'gre_verbal_rank'  =>$request->input('gre_verbal_rank'),
        'gre_quantitative_score' =>$request->input('gre_quantitative_score'),
        'gre_quantitative_rank'  =>$request->input('gre_quantitative_rank'),
        'gre_written_score'  =>$request->input('gre_written_score'),
        'gre_written_rank' =>$request->input('gre_written_rank')
    ]);
    $gre_gmat_language_scores->save();
    // }


    // if($request->gmat_radio == "on"){
        $gre_gmat_language_scores = new gre_gmat_language_scores([
            'enquiry_id'=> $unique_id,
            'language'  => 'GMAT',
            'gre_exam_date' => $request->input('gmat_exam_date'),
            'gre_verbal_score'  =>$request->input('gmat_verbal_score'),
            'gre_verbal_rank'  =>$request->input('gmat_verbal_rank'),
            'gre_quantitative_score' =>$request->input('gmat_quantitative_score'),
            'gre_quantitative_rank'  =>$request->input('gmat_quantitative_rank'),
            'gre_written_score'  =>$request->input('gmat_written_score'),
            'gre_written_rank' =>$request->input('gmat_written_rank'),
            'gmat_total_score'  =>$request->input('gmat_total_score'),
            'gmat_total_rank' =>$request->input('gmat_total_rank')
        ]);
        $gre_gmat_language_scores->save();
        // }




if($company[0] != NULL){
    
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

if( $request->input('history') == 'y'){
    $get  = DB::table('enq_imm_historys')->where('enquiry_id',$unique_id)->get();
    
    if($get->count() > 0){
$enq_imm_historys  = new enq_imm_historys;
$enq_imm_historys->where('enquiry_id', $unique_id)->update([
    'enquiry_id' => $unique_id,
    'name' => $appliciant_name,
    'country' =>$old_imm_country,
    'visa_decision'=>$visa_decision,
    'visa_decision_date' => $visa_decision_date 
]);
    }
else{
$enq_imm_historys = new enq_imm_historys([
    'enquiry_id' => $unique_id,
    'name' => $appliciant_name,
    'country' =>$old_imm_country,
    'visa_decision'=>$visa_decision,
    'visa_decision_date' => $visa_decision_date
]);
$enq_imm_historys->save();
}
}
    





$travelled_before_country = $request->input('imm_history');
$travelled_before_from = $request->input('imm_history_from');
$travelled_before_to = $request->input('imm_history_to');
$travelled_before_duration = $request->input('imm_history_duration');
$imm_history_purpose  = $request->input('imm_history_purpose');

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
            'travelled_before_duration'  => $travelled_before_duration[$i],
            'imm_history_purpose'        => $imm_history_purpose[$i]
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
            'travelled_before_duration'  => $travelled_before_duration[$i],
             'imm_history_purpose'        => $imm_history_purpose[$i]
           ]) ;
           $enq_travelled_history->save();
        }
        }
    
    }




$dom = $request->input('dom');
$spouse_qualification  = $request->input('spouse_qualification');


   

if( $request->input('marriage') == 'y'){
   $get =  db::table('enq_marriages')->where('enquiry_id',$unique_id)->get();
        if($get->count() > 0 ){
            $enq_marriages = new enq_marriages;
            $enq_marriages->where('enquiry_id',$unique_id)->update( [   'enquiry_id' => $unique_id,
            'dom' => $dom,
            'spouse_qualification' =>$spouse_qualification,
            'spouse_income_proof'=>'sfsd',
            'interested_intake' => $interested_intake ])  ; 
        }
        
        else{
$enq_marriages = new enq_marriages([

    'enquiry_id' => $unique_id,
    'dom' => $dom,
    'spouse_qualification' =>$spouse_qualification,
    'spouse_income_proof'=>$sip,
    'interested_intake' => $interested_intake 
]);

$enq_marriages->save();

}
}


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


 $enq_new_user = new enq_new_users;
 $enq_new_user->where('unique_id',$unique_id)->update( [ 'complete_profile'   => 1]);
//  dd(NOW()); 
if(Auth::user()->usertype_status == 4){
return redirect('employee/student-list');
}
if(Auth::user()->usertype_status == 5){
    return redirect('subagent/student-list');
    }
    if(Auth::user()->usertype_status == 6){
        return redirect('icfei/student-list');
    }

    if(Auth::user()->usertype_status == 1){
        return redirect('admin/student-list');
        }
    }



public function search(Request $request){
    // startfilter
    $type = $request->type ;
// dd($type);
    
    
$where= " where ";
if(isset($request->filter_date_from) && !empty($request->filter_date_from)  && isset($request->filter_date_to) && !empty($request->filter_date_to)){
    $from = $request->filter_date_from;
    $from = str_replace('/', '-', $from);
    $todays_dates = date("d-m-Y");
    $todays = strtotime($todays_dates); 
    $expiration_date2 = strtotime($from);
    $request->filter_date_from2 = (date('Y-m-d',$expiration_date2));
    
    $exp_date = $request->filter_date_to;
    $exp_date = str_replace('/', '-', $exp_date);
    $todays_date = date("d-m-Y");
    $today = strtotime($todays_date); 
    $expiration_date = strtotime($exp_date);
    $request->filter_date_to2 = (date('Y-m-d',$expiration_date));
    $where .=" (date BETWEEN '$request->filter_date_from2' AND '$request->filter_date_to2') and ";
}else{
    $request->filter_date_from ='';
    $request->filter_date_to   ='';
}
if(isset($request->agent_id)   && !empty($request->agent_id) ){
    $where .= " enquiries.agent_unique_id  = '$request->agent_id' and ";
}else{
    $request->agent_id = '';
}
if(isset($request->status)   && !empty($request->status) ){
    // dd($request->status);
    $where .= " enquiries.disposition  = '$request->status' and ";
    
}else{
    $request->status = '';
}

if(isset($request->purpose_of_query)   && !empty($request->purpose_of_query) ){
    $where .= " enquiries.purpose_of_query  = '$request->purpose_of_query' and ";
}else{
    $request->purpose_of_query = '';
}



if(isset($request->searchbox)   && !empty($request->searchbox) ){
    
    $where .= " ( enquiries.name like '%$request->searchbox%' or enquiries.contact like '%$request->searchbox%' or enquiries.email like '%$request->searchbox%' or enquiries.id like '%$request->searchbox%' ) and ";
}else{
    $request->searchbox = '';
}

if(Auth::user()->usertype_status == 4){
    $where .= "  enquiries.agent_unique_id =  " .Auth::user()->unique_id. " and ";
}
if($type != 1){
if(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){
    $where .= "  users.company_id =  " .Auth::user()->unique_id. " and ";
}}
 if(Auth::user()->usertype_status == 5){
    $where .= "  users.company_id =  " .Auth::user()->unique_id. " and ";
    }
//  dd($where);
 $where .= " enquiries.delete_client = 1 and ";
 
if(isset($request->shortby)   && !empty($request->shortby) ){

    
  
   if($request->shortby == "Name"){
    
    $orderby = " ORDER BY enquiries.name ASC ";
}elseif($request->shortby == "Date"){
    
    $orderby = " ORDER BY enquiries.date DESC ";
}
elseif($request->shortby == "Email/phone number"){
    
    $orderby = " ORDER BY enquiries.email ASC ";
}elseif($request->shortby == "Id"){
    $orderby = " ORDER BY enquiries.id DESC ";
}else{
    $orderby = " ORDER BY enquiries.id DESC ";
    }}else{
$orderby = " ORDER BY enquiries.id DESC ";
    }

//   $where .= "    conversion = ".$type . $orderby ;
//  $where .= "  disposition != 'Dead Lead' and  conversion = ".$type . $orderby ;
 
 
 $where .= " ( disposition != 'Dead Lead' OR disposition IS NULL ) and  conversion = ".$type . $orderby ;
 
 
 if($type != 1){
     if(Auth::user()->usertype_status == 5 ){ 
 $search = DB::select(DB::raw(" SELECT *, enquiries.unique_id as unique_id , enquiries.id as id,enquiries.source as source, enquiries.date as date, enquiries.name as name,enquiries.contact as contact, enquiries.country as country,enquiries.unique_id as unique_id from enquiries  join users on enquiries.agent_unique_id = users.unique_id  $where "));
     
         //dd($search);
     }}
if($type == 1){
    // dd($_SERVER['REMOTE_ADDR']);
   
    // dd($where);
    // $search  = DB::select(DB::raw("SELECT * from enquiries  $where "));
    


   if(Auth::user()->usertype_status == 5 ){ 
    $search = DB::select(DB::raw(" SELECT *,enquiries.unique_id as unique_id , enquiries.id as id,enquiries.source as source, enquiries.date as date, enquiries.name as name,enquiries.contact as contact, enquiries.country as country,enquiries.unique_id as unique_id from enquiries join users on enquiries.agent_unique_id = users.unique_id  $where "));
// dd($search, $where);
   }
   

else{
$search  = DB::select(DB::raw("SELECT * from enquiries  $where "));
}}
//dd($search);
   $search =(collect($search));
   if(isset($request->page)){
       $page = $request->page;
   }else{
   $page = 1;  
   }
   if(isset($request->range_filter)){
    $range_filter = $request->range_filter;
}else{
$range_filter = 10;  
}

 
$get = new \Illuminate\Pagination\LengthAwarePaginator(
    $search->forPage($page, $range_filter),
    $search->count(),
    $range_filter,
    $page,
    ['path' => url(request()->segment(1).'/search'), "pageName" => "page"]
    );

   
    
$enq_status = DB::table('enq_status')->get();
 $enq_purposes = DB::table('enq_purposes')->get();

 $exp_date = $request->filter_date_from;
        $exp_date = str_replace('-', '/', $exp_date);
        $request->filter_date_from  = ($exp_date);
         
       
       // dd($_GET,$get,$request->filter_date_from);
            if($type==1){
               $get2 = $get;
   
        return view('student/student-list', compact([ 'get2', 'enq_status','enq_purposes' ]) )
        ->with('filter_date_from',$request->filter_date_from)
        ->with('filter_date_to',$request->filter_date_to)
        ->with('agent_id',$request->agent_id)
        ->with('status', $request->status)
        ->with('purpose_of_query', $request->purpose_of_query)
        ->with('search2',$request->searchbox)
        ->with('shortby2',$request->shortby)
        ->with('showentry',$request->range_filter)
        ->with('arr2', $request->shortby)
        ; 
            }
        
        return view('enquiry/enquiry-list', compact([ 'get', 'enq_status','enq_purposes' ]) )
        ->with('filter_date_from',$request->filter_date_from)
        ->with('filter_date_to',$request->filter_date_to)
        ->with('agent_id',$request->agent_id)
        ->with('status', $request->status)
        ->with('purpose_of_query', $request->purpose_of_query)
        ->with('search2',$request->searchbox)
        ->with('shortby2',$request->shortby)
        ->with('showentry',$request->range_filter)
        ->with('arr2', $request->shortby)
        ;
        

// endfilter

    $type = $request->type;
    $find_agent = DB::table('users')->where('employee_id', $request->id)->get();
    
    if($find_agent[0]->usertype_status == 1){
        

    // $search  = ze','%'.$request->search.'%')->orderBy('id', 'DESC')->get();


    $search = $request->search;
    $search  =  DB::table('enquiries')
        ->where('delete_client','1')
    ->where('conversion',$type)
    ->where('name','like','%'.$search.'%')
    ->orWhere('contact','like','%'.$search.'%')
    ->orWhere('email','like','%'.$search.'%')
    ->orWhere('dob','like','%'.$search.'%')
    ->orderBy('id', 'DESC')->get();


    $search_new_users  =  DB::table('enq_new_users')->where('complete_profile','0')
    
    ->where('name','like','%'.$request->search.'%')->orWhere('phone','like','%'.$request->search.'%')->orWhere('email','like','%'.$request->search.'%')->get();

    if(($request->filter_date_from) != null){
        
        // global  $a;
        $a = $request->search;
        
        $search  =  DB::table('enquiries')
        ->where('delete_client','1')
        ->where('conversion',$type)
        // ->where('name','like','%'.$request->search.'%')
        ->whereBetween('date',[$request->filter_date_from,$request->filter_date_to])
        ->where(function ($q)use ($a) {
            $q->Where('name','like','%'.$a.'%')
            ->orWhere('email','like','%'.$a.'%');
})
->orderBy('id', 'DESC')
            ->get();
        // dd($search );
    }

        if(($request->agent_id) != null){
            // dd($request->agent_id);
            $search  =  DB::table('enquiries')->where('conversion',$type)->where('delete_client','1')->where('agent_id',$request->agent_id)->orderBy('id', 'DESC')->get();
        }
        if(($request->status) !=null){
            
            $search  =  DB::table('enquiries')->where('conversion',$type)->where('delete_client','1')->where('disposition',$request->status)->orderBy('id', 'DESC')->get();
        }
    
        if(($request->purpose_of_query) !=null){
            
            $search  =  DB::table('enquiries')->where('conversion',$type)->where('delete_client','1')->where('purpose_of_query',$request->purpose_of_query)->orderBy('id', 'DESC')->get();
            }



        if ($request->has('purpose_of_query')) {
            // Has a 'city' search parameter also been provided?
            if ($request->has('agent_id')) {

            if($request->has('status')){
            // Search for a user based on their name and their city.
                $search =   DB::table('enquiries')
                ->where('purpose_of_query', $request->purpose_of_query)
                ->where('agent_id', $request->agent_id)
                ->where('disposition',  $request->status)
                ->where('conversion',$type)
                ->whereBetween('date',[$request->filter_date_from,$request->filter_date_to])
                ->orderBy('id', 'DESC')
                ->get();

         
                }
             }
             // return $user->where('name', $request->input('name'))->get();
        }

        if(($request->status &&  $request->agent_id)  != null ) {
            $search  =  DB::table('enquiries')->where('conversion',$type)->where('delete_client','1')->where('disposition',$request->status)->where('agent_id',$request->agent_id)->orderBy('id', 'DESC')->get(); 
        }
        
        if(($request->purpose_of_query &&  $request->agent_id)  != null ) {
            $search  =  DB::table('enquiries')->where('conversion',$type)->where('delete_client','1')->where('purpose_of_query',$request->purpose_of_query)->where('agent_id',$request->agent_id)->orderBy('id', 'DESC')->get(); 
        }

        if(($request->purpose_of_query &&  $request->status)  != null ) {
            $search  =  DB::table('enquiries')->where('conversion',$type)->where('delete_client','1')->where('purpose_of_query',$request->purpose_of_query)->where('disposition',$request->status)->orderBy('id', 'DESC')->get(); 
        }

        $enq_status = DB::table('enq_status')->get();
        $enq_purposes = DB::table('enq_purposes')->get();
        dd($request->filter_date_from, $search_new_users, $search,$enq_status, $enq_purposes);

        return view('enquiry/enquiry-list', compact(['search_new_users' , 'search', 'enq_status','enq_purposes' ]) )
        ->with('filter_date_from',$request->filter_date_from)
        ->with('filter_date_to',$request->filter_date_to)
        ->with('agent_id',$request->agent_id)
        ->with('status', $request->status)
        ->with('purpose_of_query', $request->purpose_of_query);    
        
        
        }else{
            
        $search = $request->search;
        
        $search  =  DB::table('enquiries')
        ->where('conversion',$type)
        ->where('agent_id',$request->id)
        ->where('delete_client','1')
        ->where('name','like','%'.$search.'%')
        ->orWhere('contact','like','%'.$search.'%')
        ->orWhere('email','like','%'.$search.'%')
        ->orWhere('dob','like','%'.$search.'%')
        ->orderBy('id', 'DESC')->get();
    

        if(($request->filter_date_from) != null){
            // global  $a;
            $a = $request->search;
            
            $search  =  DB::table('enquiries')
            ->where('agent_id',$request->id)
            ->where('delete_client','1')
            ->where('conversion',$type)
            ->where('name','like','%'.$request->search.'%')
            ->whereBetween('date',[$request->filter_date_from,$request->filter_date_to])
            ->Where('name','like','%'.$a.'%')
            ->orWhere('email','like','%'.$a.'%')
            ->orderBy('id', 'DESC')
            ->get();
        }

            if(($request->agent_id) != null){
                // dd($request->agent_id);
                $search  =  DB::table('enquiries')->where('conversion',$type)->where('agent_id',$request->id)->where('delete_client','1')->where('agent_id',$request->agent_id)->orderBy('id', 'DESC')->get();
            }
            if(($request->status) !=null){
                
                $search  =  DB::table('enquiries')->where('conversion',$type)->where('agent_id',$request->id)->where('delete_client','1')->where('disposition',$request->status)->orderBy('id', 'DESC')->get();
            }
    
        if(($request->purpose_of_query) !=null){
            
            $search  =  DB::table('enquiries')->where('conversion',$type)->where('agent_id',$request->id)->where('delete_client','1')->where('purpose_of_query',$request->purpose_of_query)->orderBy('id', 'DESC')->get();
            }



        if ($request->has('purpose_of_query')) {
            // Has a 'city' search parameter also been provided?
            if ($request->has('agent_id')) {
            
                if($request->has('status')){
                    // Search for a user based on their name and their city.
                    $search =   DB::table('enquiries')
                    ->where('agent_id',$request->id)
                    ->where('purpose_of_query', $request->purpose_of_query)
                    ->where('agent_id', $request->agent_id)
                    ->where('disposition',  $request->status)
                    ->whereBetween('date',[$request->filter_date_from,$request->filter_date_to])
                    ->orderBy('id', 'DESC')
                    ->get();

            // dd($search);
                }
             }
             // return $user->where('name', $request->input('name'))->get();
        }

        if(($request->status &&  $request->agent_id)  != null ) {
            $search  =  DB::table('enquiries')->where('conversion',$type)->where('agent_id',$request->id)->where('delete_client','1')->where('disposition',$request->status)->where('agent_id',$request->agent_id)->orderBy('id', 'DESC')->get(); 
        }
        
        if(($request->purpose_of_query &&  $request->agent_id)  != null ) {
            $search  =  DB::table('enquiries')->where('agent_id',$request->id)->where('conversion',$type)->where('delete_client','1')->where('purpose_of_query',$request->purpose_of_query)->where('agent_id',$request->agent_id)->orderBy('id', 'DESC')->get(); 
        }

        if(($request->purpose_of_query &&  $request->status)  != null ) {
            $search  =  DB::table('enquiries')->where('agent_id',$request->id)->where('conversion',$type)->where('delete_client','1')->where('purpose_of_query',$request->purpose_of_query)->where('disposition',$request->status)->orderBy('id', 'DESC')->get(); 
        }

        $enq_status = DB::table('enq_status')->get();
        $enq_purposes = DB::table('enq_purposes')->get();  
            
        return view('enquiry/enquiry-list', compact(['search_new_users' , 'search', 'enq_status','enq_purposes' ]) );
    }
} 



public function getalllist(Request $request){
    
  return  app('App\Http\Controllers\TabletEnquiryController')->get_list($request);  
}
 

public function existing_user(){
    
    $enq_status = DB::table('enq_status')->get();
$enq_purposes = DB::table('enq_purposes')->get();
return view('enquiry/existing-user',compact(['enq_status','enq_purposes']));
}

public function existing_user_add(Request $request){
if($request->input('candidate_id') != null)
$unique_id = $request->input('candidate_id');
$purpose = $request->input('purpose');
$status = $request->input('status');
$purpose_id = mt_rand(10000000,99999999);
$get = DB::table('enquiries')->where('unique_id' , $unique_id)->get();
$exist_purposes = DB::table('enq_exist_client_purposes')->where('unique_id' , $unique_id)->where('purpose',$purpose)->get();
// foreach($exist_purposes as $p)

if($get->count() > 0){

    if(($get[0]->purpose_of_query !=  $purpose)){
        if($exist_purposes->count() == 0){
    $enq_exist_client_purposes = new enq_exist_client_purposes([
'unique_id'  => $unique_id,
'purpose'    =>$purpose,
'status'     =>$status,
'purpose_id' => $purpose_id,
'agent_unique_id' => Auth::user()->unique_id,
'agent_id'  =>  Auth::user()->employee_id

]);
        $enq_exist_client_purposes->save();
    }
    else{
        echo"<script> alert('You Are Already Register For This Case'); </script>";
    }
    }
    else{
        echo"<script> alert('You Are Already Register For This Case'); </script>";
    }
}
else{
    echo"<script> alert('This User Not Exist'); </script>";
}
echo"<script> alert('Successfully Add New Case'); </script>";
return back();
}

// public function get_notification(){
//     $date = date("Y-m-d");
    
//   return $notification = DB::table('enquiries')->where('callbcklater', $date)->get(); 
   
//     return view('layouts/app', ['notification' , $notification]);
// }

public function range_filter(Request $request){

    $value = $request->range_filter;
    
    $id = Auth::user()->usertype_status;
    
    $find_agent = DB::table('users')->where('usertype_status', $id)->get();
    if($find_agent[0]->usertype_status == 1){
    
$get  = DB::table('enquiries')->where('delete_client','1')->orderBy('id', 'DESC')->where('conversion',0)->paginate($value);
// $new_user  = DB::table('enq_new_users')->where('complete_profile',0)->get();
// $enq_purposes = DB::table('enq_purposes')->get();
// $enq_status = DB::table('enq_status')->get();
return view('enquiry/enquiry-list', compact([ 'get', 'value' ]));
// return view('enquiry/enquiry-list', compact([ 'get' , 'new_user', 'enq_purposes', 'enq_status','value' ]));
    }else{
      
$get  = DB::table('enquiries')->where('delete_client','1')->where('conversion',0)->where('agent_unique_id',Auth::user()->unique_id)->orderBy('id', 'DESC')->paginate($value);

return view('enquiry/enquiry-list', compact([ 'get', 'value' ]));
    }

    
$get  = DB::table('enquiries')
->where('delete_client','1')
->where('agent_id',$id)
->where('conversion',0)
->orderBy('id', 'DESC')->paginate($value);
$new_user  = DB::table('enq_new_users')->where('complete_profile',0)->get();
$enq_purposes = DB::table('enq_purposes')->get();
$enq_status = DB::table('enq_status')->get();
return view('enquiry/enquiry-list', compact([ 'get' , 'new_user', 'enq_purposes', 'enq_status' ]));

}

public function callbacklater_old_comment(Request $request){

    
   

 return $get_cat = DB::table('enq_comments')->where('client_enquiry_id', $request->a)->orderBy('id','ASC')->get();

}

public function add_leads(Request $request){
    
    
    if($request->source == "Other"){
    $request->source = $request->source2;
}
    
    
    $request->validate([
            'name'              =>  'required',
            // 'contact'           =>  'required',
            // 'alternate_contact' =>  'required',   
            // 'email'             =>  'required|email',
        ]);
    // dd($request->comment,Auth::user()->employee_id, Auth::user()->unique_id);
    $unique_id = mt_rand(11111111,99999999);
    // if(isset($request->dob)){
    //     $request->dob = date('Y-m-d', strtotime($request->dob));
    // }
      if(isset($request->dob)){
    $dob = str_replace('/','-', $request->dob);
    $request->dob = date('Y-m-d', strtotime($dob));
        }

        
    $enquiries = enquiries::create([
        'name'=>$request->name,
        'unique_id' => $unique_id,
        'alternate_contact'  => $request->alternate_contact,
        'contact'      => $request->contact,
        'email'      => $request->email,
        'dob'        =>   $request->dob ,
        'date'       =>date("Y-m-d"),
        'callbacklater' => $request->input('date'),
        'callbacklater_time'    =>$request->time,
        'device'   => 'fa fa-desktop',
        'purpose_of_query'     => $request->note,
        'disposition'   => $request->status,
        'agent_unique_id'  => Auth::user()->unique_id,
        'agent_id'  =>  Auth::user()->employee_id,
        'agent_name'   =>  Auth::user()->name,
        'source' =>$request->source,
        'last_comment' =>  $request->comment,
        'conversion'  =>0,
        'country'   => $request->country,
        'passport' => $request->passport
        ]);
        
    
$enquiries = enq_comments::create([
    'client_enquiry_id' => $unique_id,
    'comment'  => $request->comment,
    'employee_unique_id' =>  Auth::user()->unique_id,
    'agent_id' => Auth::user()->employee_id,
    'calling_date' =>$request->input('date'),
    'callbacklater_time'=> $request->time,
    'agent_name' => Auth::user()->name
    ]);
enq_educations::create([
    'enquiry_id'  => $unique_id,
    'class'       => $request->qualification_name
    ]);
    Session::flash('message', "New Record Add Successfully"); 
   // return redirect()->route('');
   
   if(Auth::user()->usertype_status == 1){
return redirect('admin/enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id));
   }
elseif(Auth::user()->usertype_status == 5){
    return redirect('subagent/enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id));
}
elseif(Auth::user()->usertype_status == 6){
    return redirect('icfei/enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id));
}
else{
    return redirect('employee/enquiry-list/'.Crypt::encrypt(Auth::user()->employee_id));
}
    return back();
}
  
   //  public function add_lead(Request $request){

   //  $enquires = new enquiries;
   //  $enquires->name = $request->name;
   //  $enquires->unique_id = mt_rand(11111111,99999999);
   //  $enquires->alternate_contact = $request->alternate_contact;
   //  $enquires->contact = $request->phone;
   //  $enquires->email = $request->email;
   //  $enquires->save();
   //  //$enquires->name = $request->name;

   // return back();

   // }


   // public function unfollowList(Request $request){

   //  if(Auth::user()->usertype_status == 1){
   //      $getList = Helper::getAllUnfollowData($request->page);   
   //      $getStatus  = Helper::getAllStatus();
   //      $getPurpose = Helper::getPurpose();
   //      $getAllEmployee = Helper::getAllEmployee();
   //      return view('enquiry/unfollowup-client', compact(['getList','getStatus', 'getPurpose', 'getAllEmployee']));
   //  }

// }
public function calendar(){
    
}


public function hotlead(Request $request){
     $type = $request->type ;   
$where= " where ";
if(isset($request->filter_date_from) && !empty($request->filter_date_from)  && isset($request->filter_date_to) && !empty($request->filter_date_to)){
    $from = $request->filter_date_from;
    $from = str_replace('/', '-', $from);
    $todays_dates = date("d-m-Y");
    $todays = strtotime($todays_dates); 
    $expiration_date2 = strtotime($from);
    $request->filter_date_from2 = (date('Y-m-d',$expiration_date2));
    
    $exp_date = $request->filter_date_to;
    $exp_date = str_replace('/', '-', $exp_date);
    $todays_date = date("d-m-Y");
    $today = strtotime($todays_date); 
    $expiration_date = strtotime($exp_date);
    $request->filter_date_to2 = (date('Y-m-d',$expiration_date));
    $where .=" (date BETWEEN '$request->filter_date_from2' AND '$request->filter_date_to2') and ";
}else{
    $request->filter_date_from ='';
    $request->filter_date_to   ='';
}





if(isset($request->searchbox)   && !empty($request->searchbox) ){
    
    $where .= " ( mbbsgo.name like '%$request->searchbox%' or mbbsgo.number like '%$request->searchbox%' or mbbsgo.email like '%$request->searchbox%' or mbbsgo.id like '%$request->searchbox%' or mbbsgo.country like '%$request->searchbox%' ) and ";
}else{
    $request->searchbox = '';
}



 $where .= " mbbsgo.status = 1 ";
 
if(isset($request->shortby)   && !empty($request->shortby) ){
   if($request->shortby == "Name"){
    
    $orderby = " ORDER BY mbbsgo.name ASC ";
}elseif($request->shortby == "Date"){
    
    $orderby = " ORDER BY mbbsgo.date DESC ";
}
elseif($request->shortby == "Email/phone number"){
    
    $orderby = " ORDER BY mbbsgo.email ASC ";
}elseif($request->shortby == "Id"){
    $orderby = " ORDER BY mbbsgo.id DESC ";
}else{
    $orderby = " ORDER BY mbbsgo.id DESC ";
    }}else{
$orderby = " ORDER BY mbbsgo.id DESC ";
    }

   $where .=   $orderby ;

// echo "SELECT * from mbbsgo  $where ";

$search  = DB::SELECT(DB::RAW("SELECT * from mbbsgo  $where "));
// dd($search);

   $search =(collect($search));
   if(isset($request->page)){
       $page = $request->page;
   }else{
   $page = 1;  
   }
   if(isset($request->range_filter)){
    $range_filter = $request->range_filter;
}else{
$range_filter = 10;  
}
// dd($search);
 
$get = new \Illuminate\Pagination\LengthAwarePaginator(
    $search->forPage($page, $range_filter),
    $search->count(),
    $range_filter,
    $page,
    ['path' => url(request()->segment(1).'/hot-lead'), "pageName" => "page"]
    );

   
    
// $enq_status = DB::table('enq_status')->get();
//  $enq_purposes = DB::table('enq_purposes')->get();

 $exp_date = $request->filter_date_from;
        $exp_date = str_replace('-', '/', $exp_date);
        $request->filter_date_from  = ($exp_date);
         
       
    
     
               $get2 = $get;
//    dd($get2);
        return view('hot-leads', compact([ 'get2']) )
        ->with('filter_date_from',$request->filter_date_from)
        ->with('filter_date_to',$request->filter_date_to)
        
        ->with('search2',$request->searchbox)
        
        ->with('showentry',$request->range_filter)
        ->with('arr2', $request->shortby)
        ; 
            
      
        
}




public function delete_hot_lead(Request $request){

    DB::table('mbbsgo')->where('unique_id', $request->id)->update(['status' => 0]);
    
    Session::flash('message','Delete  Successfully!');
    return back();   
}





public function dead_leads(Request $request){
       $type = $request->type ;
      
$where= " where ";
if(isset($request->filter_date_from) && !empty($request->filter_date_from)  && isset($request->filter_date_to) && !empty($request->filter_date_to)){
    $from = $request->filter_date_from;
    $from = str_replace('/', '-', $from);
    $todays_dates = date("d-m-Y");
    $todays = strtotime($todays_dates); 
    $expiration_date2 = strtotime($from);
    $request->filter_date_from2 = (date('Y-m-d',$expiration_date2));
    
    $exp_date = $request->filter_date_to;
    $exp_date = str_replace('/', '-', $exp_date);
    $todays_date = date("d-m-Y");
    $today = strtotime($todays_date); 
    $expiration_date = strtotime($exp_date);
    $request->filter_date_to2 = (date('Y-m-d',$expiration_date));
    $where .=" (date BETWEEN '$request->filter_date_from2' AND '$request->filter_date_to2') and ";
}else{
    $request->filter_date_from ='';
    $request->filter_date_to   ='';
}
if(isset($request->agent_id)   && !empty($request->agent_id) ){
    $where .= " enquiries.agent_unique_id  = '$request->agent_id' and ";
}else{
    $request->agent_id = '';
}
if(isset($request->purpose_of_query)   && !empty($request->purpose_of_query) ){
    $where .= " enquiries.purpose_of_query  = '$request->purpose_of_query' and ";
}else{
    $request->purpose_of_query = '';
}
if(isset($request->searchbox)   && !empty($request->searchbox) ){
    
    $where .= " ( enquiries.name like '%$request->searchbox%' or enquiries.contact like '%$request->searchbox%' or enquiries.email like '%$request->searchbox%' or enquiries.id like '%$request->searchbox%' ) and ";
}else{
    $request->searchbox = '';
}

if(Auth::user()->usertype_status == 4){
    $where .= "  enquiries.agent_unique_id =  " .Auth::user()->unique_id. " and ";
}

if(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){
    $where .= "  users.company_id =  " .Auth::user()->unique_id. " and ";
}
// dd($where);
 $where .= " enquiries.delete_client = 1 and ";
 
if(isset($request->shortby)   && !empty($request->shortby) ){

    
  
   if($request->shortby == "Name"){
    
    $orderby = " ORDER BY enquiries.name ASC ";
}elseif($request->shortby == "Date"){
    
    $orderby = " ORDER BY enquiries.date DESC ";
}
elseif($request->shortby == "Email/phone number"){
    
    $orderby = " ORDER BY enquiries.email ASC ";
}elseif($request->shortby == "Id"){
    $orderby = " ORDER BY enquiries.id DESC ";
}else{
    $orderby = " ORDER BY enquiries.id DESC ";
    }}else{
$orderby = " ORDER BY enquiries.id DESC ";
    }

   $where .= " enquiries.disposition = 'Dead Lead' and enquiries.conversion In(0,1,2,3) "  . $orderby ;
// dd( (("SELECT * from enquiries join users on enquiries.agent_unique_id = users.unique_id  $where ")));

   if(Auth::user()->usertype_status == 5 || Auth::user()->usertype_status == 6){ 
    $search = DB::select(DB::raw(" SELECT *,enquiries.unique_id as unique_id , 'enquiries.id as id','enquiries.source as source', 'enquiries.date as date', 'enquiries.name as name','enquiries.contact as contact', 'enquiries.country as country','enquiries.unique_id as unique_id' from enquiries join users on enquiries.agent_unique_id = users.unique_id  $where "));
    
   }
else{
$search  = DB::select(DB::raw("SELECT * from enquiries  $where "));
}

   $search =(collect($search));
   if(isset($request->page)){
       $page = $request->page;
   }else{
   $page = 1;  
   }
   if(isset($request->range_filter)){
    $range_filter = $request->range_filter;
}else{
$range_filter = 10;  
}

 
$get = new \Illuminate\Pagination\LengthAwarePaginator(
    $search->forPage($page, $range_filter),
    $search->count(),
    $range_filter,
    $page,
    ['path' => url(request()->segment(1).'/dead-leads'), "pageName" => "page"]
    );

   
    
$enq_status = DB::table('enq_status')->get();
 $enq_purposes = DB::table('enq_purposes')->get();

 $exp_date = $request->filter_date_from;
        $exp_date = str_replace('-', '/', $exp_date);
        $request->filter_date_from  = ($exp_date);
         
       
    
            
               $get2 = $get;
   
        return view('dead-leads', compact([ 'get2', 'enq_status','enq_purposes' ]) )
        ->with('filter_date_from',$request->filter_date_from)
        ->with('filter_date_to',$request->filter_date_to)
        ->with('agent_id',$request->agent_id)
        ->with('status', $request->status)
        ->with('purpose_of_query', $request->purpose_of_query)
        ->with('search2',$request->searchbox)
        ->with('shortby2',$request->shortby)
        ->with('showentry',$request->range_filter)
        ->with('arr2', $request->shortby)
        ; 
            
    // return view('dead-leads', compact(['get2']));
}



public function trashed_hot_lead(){
    $get = DB::table('mbbsgo')->where('status',0)->paginate(10);
return view('trashed-hot-leads', compact(['get']));
}



}
 