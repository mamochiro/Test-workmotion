<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    //

    public function subjects()
    {
      return $this->hasMany('App\Subjects');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
