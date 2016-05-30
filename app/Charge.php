<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function chargeItems()
    {
        return $this->hasMany('App\ChargeItem');
    }
}
