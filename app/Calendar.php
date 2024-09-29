<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Calendar extends Model
{
    //
     use HasFactory;

     protected $fillable = [
        'title', 'start', 'end'
    ];

    public $timestamps = 'false';

}
