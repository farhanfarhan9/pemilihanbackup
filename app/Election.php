<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $guarded = [];

    protected $dates = [
        'registration_opened_on',
        'registration_closed_on',
        'voting_starts_on',
        'voting_ends_on',
    ];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function candidates()
    {
        return $this->hasMany('App\Candidate');
    }

    public function voters()
    {
        return $this->hasMany('App\Voter');
    }
}
