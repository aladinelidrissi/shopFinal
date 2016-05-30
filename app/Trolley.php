<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trolley extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function trolleyItems()
    {
        return $this->hasMany('App\TrolleyItem');
    }
}
