<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    //

    protected $fillable = ['status', 'corrective_action','closed_at'];

}
