<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\enq_visa_rejected_countrys;
use App\enquiries;
use App\enq_educations;
use App\enq_travelled_historys;
use App\enq_financials;
use App\enq_exam_scores;
use App\enq_experiences;
use App\chat_client_to_employees;
use App\parent_sibling_details;
use App\sibling_details;
use Session;
use App\Helpers\Helper;
use App\enq_id_proof;
use App\enq_residense_last_five_year;
use App\enrolment_documents;
use App\client_notification;
use App\enq_payments;
use App\enq_financial_doc;
use Input;
use Auth;
use App\gre_gmat_language_scores;

class EditClientController extends Controller
{
    public function edit_client_overview(Request $request){
        // dd($request->city, $request->state); 
        
        // $dob = str_replace('/','-', $request->dob);
        
            if(isset($request->dob)){
                
    $d = explode('/', $request->input('dob'));
    $dob =    date("$d[2]-$d[1]-$d[0]");
    }else{
    $dob = 'dfgdg';
    } 
    // dd($dob);
        $edit_overview = new enquiries;
        
         $edit_overview->where('unique_id', $request->unique_id)
     
         ->update([
             'gender' => $request->gender,
             'dob'  => $dob,
             'contact' => $request->number,
             'email'  => $request->email,
             'address_line1'  => $request->street,
             'country'  =>$request->country,
             'state'     =>$request->state,
             'city'     =>$request->city,
             'country_of_birth' =>$request->country_of_birth,
             'satate_of_birth' =>$request->satate_of_birth,
             'place_of_birth' =>$request->place_of_birth,
             'religoius' => $request->religoius,
             'current_country_of_residence' =>$request->current_country_of_residence,
             'nationility' =>$request->nationility,
             'medical_histoty' =>$request->medical_histoty,
             'criminal_histry' => $request->criminal_histry,
             'hold_other_nationality' =>$request->hold_other_nationality,
             'pincode'  =>$request->pincode,
             'alternate_contact' => $request->alternate_contact,
             'residence_phone_no'=> $request->residence_phone_no,
             'alterate_email'=> $request->alterate_email,
'whatsapp_no'=> $request->whatsapp_no,
'skype_id' => $request->skype_id            

         ]);
         Session::flash('message', "Successfully Updated"); 
return back();
    }

public function edit_client_qualification(Request $request){
    // dd($request->unique_id, $request->name_of_class);
    $unique_id = $request->unique_id;
    // dd($unique_id);
    $qualification_name =  $request->name_of_class;
    $passing_year = $request->passing_year;
    $percentage = $request->percentage;
    $institute_name = $request->education_name;
    $edu_stream     =$request->edu_stream;

    if($qualification_name != ''){
        // dd($qualification_name);
        // for($i=0; $i<count($qualification_name); $i++){
            // dd($unique_id);
        $enq_educations = enq_educations::updateOrCreate(
            ['class'    => $qualification_name],
            [
                'enquiry_id' =>   $unique_id,
                    'class'   => $qualification_name,
                    'passing_year'        => $passing_year,
                    'percentage'        =>$percentage ,
                    'stream'   =>$edu_stream ,
                    'education_name' => $institute_name,
                    'institute_name'     => $request->institute_name,
                    'edu_start_date'    => $request->edu_start_date,
                    'edu_end_date'    => $request->edu_end_date,
                    'course_duration'    => $request->course_duration,
                    'award_year'    => $request->award_year,
                    'study_medium'    => $request->study_medium,
                    'mode_of_study'    => $request->mode_of_study,
'country_of_study'    => $request->country_of_study,
'state_of_study'    => $request->state_of_study,
               'place_of_study'    => $request->place_of_study

                    ]);
    $enq_educations->save();
        }
    // }
        
    //     $get  = DB::table('enq_educations')->where('enquiry_id',$unique_id)->get();
    //     // dd($qualification_name,$get);
    //     if($get->count() > 0){
    //         for($i=0; $i<count($qualification_name); $i++){
    //         $enq_educations  = new enq_educations;
    //         foreach ($get as $get2) {
    // $enq_educations->where('enquiry_id', $unique_id)->where('class', $get[$i]->class)->update([
    //     'enquiry_id' =>   $unique_id,
    //     'class'   => $qualification_name[$i],
    //     'passing_year'        => $passing_year[$i],
    //     'percentage'        =>$percentage[$i] ,
    //     'stream'   =>$edu_stream[$i] ,
    //     'education_name' => $institute_name[$i]
    // ]);
    // }
    //         }
    //     }
    //     else{
    //     for($i=0; $i<count($qualification_name); $i++){
    //     $enq_education1 = new enq_educations([
    //                 'enquiry_id' =>   $unique_id,
    //                 'class'   => $qualification_name[$i],
    //                 'passing_year'        => $passing_year[$i],
    //                 'percentage'        =>$percentage[$i] ,
    //                 'stream'   =>$edu_stream[$i]  ,
    //                 'education_name'   =>$institute_name[$i]
    //                 ]);
    // $enq_education1->save();
    //     }
    // }
    // }
    Session::flash('message', "Update Successfully");   
    return back();
}


public function update_experience(Request $request ){

    $unique_id = $request->unique_id;
    
    $company_name = $request->company_name;
    
    $start_date   =$request->start_date;
    $end_date    = $request->end_date;
    $designation = $request->designation;
    // dd($company_name);  

    if($company_name != ''){
        
//         $get  = DB::table('enq_experiences')->where('enquiry_id',$unique_id)->get();
//     if($get->count() > 0){
//         for($i=0; $i<count($company_name); $i++){
//         $enq_experiences  = new enq_experiences;
//         foreach ($get as $get2) {
// $enq_experiences->where('enquiry_id', $unique_id)->where('id', $get[$i]->id)->update([
//     'enquiry_id' =>   $unique_id,
//     'company_name'   => $company_name[$i],
//     'start_date'        => $start_date[$i],
//     'end_date'        =>$end_date[$i] ,
//     // 'stream'   =>$edu_stream[$i] ,
//     'designation' => $designation[$i]
// ]);
// }   }
//     }
    // else{
        // for($i=0; $i<count($company_name); $i++){
            // dd($unique_id);
        $enq_experiences = enq_experiences::updateOrCreate(
            ['company_name'    => $company_name],
            [
                    'enquiry_id' =>   $unique_id,
                    'company_name'   => $company_name,
                    'start_date'        => $start_date,
                    'end_date'        =>$end_date ,
                    'designation'   =>$designation,
                    'occupation'       =>$request->occupation,
                    'place_of_work'       =>$request->place_of_work,
                    'country_of_work'       =>$request->country_of_work,
                    'job_responsibilities'       =>$request->job_responsibilities,
                    'contact_person_name'       =>$request->contact_person_name,
                    'contact_person_designation'       =>$request->contact_person_designation,
                    'contact_person_phone'       =>$request->contact_person_phone,
                    'contact_person_email'       =>$request->contact_person_email,
                    'total_no_of_employess'       =>$request->total_no_of_employess,
                    'total_no_of_managers'       =>$request->total_no_of_managers,
                    'total_no_of_other_staff'       =>$request->total_no_of_other_staff  
                    
                    ]);
    $enq_experiences->save();
        // }
    // } 
    Session::flash('message', "Update Successfully"); 
    return back(); 
}
else{
    Session::flash('message', "Please Provide Company Name"); 
    return back(); 
}
} 

public function update_score(Request $request){
   

    $unique_id = $request->unique_id;
    $language = $request->language;

    if(isset($request->upload_score_card)){
        $destinationPath = "public/uploads/documents/english-score/$unique_id";
            $img =  $request->upload_score_card->getClientOriginalName();
            $request->upload_score_card->move($destinationPath ,$img,$request->upload_score_card->getClientOriginalName());
            $upload_score_card  = $img ;
                         }else{
                            $upload_score_card = $request->upload_score_card_hidden;
                         }
                         if($language != ''){
                            
                            if($language == 'OET'){ 
                            $enq_exam_scores = enq_exam_scores::updateOrCreate(
                ['language'    => $language,
                'enquiry_id'=> $unique_id
            ],
                [
                     'enquiry_id'=> $unique_id,
                        'writing'        => json_encode([$request->writing,$request->writing_score] ),
                        'speaking'        => json_encode([$request->speaking,$request->speaking_score] ),
                        'listening'   =>json_encode([$request->listening,$request->listening_score] ),
                        'reading' => json_encode([$request->reading,$request->reading_score] ),
                        'exm_reference_no'   => $request->exm_reference_no,
                        'exam_type'   => $request->exam_type,
                        'overall'   => $request->overall,
                        'upload_score_card'   => $upload_score_card,
                        'examination_country'   => $request->examination_country,
                        'examination_city'   => $request->examination_city
                        ]);
        $enq_exam_scores->save();
                }else{
                    
                    $enq_exam_scores = enq_exam_scores::updateOrCreate(
                        ['language'    => $language,
                        'enquiry_id'=> $unique_id
                    ],
                        [
                             'enquiry_id'=> $unique_id,
                                'writing'        => $request->writing,
                                'speaking'        =>$request->speaking ,
                                'listening'   =>$request->listening ,
                                'reading' => $request->reading,
                                'exm_reference_no'   => $request->exm_reference_no,
                                'exam_type'   => $request->exam_type,
                                'overall'   => $request->overall,
                                'upload_score_card'   => $upload_score_card,
                                'examination_country'   => $request->examination_country,
                                'examination_city'   => $request->examination_city
                                ]);
                $enq_exam_scores->save();
                }
    } 
    Session::flash('message', "Update Successfully"); 
    return back(); 
}

public function update_enrolment_course(Request $request){
    // dd($request->unique_id);
    $update_enrolment = new enquiries;
    $update_enrolment->where('unique_id', $request->unique_id)
    ->update([
        'course_session' => $request->course_session,
        'course_country'  => $request->course_country,
        'course' => $request->course,
        'course_intake'  =>$request->course_intake
    ]);
    Session::flash('message', "Update Successfully");
return back();
}


public function update_student_financial(Request $request){
    $unique_id = $request->unique_id;
    echo $financial_by = $request->financial_by;
    $amount =  $request->amount;
    $other =  $request->other[0];
    // dd($other);
    if(!empty($request->financial_by_hide)){
        $financial_by = $request->financial_by;
    }
// dd($unique_id,$financial_by,$amount);
    // if($request->financial_by != ''){
    //     $get  = DB::table('enq_financials')->where('enquiry_id',$unique_id)->get();
    //     if($get->count() > 0){
    //         for($i=0; $i<count($request->financial_by); $i++){
    //         $enq_financials  = new enq_financials;
    //         foreach ($get as $get2) {
    // $enq_financials->where('enquiry_id', $unique_id)
    // ->update([
    //     'financials_by'   => $request->financial_by[$i],
    //     'amount'        => $request->amount[$i],
    //      ]);
    // }}}}     



    // for($i=0; $i<count($financial_by); $i++){
        // dd($unique_id);
    $enq_financials = enq_financials::updateOrCreate(
        ['financials_by'    => $financial_by],
        [
                'enquiry_id' =>   $unique_id,
                'amount'   => $amount ,
                'other'  => $other
                ]);
$enq_financials->save();
    // }

    Session::flash('message','Update Successfully');
    return back(); 
}





public function update_visa_rejected(Request $request){

    $unique_id = $request->unique_id;

        if($request->travelled_before_country != ''){
            // for($i=0; $i<count($request->travelled_before_country); $i++){
                // dd($unique_id);
            $enq_travelled_historys = enq_travelled_historys::updateOrCreate(
                ['travelled_before_country'    => $request->travelled_before_country],
                [
                    'enquiry_id' =>   $unique_id,
                    'travelled_before_country'=>$request->travelled_before_country,
                        'travelled_before_from'   => $request->travelled_before_from,
                        'travelled_before_to'        => $request->travelled_before_to,
                        'travelled_before_duration'        =>$request->travelled_before_duration 
                        ]);
        $enq_travelled_historys->save();
            // }
        }


    //     $get  = DB::table('enq_travelled_historys')->where('enquiry_id',$unique_id)->get();
    //     if($get->count() > 0){
    //         for($i=0; $i<count($request->travelled_before_country); $i++){
    //         $enq_travelled_historys  = new enq_travelled_historys;
    //         foreach ($get as $get2) {
    // $enq_travelled_historys->where('enquiry_id', $unique_id)
    // // ->where('class', $get[$i]->class)
    // ->update([
    //     'travelled_before_country'   => $request->travelled_before_country[$i],
    //     'travelled_before_from'        => $request->travelled_before_from[$i],
    //     'travelled_before_to'        =>$request->travelled_before_to[$i] ,
    //     'travelled_before_duration' => $request->travelled_before_duration[$i]
    // ]);
    // }}}
    
    Session::flash('message','Update Successfully');
    return back();
}



public function update_idproof(Request $request){

    $unique_id = $request->unique_id;

    // $getid_img = Helper::get_client_id_proof($unique_id);
    
    // for($i=0; $i<count($request->id_proof); $i++){


//         if(($request->id_image[$i]) ){
//    $file =   $request->id_image[$i];  
//    $destinationPath = "public/uploads/image/passport/other";
//    $img =  $unique_id.$file->getClientOriginalName();
//    $file->move($destinationPath ,'i'.$img,$file->getClientOriginalName());
//    $file  = 'i'.$img ;
// }


// $getid_img = Helper::get_client_id_proof($unique_id);

// foreach($request->id_image_hidden  as $key => $value){  



   
   $file = ($request->id_image_hidden);  
//    dd($file);
if(isset($file)){
        $destinationPath = "public/uploads/image/passport/other/$unique_id";
            $img =  $file->getClientOriginalName();
            $file->move($destinationPath ,$img,$file->getClientOriginalName());
            $file  = $img ;
                         }else{
                             $file = $request->id_image_hidden1;
                         }
    //    echo "imgid : ".$imgid;
    //    echo "imgkey : ".$imgindex;

   
//    }

//    else{
// $file = $getid_img[$i]->id_image;
//    }
// for($i=0; $i<count($request->id_proof); $i++){
    
   $enq_id_proof = enq_id_proof::updateOrCreate(
        ['id_proof'    => $request->id_proof,
        'enquiry_id'=> $unique_id
    ],
        [ 'enquiry_id'=> $unique_id,
            'id_proof'  => $request->id_proof,
            'name_on_id_proof' => $request->name_on_id_proof,
            'id_proof_number' => $request->id_proof_number,
            'id_image'        => $file
        ]);
        $enq_id_proof->save();

                Session::flash('message', "Document Successfully Updated");
                return back();
                

    // $unique_id = $request->unique_id;
    // $id_proof = json_encode($request->id_proof);
    // $id_proof_name = json_encode($request->id_proof_name);
    // $id_proof_no = json_encode($request->id_proof_no);
    // // dd($id_proof,$id_proof_name, $id_proof_no, $unique_id);
    // if($request->id_proof != ''){
    // $update_document =  new enquiries;
    // $update_document->where('unique_id', $unique_id)
    // ->update([
    // 'id_proof' => $id_proof,
    //     'id_proof_name'  => $id_proof_name,
    //     'id_proof_no' => $id_proof_no]
    // );
    
     

} 

public function edit_client_name(Request $request){
    $unique_id = $request->unique_id;
   $edit_client_name = $request->edit_client_name;

   $update_name =  new enquiries;
   $update_name->where('unique_id',$unique_id)
   ->update([
       'name' => $edit_client_name
   ]);
   Session::flash('message','Name Updated Successfully');
   return back();
}

public function edit_client_image(Request $request){
    $unique_id = $request->unique_id;
   $image  = $request->edit_client_image;
   
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

$update_name =  new enquiries;
$update_name->where('unique_id',$unique_id)
->update([
    'image' => $image
]);
Session::flash('message','Image Updated Successfully');
return back();


}



public function update_activity(Request $request){
    if($request->a == "Appoinment"){
    $feild = "appointment_done";
    }
    if($request->a == "personal_info"){
        $feild = "get_complete_info";
        }
        if($request->a == "visa_comp"){
            $feild = "complete_visa_form";
            }
            if($request->a == "star_rat"){
                $feild = "complete_study_preference";
                }
                if($request->a == "complete_application_form"){
                $feild = "complete_application_form";
                }
                if($request->a == "collect_document"){
                    $feild = "collect_document";
                    }
                    if($request->a == "review_apply"){
                        $feild = "review_apply";
                        }
                        if($request->a == "application_payment"){
                            $feild = "application_payment";
                            }
                
                // dd($feild);
    $update_activity =  new enquiries;
    $update_activity->where('unique_id', $request->b)
    ->update([$feild => 1]);
}




public function chat_to_client(Request $request){
    
    
    // dd(session()->get('unique_id_sess'));
    $unique_id = mt_rand(11111111,99999999);
    $chetEmp = DB::table('chat_client_to_employees')->select('id','message')->where('client_unique_id',session()->get('unique_id_sess'))->get();
if(count($chetEmp)>0){
    // dd($request->messageJSON);
    foreach($chetEmp as $get){
        $jsonarr = json_decode($get->message,true);
        $jsonarr[] = json_decode($request->messageJSON); 
    }
    $messageJSON = json_encode($jsonarr);
    
    $chat_client_to_employees = new chat_client_to_employees;
    $chat_client_to_employees->where('client_unique_id',session()->get('unique_id_sess'))->update([
        'message' => $messageJSON    
    ]);
}
else{
    // dd([$request->messageJSON]);
$chat_client_to_employees = new chat_client_to_employees([
    'unique_id'  => $unique_id,
    'employee_unique_id'  =>  $request->emp_unique_id,
    'client_unique_id'  =>$request->client_unique_id,
    'message'    =>  "[$request->messageJSON]"
]);
$chat_client_to_employees->save();
}
}



public function get_education_by_class(Request $request){
    if($request->data_class == "add_more_class"){
          echo 0;
    }
    else{
$get_edu = DB::table('enq_educations')
            ->where('enquiry_id',$request->a)
            ->where('class', $request->data_class)
->get();
return ($get_edu ? :[]);
// echo response()->json($get_edu);
}
}






public function get_experience_company(Request $request){
    if($request->data_class == "add_more_class"){
        echo 0;
  }
  else{
     $get_exp = DB::table('enq_experiences')
                        ->where('enquiry_id', $request->a) 
                        ->where('company_name',$request->data_class)
                        ->get();
                        return $get_exp;
  }
}


public function get_english_score(Request $request){
    if($request->data_class == "add_more_class"){
        echo 0;
  }
  else{
  $get_score = DB::table('enq_exam_scores')
  ->where('enquiry_id', $request->a) 
  ->where('language',$request->data_class)
  ->get();
  return $get_score;
  }
}



public function update_parentsibling_father(Request $request){
    $parent_sibling_details = parent_sibling_details::updateOrCreate(
        ['enquiry_id'    => $request->unique_id],
        [
                'father_name' =>   $request->father_name,  
                'father_nationality'           => $request->father_nationality     , 
                'father_dob'           => $request->father_dob     , 
                'father_birth_place'           => $request->father_birth_place     , 
                'father_birth_state'           => $request->father_birth_state     , 
                'father_birth_country'           => $request->father_birth_country     , 
                
              
                'enquiry_id'           => $request->unique_id     , 

        ]);
        $parent_sibling_details->save();
        Session::flash('message', "Update Father Name Successfully"); 
        return back(); 
}

public function update_parentsibling_mother(Request $request){
    $parent_sibling_details = parent_sibling_details::updateOrCreate(
    ['enquiry_id'    => $request->unique_id],
    [
    'mother_name'           => $request->mother_name     , 
    'mother_nationality'           => $request->mother_nationality     , 
    'mother_dob'           => $request->mother_dob     , 
    'mother_birth_place'           => $request->mother_birth_place     , 
    'mother_birth_state'           => $request->mother_birth_state    , 
    'mother_birth_country'           => $request->mother_birth_country  , 
    'enquiry_id'           => $request->unique_id     
       ]);
       $parent_sibling_details->save();
        Session::flash('message', "Update Mother Name Successfully"); 
        return back(); 

}

public function add_sibling(Request $request){
    $sibling_details = sibling_details::updateOrCreate(
        ['id'    => $request->id,
         'enquiry_id'  => $request->unique_id
    ],
        [
  'have_sibling'           => $request->have_sibling     , 
                'sibling_name'           => $request->sibling_name     , 
                'sibling_gender'           => $request->sibling_gender     , 
                'sibling_dob'           => $request->sibling_dob     , 
                'sibling_birth_place'           => $request->sibling_birth_place     , 
                'sibling_birth_state'           => $request->sibling_birth_state     , 
                'sibling_birth_country'           => $request->sibling_birth_country     , 
                'sibling_nationality'           => $request->sibling_nationality     , 
                'sibling_present_whereabout'           => $request->sibling_present_whereabout     , 
                'sibling_occupation'           => $request->sibling_occupation     ,

        ]);
        $sibling_details->save();
        Session::flash('message', "Update Sibling Successfully"); 
        return back();   
} 


public function get_sibling(Request $request){

    if($request->data_class == "add_more_class"){
        echo 0;
  }
  else{
  $parent_sibling_details = DB::table('parent_sibling_details')
  ->where('enquiry_id', $request->a) 
  ->where('language',$request->data_class)
  ->get();
  return $parent_sibling_details;
  }

}






public function update_financial_detail(Request $request){
     $unique_id = $request->unique_id;
$getid_img = Helper::get_client_financial_detail($unique_id);
        // for($i=0; $i<count($request->receipt); $i++){
if(($request->receipt) ){
   $file =   $request->receipt;
   }
   else{
$file = $request->receipt_hidden;
   }
      $enq_financials = enq_financials::updateOrCreate(
        ['financials_by'    => $request->financial_by,
        'enquiry_id'=> $unique_id
    ],
        [ 'enquiry_id'=> $unique_id,
        'financial_by' => $request->financial_by,
            'amount'  => $request->amount,
            'paid_date' => $request->paid_date,
            'receipt_no' => $request->receipt_no,
            'gen_by'        => $request->gen_by,
            'gen_date'    =>$request->gen_date,
            'receipt'    => $file
        ]);
        $enq_financials->save();

                Session::flash('message', "Financial Status Updated");
                return back();
}                




public function edit_other_detail(Request $request){
    $unique_id = $request->unique_id;
    // dd($request->number_of_address);
    for($i=0; $i<count($request->from); $i++){
    $enq_residense_last_five_year = enq_residense_last_five_year::updateOrCreate(
        ['enquiry_id'   =>  $unique_id,
        'number_of_address' => $request->number_of_address
    ],
        [
            'from'                =>$request->from[$i],
            'to'         =>$request->to[$i],
            'purpose'         =>$request->purpose[$i],
            'address'         =>$request->address[$i],
            'city'         =>$request->city[$i],
            'state'         =>$request->state[$i],
            'country'         =>$request->country[$i],
            'zip'         =>$request->zip[$i],
        ]);
        $enq_residense_last_five_year->save();
        Session::flash('message','Other Deatils Updated Successfully');
        return back();
    }
}

public function get_other_details(Request $request){

    if($request->data_class == "add_more_class"){
        echo 0;
  }
  else{
$get_edu = DB::table('enq_residense_last_five_year')
          ->where('enquiry_id',$request->a)
          ->where('number_of_address', $request->data_class)
->get();
return $get_edu;
}


}

public function passportFun(Request $request){
    $unique_id   = $request->unique_id;
    
  
    $image = $request->upload_passport;
    $passport_back_image =  $request->passport_back_image;
    if($image !=""){
        $destinationPath = "public/uploads/image/passport/$unique_id";
        $img =  $image->getClientOriginalName();
        $image->move($destinationPath ,$img,$image->getClientOriginalName());
        $image  = $img ;
        }
    else{
$image = $request->h_upload_passport  ;
    }
    
    if($passport_back_image !=""){
        $destinationPath = "public/uploads/image/passport/$unique_id";
        $img_back =  $passport_back_image->getClientOriginalName();
        $passport_back_image->move($destinationPath ,$img_back,$passport_back_image->getClientOriginalName());
        $passport_back_image  = $img_back ;
        }
    else{
$passport_back_image = $request->h_upload_back_passport  ;
    }
    
  
 $enq_id_proof = enq_id_proof::updateOrCreate(
     ['enquiry_id' => $unique_id,
        'id_proof'  => 'Passport'
    ],
     [   'enquiry_id' => $unique_id,
         'id_proof' =>  'Passport',
         'name_on_id_proof' =>  $request->name_on_passport,
         'id_proof_number' =>  $request->passport_number,
         'date_of_birth' =>   $request->date_of_birth,
         'place_of_issue' =>   $request->place_of_issue,
         'date_of_issue_passport' =>  $request->date_of_issue_passport,
         'date_of_expiry_passport' =>  $request->date_of_expiry_passport,
         'id_image' => $image,
         'passport_back_image' => $passport_back_image
]);
     $enq_id_proof->save();

     Session::flash('message','Passport Updated');
     return back();
} 


public function upload_documents(Request $request){
    $client_unique_id = $request->unique_id;
    $unique_id = mt_rand(11111111,99999999);
    
    $image2  = $request->file;
    // dd( $image2,$request->qualification,$client_unique_id );

    $i = 0;
    
    foreach($image2 as $image){
        
             $destinationPath = "public/uploads/documents/$client_unique_id";
 $img =  $image->getClientOriginalName();
 $image->move($destinationPath ,$img,$image->getClientOriginalName());
 $image  = $img;

 $enq_exam_scores = new  enrolment_documents([
       'client_unique_id'    => $client_unique_id,
        'unique_id'           => $unique_id,
        'document_name'       => $image,
        'qualification'       =>$request->qualification[0]
    ]);
    $enq_exam_scores->save();
$i++;
    }
Session::flash('message',$request->qualification[0].'Uploaded Successfully');
return back();
}


function remove_uploaded_document(Request $request){
$enquiries = new enrolment_documents; 
$enquiries->where('id',$request->id)->update([
    'approve_or_not' => 0,
    'check_status' => 1
]);

$client_notification= new client_notification([
    'enquiry_id'     => Session()->get('unique_id_sess'),
    'message'        => 'Disapprove Document',
    'date'           => now(),
    'agent_unique_id'=> Auth::user()->unique_id
]);
$client_notification->save();

Session::flash('message', 'Disapprove Document Successfully');
return back();
}


function approve_uploaded_document(Request $request){
    $enquiries = new enrolment_documents; 
    $enquiries->where('id',$request->id)->update([
        'approve_or_not' => 1,
        'check_status' => 1
    ]);


    $client_notification= new client_notification([
        'enquiry_id'     => Session()->get('unique_id_sess'),
        'message'        => 'Approve Document',
        'date'           => now(),
        'agent_unique_id'=> Auth::user()->unique_id
    ]);
    $client_notification->save();
    
    Session::flash('message', 'Approve Document Successfully');
    return back();
    }

    // function update_uploaded_document(Request $request){
    // $enquiries = new enrolment_documents; 
    // $enquiries->where('id',$request->id)->update([
    //         'document_name' => $request->gender,
    // ]);
    // Session::flash('message', 'Remove Document Successfully');
    // return back();
    // }
    
public function hide_client_notification(Request $request){
$client_notification = new     client_notification;
$client_notification->where('enquiry_id',Session()->get('unique_id_sess'))
->update([
    'check_or_not' => 0
]);
}


public function delete_qualification(Request $request){
    $enq_educations= new enq_educations;
    $enq_educations->where('enquiry_id', $request->unique_id)
                   ->where('class',$request->name_of_class)
                   ->delete();
                   
    Session::flash('message', $request->name_of_class.' Delete Successfully');
    return back();
    
}

public function delete_experience_company(Request $request){
    $enq_experiences  = new enq_experiences;
    
    $enq_experiences->where('enquiry_id', $request->unique_id)
                    ->where('company_name', $request->company_name)
                    ->delete();
                    Session::flash('message', $request->company_name.' Delete Successfully');
                    return back();  
}

public function delete_course_enrolment(Request $request){
$enquiries =  new enquiries;
$enquiries->where('unique_id',$request->unique_id)
          ->update([
              'course_session' => '',
              'course_country' => '',
              'course'         => '',
              'course_intake'  => ''
          ]);
          Session::flash('message','Course Enrollment Delete Successfully!');
          return back();
}


public function delete_student_financial(Request $request){
    $enq_financials = new  enq_financials;    
    $enq_financials->where('enquiry_id',$request->unique_id)
                    ->where('id',$request->id)
                    ->delete();
                    Session::flash('message', "Delete $request->financials_by Successfully");
                    return back();
}


public function delete_other_id_proof(Request $request){
    $enq_id_proof = new enq_id_proof;
    $enq_id_proof->where('enquiry_id',$request->unique_id)
                 ->where('id',$request->id)
                 ->delete();
                 Session::flash('message', "Delete $request->id_proof Successfully!");
                 return back();
}

// public function delete_parentsibling(Request $request){
//     $parent_sibling_details = new parent_sibling_details;
//     $parent_sibling_details()
// }




public function update_payment(Request $request){
    // dd();
    $unique_id = $request->unique_id;
    $id = $request->id;
    $image = $request->receipt;
    if($image !=""){
        $destinationPath = "public/uploads/image/payment-receipt/$unique_id";
        $img =  $image->getClientOriginalName();
        $image->move($destinationPath ,$img,$image->getClientOriginalName());
        $image  = $img ;
        }
    else{
$image = $request->h_upload_receipt  ;
    }



    if(isset($request->paid_date)){
        $d = explode('/', $request->input('paid_date'));
        $paid_date =    date("$d[2]-$d[1]-$d[0]");
        }else{
            $paid_date = '';
        }

        
    if(isset($request->gen_date)){
        $d = explode('/', $request->input('gen_date'));
        $gen_date =    date("$d[2]-$d[1]-$d[0]");
        }else{
            $gen_date = '';
        }
    


            $enq_payments = enq_payments::updateOrCreate(
                ['id'    => $id,
                'enquiry_id'=> $unique_id
            ],
                [    
                        'enquiry_id'=> $unique_id,
                        'payment_for'=> $request->payment_for,
                        'payment_by'   =>$request->payment_by,
                        'paid_amount' =>$request->paid_amount,
                        'paid_date'   =>$paid_date,
                        'receipt_no'  =>$request->receipt_no,
                        'gen_by'    =>$request->gen_by,
                        'gen_date'  =>$gen_date,
                        'receipt'   =>$image,
                        'application_no'=> $request->application_no,
                          'razorpay_payment_link_reference_id' => $request->razorpay_payment_link_reference_id
                ]);
                $enq_payments->save();
                
                
                

                if( ($request->ttl_amt - ($request->ttl_amt_paid+$request->paid_amount)) == 0 ){
                    DB::table('enquiries')->where('unique_id',$unique_id)->update(['disposition' => 'Payment Done']);
                    }elseif(($request->ttl_amt - $request->ttl_amt_paid) > 0 &&  ($request->ttl_amt != $request->ttl_amt_paid)){
                        DB::table('enquiries')->where('unique_id', $unique_id)->update(['disposition' => 'Partial Paid']);
                    }elseif(!empty($request->ttl_amt)){
                        DB::table('enquiries')->where('unique_id', $unique_id)->update(['disposition' => 'Pending']);
                    }
                
                enquiries::where('unique_id',$unique_id)
                ->update(['payment_done' => 1,
                'payment_done_date' => date('Y-m-d') ,
                // 'disposition'   => 'Payment Done'
                ]);
                
                
                
                Session::flash('message', "Add $request->payment_for Successfully!");
                return back();  
            }
public function delete_payment(Request $request){
    $enq_payments = new enq_payments;
    $enq_payments->where('enquiry_id',$request->unique_id)
                 ->where('id',$request->id)
                 ->delete();
                 Session::flash('message', "Delete $request->payment_for Successfully!");
                 return back();
}







public function update_student_financial_doc(Request $request){
    $unique_id = $request->unique_id;
    $doc_name = $request->doc_name;
    $doc_image =  $request->doc_image;  
    $other     =  $request->other[0];
    // dd($other);
    if($doc_image !=""){
        $destinationPath = "public/uploads/image/financial-doc/$unique_id";
        $img =  $doc_image->getClientOriginalName();
        $doc_image->move($destinationPath ,$img,$doc_image->getClientOriginalName());
        $doc_image  = $img ;
        }
    else{
        $doc_image = $request->h_doc_image  ;
    }
    if(!empty($request->doc_name_hide)){
        $doc_name = $request->doc_name;
    }
    $enq_financial_doc = enq_financial_doc::updateOrCreate(
        ['doc_name'    => $doc_name, 'enquiry_id' =>   $unique_id ],
        [       'doc_name'  => $doc_name,
                'enquiry_id' =>   $unique_id,
                'doc_image'   => $doc_image ,
                'other'       => $other
                ]);
$enq_financial_doc->save();
    Session::flash('message','Update Successfully');
    return back(); 
}


public function delete_student_financial_doc(Request $request){
    $updateStatus  = new enq_financial_doc;
    $updateStatus->where('enquiry_id', $request->unique_id)->where('doc_name' , $request->doc_name)
    ->delete();
    Session::flash('message',$request->doc_name.' Deleted Successfuly');
    return back();
}



public function update_ger_gmat(Request $request){

    $unique_id = $request->unique_id;
    $language = $request->language;

    if(isset($request->upload_score_card)){
        $destinationPath = "public/uploads/documents/english-score";
            $img =  $unique_id.$request->upload_score_card->getClientOriginalName();
            $request->upload_score_card->move($destinationPath ,'i'.$img,$request->upload_score_card->getClientOriginalName());
            $upload_score_card  = 'i'.$img ;
                         }else{
                            $upload_score_card = $request->upload_score_card_hidden;
                         }
                         if($language != ''){
                            
                            if($language == 'OET'){ 
                            $enq_exam_scores = enq_exam_scores::updateOrCreate(
                ['language'    => $language,
                'enquiry_id'=> $unique_id
            ],
                [
                     'enquiry_id'=> $unique_id,
                        'writing'        => json_encode([$request->writing,$request->writing_score] ),
                        'speaking'        => json_encode([$request->speaking,$request->speaking_score] ),
                        'listening'   =>json_encode([$request->listening,$request->listening_score] ),
                        'reading' => json_encode([$request->reading,$request->reading_score] ),
                        'exm_reference_no'   => $request->exm_reference_no,
                        'exam_type'   => $request->exam_type,
                        'overall'   => $request->overall,
                        'upload_score_card'   => $upload_score_card,
                        'examination_country'   => $request->examination_country,
                        'examination_city'   => $request->examination_city
                        ]);
        $enq_exam_scores->save();
                }else{
                    $enq_exam_scores = enq_exam_scores::updateOrCreate(
                        ['language'    => $language,
                        'enquiry_id'=> $unique_id
                    ],
                        [
                             'enquiry_id'=> $unique_id,
                                'writing'        => $request->writing,
                                'speaking'        =>$request->speaking ,
                                'listening'   =>$request->listening ,
                                'reading' => $request->reading,
                                'exm_reference_no'   => $request->exm_reference_no,
                                'exam_type'   => $request->exam_type,
                                'overall'   => $request->overall,
                                'upload_score_card'   => $upload_score_card,
                                'examination_country'   => $request->examination_country,
                                'examination_city'   => $request->examination_city
                                ]);
                $enq_exam_scores->save();
                }
    } 
    Session::flash('message', "Update Successfully"); 
    return back(); 
}

public function delete_score(Request $request){
    
    enq_exam_scores::where('id', $request->id)
    ->where('language', $request->exam_name)
    ->delete();
    Session::flash('message','Deleted Successfully');
    return back();
}

public function add_gre_gmat(Request $request){
    // dd($_POST
    $gre_gmat_language_scores = gre_gmat_language_scores::updateOrCreate(
        ['language'    => $request->language,
        'enquiry_id'=> $request->unique_id
    ],
        [
             'enquiry_id'=> $request->unique_id,
             'language'  => $request->language,
             'gre_exam_date'     => $request->exam_date ,
             'gre_verbal_score'    => $request->verbal_score,
             'gre_verbal_rank'    => $request->verbal_rank,
             'gre_quantitative_score'    => $request->quantitative_score,
             'gre_quantitative_rank'    => $request->quantitative_rank,
             'gre_written_score'     => $request->written_score,
             'gre_written_rank'    => $request->written_rank,
             'gmat_total_score'    => $request->total_score,
             'gmat_total_rank'    => $request->total_rank
        ]);
        $gre_gmat_language_scores->save();
        Session::flash('message','Add  Successfully');
    return back();
} 
public function delete_gre_gmat_score(Request $request){
    
    gre_gmat_language_scores::where('id', $request->id)
    ->where('language', $request->exam_name)
    ->delete();
    Session::flash('message','Deleted Successfully');
    return back();
}





public function delete_country_history(Request $request){
    enq_travelled_historys::
    // where('unique_id',$request->unique_id)
    where('id', $request->id)
    ->where('travelled_before_country', $request->travelled_before_country)
    ->delete();
    Session::flash('message',"Deleted " .$request->travelled_before_country." Successfully");
    return back();
}

public function update_visa_rejected_country(Request $request){
    $enq_visa_rejected_countrys = enq_visa_rejected_countrys::updateOrCreate(
        ['country'    => $request->country,
        'enquiry_id'=> $request->unique_id
    ],
        [
             'enquiry_id'=> $request->unique_id,
             'country'  => $request->country
        ]);
        $enq_visa_rejected_countrys->save();

        Session::flash('message',"Deleted " .$request->travelled_before_country." Successfully");
    return back();
}

public function delete_visa_regected_country(Request $request){
    enq_visa_rejected_countrys::where('id', $request->id)
    ->where('country', $request->country)
    ->delete();
    Session::flash('message',"Deleted " .$request->country." Successfully");
    return back();
}



public function delete_documents(Request $request){
  
    $enrolment_documents= new enrolment_documents;
    $enrolment_documents->where('client_unique_id', $request->unique_id)
                   ->where('id',$request->id)
                   ->delete();
                   
    Session::flash('message',' Delete Successfully');
    return back();
}
}
?>





