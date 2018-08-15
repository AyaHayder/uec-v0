<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable =["title","description","date","branch_id"];
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
