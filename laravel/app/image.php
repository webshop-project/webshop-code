<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 7-12-2017
 * Time: 12:06
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class image extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function products()
    {
        return $this->belongsTo('App\Product');
    }
}