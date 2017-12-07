<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use  SoftDeletes;
    public function categorie()
    {
        $this->belongsTo('App\categorie');
    }
    public function house()
    {
        $this->belongsTo('App\house');
    }
    public function order()
    {
        $this->belongsTo('App\order');
    }
    public function size()
    {
        $this->belongsTo('App\size');
    }
    public function storage()
    {
        $this->belongsTo('App\storage');
    }
    public function brand()
    {
        $this->belongsTo('App\brand');
    }

    public function brand_model()
    {
        
    }

}
