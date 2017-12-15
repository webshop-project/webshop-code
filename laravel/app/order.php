<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function products()
    {
        $this->hasMany('App\products');
    }

    public function user()
    {
        $this->belongsTo('App\user');
    }
}
