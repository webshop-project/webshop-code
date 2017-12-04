<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    public function products()
    {
        return $this->$this->hasMany('App\product');
    }
}
