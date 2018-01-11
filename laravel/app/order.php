<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function products()
    {
        return $this->hasMany('App\products');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\warehouse');
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function getTotalOrderPriceWithDiscount()
    {
        return $this->amount * $this->price;
    }
}
