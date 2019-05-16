<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Schedule extends Model
{
    //
    protected $fillable = [
        'department', 'visit_on', 'created_at'
    ];
}
