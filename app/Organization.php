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
}
