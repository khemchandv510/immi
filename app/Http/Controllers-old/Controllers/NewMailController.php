<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use validator;
use DB;
class NewMailController extends Controller
{
    //
    public function send(Request $request){
    	// $this->validate($request ,[
     //   'name' =>'required',
     //   'subject' =>'required|email',
     //   'message' =>'required',

    	// ]);

    	$data = array(
       'to' => $request->to,
       'subject' =>$request->subject,
       'message' =>$request->message

    	);

      // Log::info("data");
      // log::info($data);


      // foreach($email as $e){
      //   Mail::to($e->email)->send(new SendMail($data));
      // }

      $ok2 = implode($request->id);
      
      $email  =   db::table('enquiries')->select('email')
      ->whereIn('unique_id', explode(',', $ok2))
      ->where('email','!=',null)
      ->get();
      $subject = $request->subject;
      $email = array("chandrapalsingh1004@gmail.com");
    ini_set('max_execution_time', 120);  
        $data = array('name'=>"test");
        
         Mail::send('enquiry.send-all-lead-mail', $data, function($message) use($email, $subject) {
           foreach($email as $em_add){
            $message->to($em_add);
           }
         $message->subject($subject);
        //  foreach ($doc as $d) {
        //   $message->attach($d);  
        //  }
        //  $message->from('chandrapal@klifftech.com','Chandrapal');
      });

  dd(  $data);
    	
    return back()->with('success' ,'sucessfully send your mail');
    	

    }
}
