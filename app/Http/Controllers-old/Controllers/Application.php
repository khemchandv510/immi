<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use DB;
 use Session;
 use Mail;
 

 class Application extends Controller{
     public function index(){
         return view('Application/index');
     }
     public function view_application(Request $request){
         
      return view ('Application/view-application',['id'=>$request->id]);
     }

     public function application_process(Request $request){
         return view('Application/application-process',['course_id'=>$request->course_id]);
     }
 } 