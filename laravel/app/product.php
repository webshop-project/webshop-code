<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use  SoftDeletes;
    public function categorie()
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
        return $this->belongsTo('App\size');
    }
    public function storage()
    {
        return $this->belongsTo('App\storage');
    }
    public function brand()
    {
        return $this->belongsTo('App\brand');
    }
    public function image()
    {
    return $this->hasMany('App\image');
    }

    public function brand_model()
    {
        
    }

}
