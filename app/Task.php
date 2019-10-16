<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'name',
        'project_id',
        'user_id',
        'days',
        'hours',
        'company_id'
    ];

    // Adding RelationShip

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    // Get All Tasks Comment
    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }
}
