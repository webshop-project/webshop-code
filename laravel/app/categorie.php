<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function size()
    {
        return $this->belongsToMany('App\size');
    }
}
