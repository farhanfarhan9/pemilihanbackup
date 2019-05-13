<?php

namespace App;

use Jenssegers\Optimus\Optimus;
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

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        return $this->where('id', app(Optimus::class)->decode(intval($value)) ?? null)->first() ?? abort(404);
    }

    public function getHashIdAttribute() {
        return app(Optimus::class)->encode($this->id);
    }

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
        return $this->belongsToMany('App\Voter')->withTimestamps();
    }
}
