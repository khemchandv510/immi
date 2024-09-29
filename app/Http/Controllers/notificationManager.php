<?php

namespace App\Http\Controllers;
use App\enq_educations;
use Illuminate\Http\Request;
use DB;
// use Illuminate\Support\Facades\DB;
use App\enrolment_documents;
use App\student_communications;
class notificationManager extends Controller
{
    //
    
    public function index(){
         
         $users = DB::table('enq_educations')
        ->join('enrolment_documents', 'enq_educations.enquiry_id', '=', 'enrolment_documents.client_unique_id')
        ->join('enquiries', 'enq_educations.enquiry_id', '=', 'enquiries.unique_id')
        ->select('enrolment_documents.id','class','enq_educations.enquiry_id','document_name', 'education_name', 'enquiry_id', 'enq_educations.id', 'enquiries.name as username')
        ->groupBy('class','enq_educations.enquiry_id')
        ->paginate(10);
        // dd($users);
        return view("notification.notificationManager", ['students'=>$users]);
    
        
        
        
        
    }
    
    Public function MissignNotes(request $request){
        // dd($request); 
        return view('notification.notesmanager');
    }
    
    public function deletedata(request $request){
        
        dd('deletedata');
    //   $institure =  DB::table('my_institutes')
    //   ->select('code')
    //   ->where('country', '!=', 'Canada')
    //   ->where('country', '!=', 'Australia')
    //   ->delete();
      
    //   dd($institure);
      
    // echo ($institure->count());
    
    // foreach($institure as $institure2){
    //     $courses =   DB::table('courses')->where('college_code', '=', $institure2->code)->delete();
   
    //  echo $courses .'<br>';
    // }
  
    }
    public function Notes(request $request){
        
         if($request->hasfile('filename'))
         {
            foreach($request->file('filename') as $file)
            {
                $name = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/document/'), $name);  
                $data[] = $name;  
            }
            
             $filenamestring =json_encode($data);
         }else{
             $filenamestring = null;
         }
        
        student_communications::create([
        'enquiry_id'  => $request->studentid,
        'msg_sent_by' => $request->userid,
        'employee_id' => $request->userid,
        'courseid' => $request->courseid,
        'heading' => $request->heading,
        'applicationid' =>$request->applicationid,
        'Description' => $request->chatnotes,
        'files' =>$filenamestring
        
    ]);
    
    return back();
        
    }
}
