<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function products()
    {
        return $this->hasMany('App\products');
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
