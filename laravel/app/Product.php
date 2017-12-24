<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function warehouse()
    {
        return $this->hasMany('App\warehouse');
    }
}
