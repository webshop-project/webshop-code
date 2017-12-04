<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    public function products()
    {
        $this->hasMany('App\products');
    }
}
