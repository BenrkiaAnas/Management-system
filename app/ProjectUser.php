<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    protected $fillable = [
        'user_id',
        'project_id'
    ];
}
