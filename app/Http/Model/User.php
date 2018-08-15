<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getfullNameAttribute()//the words get and attribute are fixed
    {
        return $this->first_name." ".$this->last_name;
    }
    public function activity(){
         return $this->hasMany('App\Activity');
    }

    public function announcement(){
         return $this->hasMany('App\Announcement');
    }

    public function service(){
        return $this->hasMany('App\Service');
    }

    public function branch(){
        return $this->hasMany('App\Branch');
    }

    public function partner()
    {
        return $this->hasMany('App\Partner');
    }

    public function job()
    {
        return $this->hasMany('App\Job');
    }

}
