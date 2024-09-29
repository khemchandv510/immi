<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\enquiries;
use App\enq_comments;
use Auth;
use Session;

class Comment extends Controller
{
public function add_comment(Request $request){
    
    $get = DB::table('enquiries')->where('unique_id',$request->add_comment_unique_id)->get();
    $name = $get[0]->name;
    $contact = $get[0]->contact;
    $email = $get[0]->email;
    $comment = $request->comment;
    $status = $request->val;
    // $date = $id->input('callbacklater');
    // $comment = $id->input('comment');
    // $time = $id->input('callbacklater_time');
    // $time = date("H:i", strtotime($time));
    
    $enquiries = new enquiries;
    $enquiries->where('unique_id',$request->add_comment_unique_id)->update(['last_comment' => $comment]);

    $enq_comments = new enq_comments([
        'client_enquiry_id'=> $request->add_comment_unique_id,
        
        'comment'  =>$comment,
        'agent_id'  =>  Auth::user()->employee_id,
        'status'=>$status,
        
        'name' =>$name,
        'email' =>$email,
        'contact' =>$contact,
        'agent_name'=> Auth::user()->name
        ]);
        $enq_comments->save();
        Session::flash('Message','Comment Added');
        return back();
}
}

