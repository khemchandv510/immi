<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\my_institutes;
use App\courses;
use App\enquiries;
use App\enq_comments;
use DB;
use App\unfollowdata;
use Excel;
// use courses;
class ImportsController extends Controller

{
    // public function index(){
    //     return view('index');
    //   }
    
      public function uploadile(Request $request){
        // dd('gdfgdf');
        if ($request->input('submit') != null ){
            
          $file = $request->file('file');
    
          // File Details 
          $filename = $file->getClientOriginalName();
          
          $filename  = (str_replace(' ','',$filename));
          $extension = $file->getClientOriginalExtension();
          $tempPath = $file->getRealPath();
          $fileSize = $file->getSize();
          $mimeType = $file->getMimeType();
    
          // Valid File Extensions
          $valid_extension = array("csv");
    
          // 2MB in Bytes
          $maxFileSize = 2097152; 
    
          // Check file extension
          if(in_array(strtolower($extension),$valid_extension)){
    
            // Check file size
            if($fileSize <= $maxFileSize){
    
              // File upload location
              $location = 'uploads';
    
              // Upload file
              $file->move($location,$filename);
    
              // Import CSV to Database
              // $filepath = public_path($location."/".$filename);
              $filepath = url($location."/".$filename);
              
              // Reading file
              $file = fopen($filepath,"r");
    
              $importData_arr = array();
              $i = 0;
    
              while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                 $num = count($filedata);
                 
                 // Skip first row (Remove below comment if you want to skip the first row)
                 if($i == 0){
                    $i++;
                    continue; 
                 }
                 for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                 }
                 $i++;
              }
              fclose($file);
              
              // Insert to MySQL database
              foreach($importData_arr as $importData){
               
                
                
            // $dli =str_replace("","",$importData[14]);
            // if($dli !="")
            // {
            //   dd(chop($dli));
            
    $unique_id =  mt_rand(11111111,99999999);
                $insertData = array(

'unique_id'=>$unique_id,                 
                   "name"=>$importData[0],
                   "code"=>$importData[1],
                   "landline"=>$importData[2],
                   "email"=>$importData[3],
                   "phone"=>$importData[4],
                   "country"=>$importData[5],
                   "state"=>$importData[6],
                   "city"=>$importData[7],
                   "address"=>$importData[8],
                   "postal_code"=>$importData[9],
                   "fax"=>$importData[10],
                   "website"=>$importData[11],
                   "image"=>$importData[12],
                   "other_detail"=>$importData[13],
                   "dli"=>$importData[14],
                   'logo'=>$importData[15]
                

                   
                  //  "remark"=>$importData[13],
                  //  ,
                   
                  //  "address"=>$importData[9],
                    ) ;
                   
                   my_institutes::insertData($insertData);
    
              }
    
              Session::flash('message','Import Successful.');
              // return redirect('education/dashboard');
                  return back();
            }else{
              Session::flash('message','File too large. File must be less than 2MB.');
              // return redirect('education/dashboard');
              return back();
            }
    
          }else{
             Session::flash('message','Invalid File Extension.');
            //  return redirect('education/dashboard');
            return back();
          }
    
        }
    
        // Redirect to index
        
      }







      public function upload_course(Request $request){
        
        ini_set('max_execution_time', 30000);
              $college_code = $request->colllege_code;
        if ($request->input('submit') != null ){
           
          $file = $request->file('import');
        
          // File Details 
          $filename = $file->getClientOriginalName();


          $filename = str_replace(" ", '', $filename);
          

          $extension = $file->getClientOriginalExtension();
          $tempPath = $file->getRealPath();
          $fileSize = $file->getSize();
          $mimeType = $file->getMimeType();
    
          // Valid File Extensions
          $valid_extension = array("csv");
    
          // 2MB in Bytes
          $maxFileSize = 20971520000; 
    
          // Check file extension
          if(in_array(strtolower($extension),$valid_extension)){
    
            // Check file size
            if($fileSize <= $maxFileSize){
    
              // File upload location
              $location = 'uploads';
    
              // Upload file
              // dd($filename);
              $file->move($location,$filename);
    
              // Import CSV to Database
              // $filepath = public_path($location."/".$filename);
              $filepath = url($location."/".$filename);
    
              // Reading file

              $file = fopen($filepath,"r");
    
              $importData_arr = array();
              $i = 0;
    
              while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                 $num = count($filedata );
                 
                 // Skip first row (Remove below comment if you want to skip the first row)
                 if($i == 0){
                    $i++;
                    continue; 
                 }
                 for ($c=0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata [$c];
                 }
                 $i++;
              }
              fclose($file);
    
              // Insert to MySQL database
              foreach($importData_arr as $importData){
    $unique_id = mt_rand(11111111,99999999);
    if($importData[0] == "") {
      $importData[0] = null;
    }
    // if($importData[20] == ""){
    //   $importData[20] = null;
    // }
    if($importData[1] == ""){
      continue;
    }
    $checkcourseexist = DB::table('courses')
        ->where('college_code',$importData[16])
        ->where('course_name',$importData[1])
        ->get();
// dd($importData[2]);
$importData[2] = (str_replace(',','', $importData[2]));
$importData[3] = (str_replace(',','', $importData[3]));

if($checkcourseexist->count() > 0){
  continue;
}
// dd(trim($importData[17]), $importData[1]);
strval($importData[17]);
// dd($college_code, $importData[16]),;
    if($importData[1])
      $courses = new courses([
        "unique_id"=>$unique_id,
        // "college_code"  =>$college_code,
         "course_code"=>$importData[0],
         "course_name"=>$importData[1],
         "fees"=>$importData[2],
         "application_fee"=>$importData[3],
         "intake" => $importData[4],
         'duration_year' => $importData[5],
         'min_education_eligibility' => $importData[6],
          'min_gpa' => $importData[7],
        'toefl_reading' => $importData[8],
        'toefl_writing' => $importData[9],
        'toefl_listening' => $importData[10],
        'toefl_speaking' => $importData[11],
        'ielts_reading' => $importData[12],
        'ielts_writing' => $importData[13],
        'ielts_listening' => $importData[14],
        'ielts_speaking' => $importData[15],
        'college_code'  =>  $importData[16],
        'dli'  =>  $importData[17],
        'min_toefl_ibt' => $importData[18],
        'min_ilets_overall' => $importData[19],
        // 'other_requirments' => $importData[20]
        //17-05-2020
        'min_pte_reading' =>$importData[20],
        'min_pte_writing' => $importData[21],
        'min_pte_listening' => $importData[22],
        'min_pte_speaking' => $importData[23],
        'min_pte_overall'  => $importData[24],
        'level'            => $importData[25],
        'stream'           => $importData[26],
        'substream'        => $importData[27],
        'per'              => $importData[28],
        // 10-08-2020
        'campus'          => $importData[29],
        'language'        => $importData[30]
      ]);
      $courses->save();      

                // $insertData = array(
                //   "unique_id"=>$unique_id,
                //   "college_code"  =>$college_code,
                //    "course_code"=>$importData[0],
                //    "course_name"=>$importData[1],
                //    "fees"=>$importData[2],
                //    "application_fee"=>$importData[3],
                //    'duration_year' => $importData[4]
                //   );
                //    courses::insertData($insertData);
    
              }
    
              Session::flash('message','Import Successful.');
              return back();
            }else{
              Session::flash('message','File too large. File must be less than 2MB.');
              // return redirect('education/dashboard');
              return back();
            }
    
          }else{
             Session::flash('message','Invalid File Extension.');
            //  return redirect('education/dashboard');
            return back();
          }
    
        }
    
        // Redirect to index
        
      }




      public function importUnfollowClients(Request $request){
        if ($request->input('submit') != null ){
          $file = $request->file('import_client');
    $filename = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension();
    $tempPath = $file->getRealPath();
    $fileSize = $file->getSize();
    $mimeType = $file->getMimeType();
    $valid_extension = array("csv");
    $maxFileSize = 2097152; 
    if(in_array(strtolower($extension),$valid_extension)){
      if($fileSize <= $maxFileSize){
        $location = 'clients-csv';
        $file->move($location,$filename);
        $filepath = url($location."/".$filename);
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
           $num = count($filedata );
           if($i == 0){
              $i++;
              continue; 
           }
           for ($c=0; $c < $num; $c++) {
              $importData_arr[$i][] = $filedata [$c];
           }
           $i++;
        }
        fclose($file);
        foreach($importData_arr as $importData){
          $unique_id = mt_rand(11111111,99999999);
          unfollowdata::Create([
          "unique_id"=>$unique_id,
          'name'   =>$importData[0],  
          'mobile' =>$importData[1],  
          'alternet_mobile' => $importData[2],  
          'email'  =>$importData[3],
          'alternet_email' => $importData[4],   
          'source' => $importData[5],
         'course_country' =>$importData[6],
         'course'   =>$importData[7]
        ]) ;
          }

      

      Session::flash('message','Import Successful.');
      return back();
    }else{
      Session::flash('message','File too large. File must be less than 2MB.');
      
      return back();
    }

  } else{
     Session::flash('message','Invalid File Extension.');
    //  return redirect('education/dashboard');
    return back();
      }
      }
    
  }





      public function import_clients(Request $request){
        
  if ($request->input('submit') != null ){
     
    $file = $request->file('import_client');
    
    // File Details 
    $filename = $file->getClientOriginalName();
    $extension = $file->getClientOriginalExtension();
    $tempPath = $file->getRealPath();
    $fileSize = $file->getSize();
    $mimeType = $file->getMimeType();

    // Valid File Extensions
    $valid_extension = array("csv");

    // 2MB in Bytes
    $maxFileSize = 2097152; 

    // Check file extension
    if(in_array(strtolower($extension),$valid_extension)){

      // Check file size
      if($fileSize <= $maxFileSize){

        // File upload location
        $location = 'clients-csv';

        // Upload file
        $file->move($location,$filename);

        // Import CSV to Database
        $filepath = url($location."/".$filename);
// dd($filepath);
        // Reading file
        $file = fopen($filepath,"r");

        $importData_arr = array();
        $i = 0;

        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
           $num = count($filedata );
           
           // Skip first row (Remove below comment if you want to skip the first row)
           if($i == 0){
              $i++;
              continue; 
           }
           for ($c=0; $c < $num; $c++) {
              $importData_arr[$i][] = $filedata [$c];
           }
           $i++;
        }
        fclose($file);

        // Insert to MySQL database
        foreach($importData_arr as $importData){
          $unique_id = mt_rand(11111111,99999999);
          $agent_unique_id = mt_rand(11111111,99999999);



// $agent_unique_id = Auth::user()->unique_id;
// $agent_name = Auth::user()->agent_name;
// $agent_id = Auht::user()->agent_id;
//  $device = "fa fa-desktop" ;
// $date = date('Y-m-d');

// if($importData[0] || $importData[1] ||$importData[2] || $importData[3]|| $importData[4]||$importData[5] ||  
// $importData[6] || $importData[7] ||$importData[8] || $importData[9]|| $importData[10]||$importData[11]
// || $importData[12] || $importData[13] ||$importData[14] || $importData[15]|| $importData[16]||$importData[17]
// || $importData[18] || $importData[19] ||$importData[20] || $importData[21]|| $importData[22]||$importData[23]
// ||  $importData[24] || $importData[25] ||$importData[26] || $importData[27]
// == ""){
//   $importData[$a] = null;
// }

// $contact  = filter_var($importData[4], FILTER_SANITIZE_NUMBER_INT);


// dd($contact);

// dd($importData[0], $importData[1], $importData[2], $importData[3],$importData[5], $importData[6], $importData[7], $importData[8], $importData[9]);
if($importData[1] == ""){
  $importData[1] = null;
}
if($importData[2] == ""){
  $importData[2] = null;
}if($importData[3] == ""){
  $importData[3] = null;
}if($importData[4] == ""){
  $importData[4] = null;
}if($importData[5] == ""){
  $importData[5] = null;
}if($importData[6] == ""){
  $importData[6] = null;
}if($importData[7] == ""){
  $importData[7] = null;
}if($importData[8] == ""){
  $importData[8] = null;
}if($importData[9] == ""){
  $importData[9] = null;
}if($importData[10] == ""){
  $importData[10] = null;
}if($importData[11] == ""){
  $importData[11] = null;
}if($importData[12] == ""){
  $importData[12] = null;
}if($importData[13] == ""){
  $importData[13] = null;
}
if($importData[14] == ""){
  $importData[14] = null;
}if($importData[15] == ""){
  $importData[15] = null;
}if($importData[16] == ""){
  $importData[16] = null;
}if($importData[17] == ""){
  $importData[17] = null;
}if($importData[18] == ""){
  $importData[18] = null;
}if($importData[19] == ""){
  $importData[19] = null;
}if($importData[20] == ""){
  $importData[20] = null;
}
if($importData[21] == ""){
  $importData[21] = null;
}if($importData[22] == ""){
  $importData[22] = null;
}


if($importData[23] == ""){
  $importData[23] = null;
}if($importData[24] == ""){
  $importData[24] = '00:00';
}

// $get_client = enquiries::all();

// foreach ($get_client as $client) {
  
//     if(($client->eamil ==  $importData[3] )  ){
//       if($client->eamil == null){
  $comma = (str_replace("\\","","$importData[9]"));
  $back_slace = (str_replace("'","","$comma"));
// dd($back_slace);
$enquiries = enquiries::updateOrCreate(['contact' => $importData[2]],[
  
  "unique_id"=>$unique_id,
  'date'=>date('Y-m-d'),
  'device'=>'fa fa-desktop',
  'agent_unique_id' => $agent_unique_id,
'source' => $importData[0],
'name'   =>$importData[2],
'email'  =>$importData[3],
'contact' =>$importData[4],
'course_country' =>$importData[7],
'course'   =>$importData[8] ,
'last_comment' =>$back_slace





            // "unique_id"=>$unique_id,
            // 'date'=>date('Y-m-d'),
            // 'device'=>'fa fa-desktop',
            // 'agent_unique_id' => $agent_unique_id,
            //  "name"=>$importData[0],
            //  "dob"=>$importData[1],
            //  "contact"=>$importData[2],
            //  "email"=>$importData[3],
            //  "gender"=>$importData[4],
            //  "image"=>$importData[5],
            //  "country"=>$importData[6],
            //  "state"  =>$importData[7],
            //  "city"=>$importData[8],
            //  "address_line2"=>$importData[9],
            //  "address_line1"=>$importData[10],
            //  "pincode"=>$importData[11],
            //  "id_proof"=>$importData[12],
            //  "id_proof_name"=>$importData[13],
            //  "id_proof_no"=>$importData[14],
            //  "course_session"=>$importData[15],
            //  "course_country"=>$importData[16],
            //  "course"=>$importData[17],
            //  "course_intake"=>$importData[18],
            //  "agent_id"=>$importData[19],
            //  "agent_name"=>$importData[20],
            //  "disposition"=>$importData[21],
            //  "purpose_of_query"=>$importData[22],
            //  "callbacklater"=>$importData[23],
            //  "callbacklater_time"  =>$importData[24],
            //  "source"=>$importData[25],
            //  "set_priority"=>$importData[26],
            //  "last_comment"=>"$back_slace"
]);
$enquiries->save();
  
$enq_comments =  new  enq_comments([
  "client_enquiry_id"=>$unique_id,
  'comment'  =>"$back_slace",
  // 'agent_id' =>$importData[19],
  // 'agent_name'=>$importData[20],
  // 'status'=>$importData[21],
  // 'calling_date'=>$importData[23],
  // 'callbacklater_time'=>$importData[24],
'name'=>$importData[2],
'contact'=>$importData[4], 
'email' =>$importData[3]
]);
$enq_comments->save();


        
      }

        Session::flash('message','Import Successful.');
        return back();
      }else{
        Session::flash('message','File too large. File must be less than 2MB.');
        
        return back();
      }

    }else{
       Session::flash('message','Invalid File Extension.');
      //  return redirect('education/dashboard');
      return back();
    }

  }

  // Redirect to index  
}

public function export_excell(Request $request){
  
  $columns = $request->get_data;
  // dd($columns);
  $columns = array_filter($columns);
  
  $coures = courses::select($columns)
  
  ->join('my_institutes','courses.college_code','my_institutes.code')
  
  ->whereIn('courses.unique_id', $request->course_id)
  ->get();
  $fileName = 'Selected-courses.csv';
$headers = array(
         "Content-type"        => "text/csv",
         "Content-Disposition" => "attachment; filename=$fileName",
         "Pragma"              => "no-cache",
         "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
         "Expires"             => "0"
     );
     $columns =$columns;
     
     $callback = function() use($coures, $columns) {
         $file = fopen('php://output', 'w');
         fputcsv($file, array(
         'University Name',
         'Website',
         'Study Level',
         'Entry Requirements',
         'TOEFL Score',
         'PTE No Band Less Than',
         'GRE Score',
         'Application Fees',
         'Scholarship Detail',
         'ESL/ELP Detail',
         'Course Name',
         'Campus',
         'Duration',
         'IELTS Score',
         'TOEFL No Band Less Than',
         'SAT Score',
         'GMAT Score',
         'Tution Fee',
         
         'Backlog Range',
         'Concentration',
         'Country',
         'Intake',
         'IELTS No Band Less Than',
         'PTE Score',
         'ACT Score',
         'Application Deadline',
         'Scholarship Available',
         'Remarks',
         'Application Mode',
         'Det Score'));
                  foreach ($coures as  $value) {
                    if (($value->country == "Canada") || ($value->country == "CANADA")){
                      $dollar = "CA$";
                 }
                 else if($value->country == "USA" ){
                 $dollar = "US$";
                 }
                 else if($value->country == "Australia" ){
                   $dollar = "AU$";
                   }
                   else if($value->country == "New Zealand"){
                   $dollar = "NZ$";
                   }
                   else if(($value->country == "Germany") || ($value->country == "France")  || ( $value->country == "Lithuania")) {
                    $dollar = "EUR";
                   }
                   
    fputcsv( $file, array(
    $value->name,
    $value->website,
    $value->level,
    $value->min_education_eligibility,
    $value->min_toefl_ibt,
    $value->min_pte_overall,
    '-',
    $value->application_fee = $dollar. ' ' .$value->application_fee,
    '-',
    '-',
    $value->course_name,
    $value->city,
    $value->duration_year,
    $value->ielts_reading,
    $value->min_toefl_ibt,
    '-',
    '-',
    $value->fees = $dollar. ' ' .$value->fees,
    
    '-',
    '-',

    $value->country,
    $value->intake,
    $value->min_ilets_overall,
    $value->min_pte_reading,
    '-',
    '-',
    '-',
    '-',
    '-',
    '-'
    ));
     
  }
         fclose($file);
     };
     return response()->stream($callback, 200, $headers);
}
}
