<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

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
