<?php

namespace App;

use Jenssegers\Optimus\Optimus;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $guarded = [
        'organization_id'
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

    public function getIpkAttribute() {
        return mt_rand(1, 4);
    }

    public function scopeActive($query)
    {
        return $this->ipk;
    }
    
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function elections()
    {
        return $this->belongsToMany('App\Election')->withTimestamps();
    }
}
