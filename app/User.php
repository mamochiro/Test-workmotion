<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{

    protected $fillable = ['name', 'lastname', 'email','password'];

    public function grades()
    {
      return $this->hasMany('App\Grades');
    }

}