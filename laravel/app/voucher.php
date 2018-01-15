<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class voucher extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function  voucher_used()
    {
        return $this->hasMany(Voucher_used::class);
    }
}
