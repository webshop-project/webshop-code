<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;
    protected $dates = ['start_date','end_date','deleted_at'];

    public function warehouse(){
        return $this->belongsTo('\App\Warehouse');
    }
}
