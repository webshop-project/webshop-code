<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher_used extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function  voucher()
    {
        return $this->belongsTo(voucher::class);
    }
}
