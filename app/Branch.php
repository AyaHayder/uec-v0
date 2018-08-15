<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ["location","address"];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function activity()
    {
        return $this->hasMany('App\Activity');
    }

    public function announcement()
    {
        return $this->hasMany('App\Announcement');
    }

    public function service()
    {
        return $this->hasMany('App\Service');
    }

    public function job()
    {
        return $this->hasMany('App\Job');
    }
}
