<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFollowingEmployer extends Model
{
    protected $guarded = [];

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
