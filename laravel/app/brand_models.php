<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand_model extends Model
{
    public function product()
    {
        $this->belongsToMany('App\Product');
    }
}
