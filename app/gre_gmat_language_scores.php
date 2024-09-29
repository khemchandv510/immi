<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gre_gmat_language_scores extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];

    public static function gre_gmat_language_scores($id){
$gre_gmat_language_scores = self::where('enquiry_id',$id)->get();
return $gre_gmat_language_scores;


    }
}
