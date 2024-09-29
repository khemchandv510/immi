<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommissionStructure extends Controller
{
    public function index(){
        return view('Commission/Structure');
    }
}
