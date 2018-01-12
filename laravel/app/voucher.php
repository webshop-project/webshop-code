<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    public function  voucher_used()
    {
        return $this->hasMany(Voucher_used::class);
    }
}
