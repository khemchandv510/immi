<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\users;
use App\login_hours;
use DB;
use App\attendances;
class lockscreencontroller extends Controller
{
    
    public function index(request $request){
        
        
        $token = base64_decode($request->token);
        if($token == null){
            return redirect('/');
        }
        $data = DB::table('users')->where('id', $token)->get();
        
        return view('lockscreen')->with('data',$data);
    }
    
}


?>