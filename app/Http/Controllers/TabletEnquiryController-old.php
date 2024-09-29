<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Enquiryrequest;
use DB;
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
use Session;

 
class TabletEnquiryController extends Controller
{
    public function index(){
        $countries  =  DB::table('countries')->get();
        
        // get_detail( Request $request);
        
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




    public function insert_date(Request $request){
        $unique_id = mt_rand(10000000,99999999);
        $name = $request->input('name');
        $dob = $request->input('dob');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $address = $request->input('address');
        $country = $request->input('country');
        $state = $request->input('state');
        $city  = $request->input('city');
        $nationality  = $request->input('nationality');
        $marriage  = $request->input('marriage');
        
        if( $request->input('marriage') == 'y'){
        $dom  = $request->input('dom');
        $spouse_qualification  = $request->input('spouse_qualification');
        $sip  = $request->file('sip')->getClientOriginalName();
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

        $company    = $request->input('company');
        $designation  = $request->input('designation');
        $exp_start  = $request->input('exp_start');
        $exp_end  = $request->input('exp_end');
        
       




        


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
            
            'married'   =>  $marriage,
            'unique_id'  =>$unique_id,
            'interested_intake'  =>$interested_intake,
            'financial' =>$financial,
            'financial_amount' => $financial_amount,
            'history' =>$history,
            'date'       =>date("Y-m-d"),
            'device'  =>'fa fa-tablet'
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
    

// if($request->input('ielts') == 'y'){
//                 $enq_exam_scores = new enq_exam_scores([
//                     'enquiry_id' =>   $unique_id,
//                 'writing'  => $writing,
//                 'speaking'  => $speaking,
//                 'listening'  => $listening,
//                 'reading'   =>  $reading]);

//                 $enq_exam_scores->save();
//                 }

  
                
                $company = $request->input('company1');
                
                $start_date  = $request->input('exp_start1');
                $end_date  = $request->input('exp_end1');
                

//                 $company2 = $request->input('company2');
//                 $start_date2  = $request->input('exp_start2');
//                 $end_date2  = $request->input('exp_end2');

                
//                 $enq_experiences = new enq_experiences([
//                                         'enquiry_id' => $unique_id,
//                     'company_name'=>$company1,
//                     'start_date' =>$start_date1,
//                     'end_date'  =>$end_date1]);

//                     $enq_experiences->save();

if($request->input('company1')!=''){
for($i=0; $i<count($company); $i++){

    $enq_experiences = new enq_experiences([
    'enquiry_id' => $unique_id,
'company_name'=>$company[$i],
'start_date' =>$start_date[$i],
'end_date'  =>$end_date[$i] ]);
$enq_experiences->save();
     }  
    }


$appliciant_name = $request->input('appliciant_name');
$old_imm_country  = $request->input('old_imm_country');
$visa_decision  = $request->input('visa_decision');
$visa_decision_date  = $request->input('visa_decision_date');

if( $request->input('history') == 'y'){
$enq_imm_historys = new enq_imm_historys([
    'enquiry_id' => $unique_id,
    'name' => $appliciant_name,
    'country' =>$old_imm_country,
    'visa_decision'=>$visa_decision,
    'visa_decision_date' => $visa_decision_date
]);
$enq_imm_historys->save();
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


  public function get_list(){
      $get  = DB::table('enquiries')->get();
            // return view('enquiry/enquiry-list', [ 'get' => $get ]);
$get  =  enquiries::paginate(7);
            $new_user  = DB::table('enq_new_users')->where('complete_profile',0)->get();
            return view('enquiry/enquiry-list', compact([ 'get' , 'new_user' ]));
            
}


public function get_detail(Request $request){
    Session::forget('unique_id_sess');
$id = $request->id;

    $enquiries  = DB::table('enquiries')->where('unique_id' ,$id)->get();
    $enq_educations  = DB::table('enq_educations')->where('enquiry_id' ,$id)->get();
    $enq_exam_scores  = DB::table('enq_exam_scores')->where('enquiry_id' ,$id)->get();
    $enq_experiences  = DB::table('enq_experiences')->where('enquiry_id' ,$id)->get();
    // $enq_imm_historys  = DB::table('enq_imm_historys')->where('enquiry_id' ,$id)->get();
    $enq_marriages  = DB::table('enq_marriages')->where('enquiry_id' ,$id)->get();
    $enq_financials  = DB::table('enq_financials')->where('enquiry_id', $id)->get();
    $enq_travelled_historys = DB::table('enq_travelled_historys')->where('enquiry_id', $id)->get();
    $enq_visa_rejected_countrys = DB::table('enq_visa_rejected_countrys')->where('enquiry_id', $id)->get();
                   
                //    ->join('enq_educations','enquiries.unique_id', '=' , 'enq_educations.enquiry_id' )
                //    ->join('enq_exam_scores','enquiries.unique_id', '=' , 'enq_exam_scores.enquiry_id')
                //    ->join('enq_experiences','enquiries.unique_id', '=' , 'enq_experiences.enquiry_id')
                //    ->join('enq_imm_historys','enquiries.unique_id', '=' , 'enq_imm_historys.enquiry_id')
                //    ->join('enq_marriages','enquiries.unique_id', '=' , 'enq_marriages.enquiry_id')
                //    ->select('enquiries.*','enquiries.name','enq_educations.*','enq_exam_scores.*','enq_experiences.*','enq_imm_historys.name', 'enq_marriages.*')->where('unique_id',81322036 )
                //    ->get();


// dd($enq_educations);

                   
return view('enquiry/enquiry-detail', compact(['id','enquiries' , 'enq_educations', 'enq_exam_scores','enq_experiences', 'enq_marriages','enq_financials', 'enq_travelled_historys', 'enq_visa_rejected_countrys'] ));
                }



                public function update_status(Request $id){
                    
//$unique_id = $unique_id;
                    // dd($id);
                    // $unique_id  = $id->$unique_id;
                    $a = $id->a;
                    $id = $id->id;
                    
                    
                        $enquiries = new enquiries; 
           return       $enquiries->where('unique_id',$a)->update(['disposition' => $id]);
                 
                }
  
}
