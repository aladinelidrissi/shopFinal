<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrolleyItem extends Model
{
    public function trolley()
    {
        return $this->belongsTo('App\Trolley');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
