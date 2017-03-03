<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $guarded = [];
    public $timestamps = false;


    public function relay()
    {
        return $this->hasOne('App\Relay');
    }
}
