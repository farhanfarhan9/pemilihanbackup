<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    public function user()
    {
    	return $this->hasMany('App\User');
    }

    public function candidate()
    {
    	return $this->hasMany('App\Candidate');
    }
}
