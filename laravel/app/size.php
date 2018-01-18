<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class size extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function warehouse()
    {
        $this->belongsToMany('App\Warehouse');
    }
    public function category()
    {
        $this->belongsTo('App\category');
    }
}