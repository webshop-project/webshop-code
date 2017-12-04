<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class storage extends Model
{
    public function products()
    {
        $this->hasMany('App\products');
    }
}
