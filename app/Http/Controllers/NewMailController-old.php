<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use validator;

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

      Log::info("data");
      log::info($data);
    	Mail::to('rajeevtu2@gmail.com')->send(new SendMail($data));
    	
    return back()->with('success' ,'sucessfully send your mail');
    	

    }
}
