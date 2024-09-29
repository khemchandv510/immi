<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\clients;
use App\enquiries;
use DB;
 
class ClientsController extends Controller
{
    public function index(){
        // $clients = clients::all();   //ts also working but error not found when feild name is wrong

$clients = DB::table('clients')->get();
     $enquiries = DB::table('enquiries')->orderBy('id','DESC')->get();

    return    view('clients', compact(['enquiries' ,'clients']));  
 }


 public function search_client(Request $request){
     $var1 = $request->input('client_search'); 
     $clients = DB::table('clients')->where('name','=',$var1)->get();
     return    view('clients', ['clients' =>  $clients] );  
 }

    // public function index(){
    //     $clients = new clients([
    //         'client_ref' => 'C0067',
    //         'name'       => 'Vikash',
    //         'nick_name'  => 'ajju',

    //         'email'      =>  'email',
    //         'source'     =>'sdsad',
    //         'mobile'     =>  '854874587',
            
    //         'staff'      =>  'Nonne',
    //         'action'    =>  '1',
            
    //     ]);

    //     $clients->save();

    // }

    


}
