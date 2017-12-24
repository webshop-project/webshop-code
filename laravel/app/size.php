<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    public function warehouse()
    {
        $this->belongsToMany('App\Warehouse');
    }
    public function category()
    {
        $this->belongsTo('App\categorie');
    }
}