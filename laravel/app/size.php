<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    public function products()
    {
        $this->belongsToMany('App\Warehouse');
    }
    public function category()
    {
        $this->belongsTo('App\category');
    }
}