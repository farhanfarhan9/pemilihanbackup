<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $guarded = [
        'organization_id'
    ];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function elections()
    {
        return $this->belongsToMany('App\Election')->withTimestamps();
    }
}
