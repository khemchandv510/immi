<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ip_addresses extends Model
{
    public $timestamps = false;
    protected  $guarded = ['id'];
}
