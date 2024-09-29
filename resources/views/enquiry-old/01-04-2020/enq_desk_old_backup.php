<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnquiryDesktopRequest;
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
use App\enq_course_enrolls;

class EnquiryController extends Controller
{
    public function index(){
        
        $countries  =  DB::table('countries')->get();
       
     
        return view('enquiry/enquiry-desktop',['countries'=>$countries]);
    }

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






    public function insert_date(EnquiryDesktopRequest $request){

        $enquiries= new enquiries();
        


        $enquiries->unique_id  = mt_rand(10000000,99999999);
        $enquiries->name = $name = $request->input('name');
           $enquiries->dob      =$dob = $request->input('dob');
           $enquiries->contact      =$contact = $request->input('contact');
           $enquiries->gender      =$gender  = $request->input('gender');
           $enquiries->category     =$category =$request->input('category');
          $enquiries->id_proof      = $id_proof = $request->input('id_proof');
           $enquiries->id_proof_name      =$id_proof_name = $request->input('id_proof_name');
          $enquiries->id_proof_name      = $id_proof_no = $request->input('id_proof_name');
          $enquiries->father_name      = $father_name = $request->input('father_name');
           $enquiries->occupation      =$occupation = $request->input('occupation');
          $enquiries->alternate_contact      = $alternet_contact = $request->input('alternet_contact');
          $enquiries->address_line1      = $address_line1 = $request->input('address_line1');
          $enquiries->address_line2      = $address_line2 = $request->input('address_line2');
          $enquiries->district      = $district = $request->input('district');
          $enquiries->pincode      = $pincode = $request->input('pincode');
           $enquiries->session      =$session = $request->input('session');
          $enquiries->course_country      = $course_country = $request->input('course_country');
          $enquiries->course      = $course = $request->input('course');
           $enquiries->batch      =$batch = $request->input('batch');
          $enquiries->exam      = $exam = $request->input('exam');
           $enquiries->course_stream      =$course_stream = $request->input('course_stream');
           $enquiries->institute_name      =$institute_name = $request->input('institute_name');
          $enquiries->passing_year      = $passing_year = $request->input('passing_year');
          $enquiries->percentage      = $percentage = $request->input('percentage');
          $enquiries->edu_stream      = $edu_stream = $request->input('edu_stream');
           $enquiries->company      =$company = $request->input('company');
          $enquiries->designation      = $designation = $request->input('designation');
          $enquiries->exp_start      = $exp_start  = $request->input('exp_start');
          $enquiries->exp_end      = $end_date  = $request->input('exp_end');
          $enquiries->financial      = $financial  = $request->input('financial');
           $enquiries->alternate_contact      =$alternate_contact  = $request->input('alternate_contact');
          $enquiries->qualification_name      = $qualification_name  = $request->input('qualification_name');
        $enquiries->contact      = $contact = $request->input('contact');
         $enquiries->email      = $email = $request->input('email');
            $enquiries->country      = $country = $request->input('country');
          $enquiries->state      =$state = $request->input('state');
         $enquiries->city= $city  = $request->input('city');
         $enquiries->nationality      = $nationality  = $request->input('nationality');
         $enquiries->marriage      = $marriage  = $request->input('marriage');
         
         $enquiries->save();
         dd($enquiries);

        // $image = $request->file('image')->getClientOriginalName();
        // $signature = $request->file('signature')->getClientOriginalName();
        


//         $image = $request->input('image');
// $signature  = $request->input('signature');


        // $destinationPath = 'uploads';
        // $image->move($destinationPath,$image);
        // $signature->move($destinationPath,$signature);
        
//   $name = $request->input('name');
                
// $dob = $request->input('dob');
        
//          $gender  = $request->input('gender');
//          $category =$request->input('category');
//          $id_proof = $request->input('id_proof');
//          $id_proof_name = $request->input('id_proof_name');
//          $id_proof_no = $request->input('id_proof_no');
//          $father_name = $request->input('father_name');
//          $occupation = $request->input('occupation');
//          $alternet_contact = $request->input('alternet_contact');
//          $address_line1 = $request->input('address_line1');
//          $address_line2 = $request->input('address_line2');
//          $district = $request->input('district');
//          $pincode = $request->input('pincode');
//          $session = $request->input('session');
//          $course_country = $request->input('course_country');
//          $course = $request->input('course');
//          $batch = $request->input('batch');
//          $exam = $request->input('exam');
//          $course_stream = $request->input('course_stream');
//          $institute_name = $request->input('institute_name');
//          $passing_year = $request->input('passing_year');
//          $percentage = $request->input('percentage');
//          $edu_stream = $request->input('edu_stream');
//          $company = $request->input('company');
//          $designation = $request->input('designation');
//          $exp_start  = $request->input('exp_start');
//          $end_date  = $request->input('exp_end');
//          $financial  = $request->input('financial');
//          $alternate_contact  = $request->input('alternate_contact');
//          $qualification_name  = $request->input('qualification_name');
//        $contact = $request->input('contact');
//         $email = $request->input('email');
//            $country = $request->input('country');
//         $state = $request->input('state');
//         $city  = $request->input('city');
//         $nationality  = $request->input('nationality');
//         $marriage  = $request->input('marriage');
        
        

// if($image || $signature || $dob || $gender || $category ||     $id_proof || $id_proof_name || $id_proof_no || $father_name||$occupation ||$alternet_contact ||$address_line1  || $address_line2 || $district || $pincode  || $session  || $course_country ||$course ||        $batch ||$exam  || $course_stream || $institute_name || $passing_year  || $percentage || $edu_stream ||      $company || $designation || $exp_start || $end_date || $financial || $alternate_contact||$qualification_name  || $email || $country || $state || $city || $nationality || $marriage == "" )

// {

// $image = $signature =  $gender   = $actegory   =     $id_proof   = $id_proof_name   = $id_proof_no   = $father_name  =$occupation   =$alternet_contact   =$address_line1    = $address_line2   = $district   = $pincode    = $session    = $course_country   =$course   =        $batch   =$exam    = $course_stream   = $institute_name   = $passing_year    = $percentage   = $edu_stream   =      $company   = $designation   = $financial   = $alternate_contact  =$qualification_name      = $email   = $country   = $state   = $city   = $nationality   = $marriage  = $category = '0';
//  $exp_start   = $end_date   =      $dob =  '2019-05-03';

// }



        if( $request->input('marriage') == 'y'){
        $dom  = $request->input('dom');
        $spouse_qualification  = $request->input('spouse_qualification');
        
        }
        
        


        if(!empty( $request->has('interested_intake')) ||  !empty( $request->has('ielts'))  || !empty( $request->has('alternate_contact'))   )
        {
            $interested_intake  = $request->has('interested_intake');
            $ielts  = $request->has('ielts');
            $alternate_contact  = $request->has('alternate_contact');
            
}

                
      
        
        
        

        $exp_batct2  = $request->input('exp_batct2');
        $exp_end2  = $request->input('exp_end2');
        
        $history  = $request->input('history');


        $listening  = $request->input('listening');
        $writing  = $request->input('writing');
        $reading  = $request->input('reading');
        $speaking  = $request->input('speaking');

        // $ielts = $request->input('ielts');



$unique_id = mt_rand(10000000,99999999);

        $enquiry = new enquiries([
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
            'nationality'  => $nationality,
            'married'   =>  $marriage,
            'unique_id'  =>$unique_id,
            'interested_intake'  =>$interested_intake,
            'financial' =>$financial,
            'income' =>44355,
            'history' =>$history,
            'ielts'  =>$ielts,
            'gender'  =>$gender,
            'category' =>$category,
            'id_proof' =>$id_proof,
            'id_proof_name'=>$id_proof_name,
            'id_proof_no' =>$id_proof_no,
            'father_name' =>$father_name,
            'occupation'  =>$occupation,
            'alternate_contact' =>$alternate_contact,
            'address_line2'   => 	$address_line2,
            'district'   => $district,
'pincode'   => $pincode,
'signature'   => $signature
            ]);
$enquiry->save();

if($qualification_name != '0'){
    for($i=0; $i<count($qualification_name); $i++){
    $enq_education1 = new enq_educations([
                'enquiry_id' =>   $unique_id,
                'class'   => $qualification_name[$i],
                'passing_year'        => $passing_year[$i],
                'percentage'        =>$percentage[$i] ,
                'education_name'   =>$edu_stream[$i]
                ]);
$enq_education1->save();
    }
}
    

if($request->input('ielts') == 'y'){
                $enq_exam_scores = new enq_exam_scores([
                    'enquiry_id' =>   $unique_id,
                'writing'  => $writing,
                'speaking'  => $speaking,
                'listening'  => $listening,
                'reading'   =>  $reading]);
 $enq_exam_scores->save();
                }

  
            
             

// if(($request->input('company')) !== '0'){
// for($i=0; $i<count($company); $i++){

//     $enq_experiences = new enq_experiences([
//     'enquiry_id' => $unique_id,
// 'company_name'=>$company[$i],
// 'start_date' =>$exp_start[$i],
// 'end_date'  =>$end_date[$i] ]);
// $enq_experiences->save();
//      }
//     }


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


   

if( $request->input('marriage') == 'y'){
$enq_marriages = new enq_marriages([
    'enquiry_id' => $unique_id,
    'dom' => $dom,
    'spouse_qualification' =>$spouse_qualification,
    'spouse_income_proof'=>'sfsd',
    'interested_intake' => $interested_intake 
]);
$enq_marriages->save();
}



if($request->get('session')== true){
    $enq_course_enrolls = new enq_course_enrolls([
        'enquiry_id' => $unique_id,
        'session'  => $session,
        'country'   =>$course_country,
        'course'   =>$course,
        'batch_type' =>$batch,
        'exam'  =>$exam,
        'stream'   =>$course_stream
    ]);

    $enq_course_enrolls->save();
}

 
return back();
}






}
