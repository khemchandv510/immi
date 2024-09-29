<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unfollowdata extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];
    protected $table   = 'unfollowdata';

public static function getUpfollowData(){
    $client = self::inRandomOrder()->skip(0)->take(1)->get();
    
    
    return $client;
}

public static function getAllUnfollowData($page){
$data = self::paginate(15);

return $data; 
}
}
