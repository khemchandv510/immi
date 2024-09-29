<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\users;

class AgentId extends Controller
{
        public function index(){
            $agent_id =  DB::table('users')->get();
            
            return view('enquiry/enquiry-list',['agent_id'=>$agent_id]);
        }
}
