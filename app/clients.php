<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    protected $guarded = ['id','added_date'];

    public $timestamps = false;
}
