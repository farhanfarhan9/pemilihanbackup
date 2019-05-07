<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
}
