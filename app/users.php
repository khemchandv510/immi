<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];

public static function getAllEmployee(){
$getAllUser = self::where('status',1)->where('usertype_status',0)->get();
return $getAllUser;
}


public static function getTotalEmployee(){
    $getAllUser = self::where('status',1)->where('usertype_status','!=',3)->get();
    return $getAllUser;
    }

public static function getUserById($id){
    
    $getUserById  = self::where('status',1)->where('usertype_status',1)->where('unique_id',$id)->get();
    return $getUserById;
}

public static function getAllUsers(){
    $getAllUsers = self::where('status',1)->get();
    return $getAllUsers;
}

public static function getuser($id){
    return self::where('unique_id',$id)->get();
}


 
public static function getEmployeeByCompany($id){
    // dd($id);
   return self::where('company_id',$id)->get();
}


public static function getUserById2($id){
    
    $getUserById  = self::where('status',1)->where('unique_id',$id)->get();
    return $getUserById;
}

}

