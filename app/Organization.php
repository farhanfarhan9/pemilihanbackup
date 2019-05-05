<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded = [];

    public function setShortnameAttribute($shortname)
    {
        return $this->attributes['shortname'] = strtolower($shortname);
    }
    
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function elections()
    {
        return $this->hasMany('App\Election');
    }

    public function voters()
    {
        return $this->hasMany('App\Voter');
    }
}
