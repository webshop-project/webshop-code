<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'brand_models';

    public function product()
    {
        $this->hasMany('App\Product');
    }
    public function brand()
    {
        return $this->belongsTo('App\brand');
    }
}
