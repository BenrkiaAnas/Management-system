<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    // Tell Laravel The Name Of Table
    protected $table = "project_user";
    protected $fillable = [
        'user_id',
        'project_id'
    ];
}
