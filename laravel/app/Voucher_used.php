<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher_used extends Model
{
    public function  voucher()
    {
        return $this->belongsTo(voucher::class);
    }
}
