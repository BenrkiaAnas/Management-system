<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'body',
        'url',
        'user_id',
        'commentable_id',
        'commentable_type'
    ];

    // Get Owning Commentable Model
    public function commentable()
    {
        return $this->morphTo();
    }

    // Adding RelationShip
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

}
