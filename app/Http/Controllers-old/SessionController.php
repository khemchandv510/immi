<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionController extends Controller
{

public function index(){
    
    
  $userid  =    Auth::user()->unique_id;
$userName =     Auth::user()->name;
    // $_SESSION["usertype"] = '4';
    
    return view('hr-section/ktslogin/employee-list', compact(['userid','userName'])); 
}


// public function indx(){
    
// if( Auth::user()->unique_id){ 
//     $userid= Auth::user()->unique_id;
    
//     // $usertype=$_SESSION['usertype']; 
//     $userName=Auth::user()->name; 
//     } else{ 
//     echo '<script>window.location="login.php";</script>'; 
//     exit();
//     } 
// }
}






