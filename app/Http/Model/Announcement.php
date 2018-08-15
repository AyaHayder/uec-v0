<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ["title","contents","announcement_date","image","branch_id"];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
}
