<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class house extends Model
{
    public function products()
    {
        return $this->hasMany('App\products');
    }
}
