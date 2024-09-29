<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $table = 'task';
    protected $gurded = 'id';
    protected $fillable = [
        'date','belonged_client','created_by','assigned_by','assigned_to','task','task_status','due_date'
    ];
}
