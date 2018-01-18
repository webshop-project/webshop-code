<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function warehouse()
    {
        return $this->belongsTo('App\warehouse');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTotalOrderPriceWithDiscount()
    {
        return $this->amount * $this->price;
    }
}
