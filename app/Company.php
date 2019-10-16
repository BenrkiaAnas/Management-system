<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    // Adding RelationShip
    public function user()
    {
        return $this->belongsTo('App/User');
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    // Get All Companies Comment
    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }
}
