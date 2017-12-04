<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
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

}
