<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable =["title","contents","activity_date","header_photo","branch_id"];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

}
