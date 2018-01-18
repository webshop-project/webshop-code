<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class brand extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->hasMany('App\ProductModel');
    }
}
