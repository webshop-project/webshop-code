<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    public function products()
    {
        $this->hasMany('App\Warehouse');
    }
    public function category()
    {
        $this->belongsTo('App\categorie');
    }
}