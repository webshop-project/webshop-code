<?php
/**
 * Created by PhpStorm.
 * User: Bjorn
 * Date: 7-12-2017
 * Time: 12:06
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{

    public function products()
    {
        return $this->hasMany('App\product');
    }

}