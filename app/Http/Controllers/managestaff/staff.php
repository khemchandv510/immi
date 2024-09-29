<?php

namespace App\Http\Controllers\managestaff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class staff extends Controller
{
    public function dashboard(){
        return view('staff');
    }
}
