<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\enquiries;
use DB;
use App\table_enrolments;
use Auth;
use App\enrolment_notes;
use App\commition_invoices;
use App\enrolment_documents;
use App\enrolment_status_documents;
use Session;
use Mail;
use App\Helpers\Helper;

class Enrolments extends Controller
{
    public function index(){
        return view('education/enrolment');
    }

 
    public function add_enrolment(Request $request){
        $client_enquiry_id =  $request->id;
        Session()->put('unique_id_enroll_sess',$client_enquiry_id);   
        
        $get  = DB::table('enquiries')->get()->where('unique_id' , $client_enquiry_id);

        return view('education/add-enrolment',compact(['get', 'client_enquiry_id']));
    }


public function add_enrolment_detail(Request $request){

  
    $num =  mt_rand(11111111, 99999999);
        $enrolment_number = "En".$num;
$client_enquiry_id   = $request->input('client_enquiry_id');
        $get = DB::table('table_enrolments')->where('client_enquiry_id',$request->input('client_enquiry_id'))->get();
        $enquiry = DB::table('enquiries')->where('unique_id',$request->input('client_enquiry_id'))->get();
            
        if($get->count()  == 0){    
         $table_enrolments = new table_enrolments([
        'client_enquiry_id'  => $client_enquiry_id,
        'case_type'        =>   $request->input('case_type'),
          'work_flow_templete'  =>  $request->input('work_flow_templete'),
        'institution'      =>  $request->input('institution'),
        'enrolment_for'  =>  $request->input('enrolment_for'),
        'campus'        =>  $request->input('campus'),
        'course_name'        =>  $request->input('course_name'),
          'student_number'  =>  $request->input('student_number'),
        'start_date'      =>  $request->input('start_date'),
        'end_date'  =>  $request->input('end_date'),
        'course_value'        =>  $request->input('course_value'),
          'agent_id'  =>  Auth::user()->employee_id,
        'agent_name'      =>  Auth::user()->employee_name,
        'enrolment_number'  => $enrolment_number
    ]);
    $table_enrolments->save();
   }
// dd($get);

return view('education/enrolment-detail',compact(['get', 'enquiry', 'client_enquiry_id'])); 
}



public function update_enrolment_detail(Request $request){
  $client_enquiry_id   = $request->input('client_enquiry_id');
    $table_enrolments = new table_enrolments;
    $table_enrolments->where('client_enquiry_id', $client_enquiry_id)
    ->update([
        'case_type'        =>   $request->input('case_type'),
        'work_flow_templete'  =>  $request->input('work_flow_templete'),
      'institution'      =>  $request->input('institution'),
      'enrolment_for'  =>  $request->input('enrolment_for'),
      'campus'        =>  $request->input('campus'),
      'course_name'        =>  $request->input('course_name'),
        'student_number'  =>  $request->input('student_number'),
      'start_date'      =>  $request->input('start_date'),
      'end_date'  =>  $request->input('end_date'),
      'course_value'        =>  $request->input('course_value'),
    //     'agent_id'  =>  Auth::user()->employee_id,
    //   'agent_name'      =>  Auth::user()->employee_name,
      
    ]);
    
    $get = DB::table('table_enrolments')->where('client_enquiry_id',$request->input('client_enquiry_id'))->get();
    $enquiry = DB::table('enquiries')->where('unique_id',$request->input('client_enquiry_id'))->get();
    return view('education/enrolment-detail',compact(['get', 'enquiry','client_enquiry_id'])); 
}



    public function enrolment_detail(){
      
        $commition   = DB::table('commitions')->get();
        
         return view('education/enrolment-detail', [   'commition' =>  $commition  ]);
    }

    public function enrolment_note(Request $request){
      $client_enquiry_id   = $request->input('client_enquiry_id');
   $enrolment_notes = new enrolment_notes([
            'client_enquiry_id'  =>  $client_enquiry_id ,
            'agent_id'        =>  Auth::user()->employee_id,
            'agent_name'  => Auth::user()->name,
              'category'  =>  $request->input('category'),
            'subject'      =>  $request->input('subject'),
            'description'  =>  $request->input('description'),
            'sent_notification'        =>  $request->input('sent_notification'),
              'staff'  =>  $request->input('staff'),
            'reminder_date_calender'      =>  $request->input('reminder_date_calender'),
            'date'  => date('Y-m-d')
            
        ]);
        $enrolment_notes->save();

        $get = DB::table('table_enrolments')->where('client_enquiry_id',$request->input('client_enquiry_id'))->get();
    $enquiry = DB::table('enquiries')->where('unique_id',$request->input('client_enquiry_id'))->get();
    $notes   = DB::table('enrolment_notes')->where('client_enquiry_id',$request->input('client_enquiry_id'))->get();
    
    return view('education/enrolment-detail',compact(['get', 'enquiry', 'notes','client_enquiry_id '])); 
    }

    public function generate_invoice(){
        // $generate_invoice =  DB::table('generate_invoices')->get();
        return view('education/invoice');
    }

    public function commition_invoice(Request $request){
      $client_enquiry_id   = $request->input('client_enquiry_id');
        $commition_invoices = new commition_invoices([
            'client_enquiry_id'  => $request->input('client_enquiry_id'),
            'reference'        =>  $request->input('reference'),
              'teaching_period'  =>  $request->input('teaching_period'),
            'tuition_fees'      =>  $request->input('tuition_fees'),
            'commission_rate'  =>  $request->input('commission_rate'),
            'amount'        =>  $request->input('amount'),
              'tax_code'  =>  $request->input('tax_code'),
            'total_amount'      =>  $request->input('total_amount'),
            'due_date'      =>  $request->input('due_date'),
            'comments'      =>  $request->input('comments'),
            'invoice_no'  => "INV".mt_rand(11111111,99999999)
        ]);
        $commition_invoices->save();

        $commition_invoices   = DB::table('commition_invoices')->where('client_enquiry_id',$request->input('client_enquiry_id'))->get();  
          // dd($commition_invoices);
        return view('education/enrolment-detail',compact([ 'commition_invoices', 'client_enquiry_id'])); 
    }

    public function upload_documents(Request $request){
     
      $client_unique_id = session()->get('unique_id_sess');
      $img = $request->file('document_name');
      
      // dd($request->qualification_name);
    // dd($img); 
  if($img != ''){
    $i = 0;
  foreach ($img as $image) {
    $unique_id = mt_rand(11111111,99999999);
                        $destinationPath = "public/uploads/enrolment_documents";
        $img =  $unique_id.$image->getClientOriginalName();
        $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
        $image  = 'i'.$img ;
  // dd($img);
  $enrolment_documents = new enrolment_documents([
    'unique_id'  => $unique_id,
    'client_unique_id' => $client_unique_id,
    'qualification' => $request->qualification_name[$i],
      'document_name'  => $image]);
  $enrolment_documents->save();
  
  $i++;
  }
  return back();
  }
    }


public function client_document_approved(Request $request){

  $check_status = new enrolment_documents;
  $check_status->where('unique_id',$request->a)
         ->update([
           'check_status' => 1,
           'upload_documents_again' => 0
       ]);

   $get = DB::table('enrolment_documents')
          ->where('unique_id',$request->a)
          ->get();       
  foreach ($get as $g) {
    if($g->approve_or_not == 1){
      $enrolment_documents = new enrolment_documents;
      $k = $enrolment_documents->where('unique_id',$request->a)
         ->update([
           'approve_or_not' => 2
       ]);
       if($k == 1){
         
         return "aa".$request->a."num2" ;
       }
       else{
         return 0;
       }
    }
    elseif($g->approve_or_not == 2){
  $enrolment_documents = new enrolment_documents;
 $k = $enrolment_documents->where('unique_id',$request->a)
    ->update([
      'approve_or_not' => 1
  ]);
  
  if($k == 1){
    
    return "aa".$request->a."num1";
  }
  else{
    return 0;
  }
}
  }
  $enrolment_documents = new enrolment_documents;
  $k = $enrolment_documents->where('unique_id',$request->a)
     ->update([
       'approve_or_not' => 1
   ]);
   if($k == 1){
       return "aa".$request->a."num1";
   }
   else{
     return 0;
   }
}

function aprove_or_cancel(Request $request){
    $enrolment_documents = new enrolment_documents;
    $enrolment_documents->where('client_unique_id',$request->check_status)
    ->update([
      'check_status' => 1
    ]);
    Session::flash('message', "Document Checked");
    return back();
}

public function documents_upload_again(Request $request){

  $client_unique_id = session()->get('unique_id_sess');
      $img = $request->file('document_name');
  if($img != ''){
    $i = 0;
  foreach ($img as $image) {
    $unique_id = mt_rand(11111111,99999999);
                        $destinationPath = "public/uploads/enrolment_documents";
        $img =  $unique_id.$image->getClientOriginalName();
        $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
        $image  = 'i'.$img ;
  $enrolment_documents = new enrolment_documents;
  $enrolment_documents->where('unique_id', $request->u_id)
  ->update([
      'document_name'  => $image,
      'upload_documents_again' => 1
      ]);
  $i++;
  }
  return back();
  }
}

public function application_sent(Request $request){
   $application_sent  = $request->a;

  $client_unique_id = session()->get('unique_id_sess');
  $img = $request->document_name;
  
if($img != ''){
$i = 0;
foreach ($img as $image) {
$unique_id = mt_rand(11111111,99999999);
                    $destinationPath = "public/uploads/enrolment_documents";
    $img =  $unique_id.$image->getClientOriginalName();
    $image->move($destinationPath ,'i'.$img,$image->getClientOriginalName());
    $image  = 'i'.$img ;

   $enrolment_status_documents = new enrolment_status_documents([
'unique_id'  => $unique_id,
'client_unique_id' => $client_unique_id,
'comment'  => $request->comment,
'date'  => date('Y-m-d'),
'application_sent' => $application_sent,
  'documents'  => $image,
  'document_name' => $request->document_name_text
  ]);
$enrolment_status_documents->save();
$i++;
}

}
return $enrolment_status_documents;
}

// public function get_status(Request $request){
//  return  $get_data = DB::table('enrolment_status_documents')
//               ->where('status',1)
//               ->where('client_unique_id', session()->get('unique_id_sess'))
//               ->where('application_sent', $request->a)
//               ->get();  
// }




public function bank_loan(Request $request){
  $unique_id = mt_rand(11111111,99999999);
  $client_unique_id = session()->get('unique_id_sess');
   $enrolment_status_documents = new enrolment_status_documents([
'unique_id'  => $unique_id,
'client_unique_id' => $client_unique_id,
'date'  => date('Y-m-d'),
'application_sent' => 'send_mail_to_bank'
   ]);
   $enrolment_status_documents->save();






  
  ini_set('max_execution_time', 120);
  $doc  = array($request->id_proof,$request->quelification, Session::get('upload_pdf'));
  // dd($doc);

  // $doc =   url('public/uploads/image/i81148173Koala.jpg');
  // dd($doc);
  $data = array('name'=>"Virat Gandhi");
  
     Mail::send('enquiry.bank_loan', $data, function($message) use($doc) {
     $message->to('chandrapalsingh1004@gmail.com', 'chandrapal')
     ->subject('Educational Loan Request');
     foreach ($doc as $d) {
      $message->attach($d);  
     }
     $message->from('chandrapal@klifftech.com','Chandrapal');
  });
  
// $unique_id = mt_rand(11111111,99999999);
// $enrolment_bank_loans  = new  enrolment_bank_loans([
//     'unique_id' =>  $unique_id,
//     'client_unique_id' => session()->get('unique_id_sess'),
//     'loan_approve_status' => 0,
//     'send_email_to_bank'  => 1,
//     'receive_email_from_bank' =>0
// ]);
// $enrolment_bank_loans->save();










  Session::flash('message', "Sent Mail To Bank Successfully");
    return back();
}



public function disabled_submit(Request $request){
  
  $con = DB::table('enrolment_documents')
  ->where('client_unique_id',$request->a)
  ->get();
// dd($con->count());

  $disabled = DB::table('enrolment_documents')
  ->where('client_unique_id',$request->a)
  ->where('check_status', 1)
  ->get();
  dd( $disabled->count());

  if($con->count() > 0){
  if($con->count()  == $disabled->count()){

return  1;
  }
else{
return 0;
}
  }
}  


public function request_bank_loan(Request $request){
$request->addIdProof;
$request->educationalDocuments;
$request->offerLetter;



 

  $enrolment_documents= Helper::getAllUploadDocuments(Session()->get('unique_id_sess'));
//   $a =[];
//   foreach($enrolment_documents as $edu_doc){
    
// array_push($a,$edu_doc->document_name);
//   }
  
  
  // $get_passport = Helper::get_passport(Session()->get('unique_id_sess'));

$email_address = [];
  if(isset($request->bank1)){
array_push($email_address,$request->bank1);
  }
  if(isset($request->bank2)){
    array_push($email_address,$request->bank2);
  }
$email_address = array('chandrapalsingh1004@gmail.com','chandrapal1004@yahoo.in');

  
$doc =  array(url('public\uploads\documents/'.$enrolment_documents[0]->document_name));
foreach($enrolment_documents as $a){
array_push($doc,url('public\uploads\documents/'.$a->document_name));
}



  ini_set('max_execution_time', 120);  
  
  $data = array('name'=>"Virat Gandhi");
     Mail::send('enquiry.bank_loan', $data, function($message) use($email_address, $doc) {
       foreach($email_address as $em_add){
        $message->to($em_add);
       }
     
    //  ->to($email_address, 'chandrapal')
     $message->subject('Educational Loan Request');
     foreach ($doc as $d) {
      $message->attach($d);  
     }
     $message->from('chandrapal@klifftech.com','Chandrapal');
  });

}

public function update_enrolment_status_documents(Request $request){
  $enrolment_status_documents =  new enrolment_status_documents;
  $doc_image =  $request->doc_image;    
  if($doc_image !=""){
    $destinationPath = "public/uploads/image/financial-doc";
    $img =  $unique_id.$doc_image->getClientOriginalName();
    $doc_image->move($destinationPath ,'i'.$img,$doc_image->getClientOriginalName());
    $doc_image  = 'i'.$img ;
    }
else{
    $doc_image = $request->h_doc_image  ;
}

  // $enrolment_status_documents->  where('id',$request->id)->upadate('documents', => )

}


}
