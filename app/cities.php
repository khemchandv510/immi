<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    public static function getAllCities(){
        $getAllCities = self::where('state_id',100)->get();
        
        return $getAllCities;
    }
}
