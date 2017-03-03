<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function relays()
    {
        return $this->belongsToMany('App\Relay')->withPivot('direction');
    }

}
