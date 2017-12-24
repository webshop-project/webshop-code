<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'Warehouse';
    protected $primaryKey = 'product_id';

    public function category()
    {
        return $this->belongsTo('App\categorie');
    }
    public function house()
    {
        return $this->belongsTo('App\house');
    }
    public function order()
    {
        return $this->belongsTo('App\order');
    }
    public function size()
    {
        return $this->hasMany('App\size');
    }
    public function storage()
    {
        return $this->belongsTo('App\storage');
    }
    public function brand()
    {
        return $this->hasMany('App\brand');
    }
    public function image()
    {
        return $this->hasMany('App\image');
    }
    public function products()
    {
        return $this->belongsTo('App\product');
    }
    public function brand_model()
    {

    }
}
