<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categorie extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function size()
    {
        return $this->belongsToMany('App\size');
    }
}
