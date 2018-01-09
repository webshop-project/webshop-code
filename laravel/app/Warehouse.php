<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'Warehouse';
    protected $primaryKey = 'product_id';

    public function order()
    {
        return $this->belongsTo('App\order');
    }
    public function size()
    {
        return $this->belongsTo('App\size');
    }
    public function storage()
    {
        return $this->belongsTo('App\storage');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function category()
    {
        return $this->belongsTo('App\category');
    }
    public function  discount()
    {
        return $this->hasMany('\App\Discount');
    }
}
