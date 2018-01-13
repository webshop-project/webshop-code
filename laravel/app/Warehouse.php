<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Warehouse extends Model
{
    protected $table = 'Warehouse';

    public function orders()
    {
        return $this->hasMany('App\order', 'warehouse_id');
    }

    public function size()
    {
        return $this->belongsTo('App\size');
    }

    public function storage()
    {
        return $this->belongsTo('App\storage');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function category()
    {
        return $this->belongsTo('App\category');
    }

    public function totalAmountSold()
    {
        return count($this->orders);
    }


//    public function MostSold()
//    {
//        return $this->orders->groupBy('warehouse.id')->sortByDesc('orders.amount')->get();
////        from warehouse
////        join orders on warehouse.id = orders.warehouse_id
////        WHERE orders.shipped = 1
////        GROUP BY warehouse.id
////        ORDER BY `orders`.`amount`  DESC
//
//    }

    public function totalAmountSoldThisMonth()
    {
        return count($this->orders->where('bought_at', '>', Carbon::now()->subMonth()));
    }

    public function thisMonthProfit()
    {
        $amount = $this->totalAmountSoldThisMonth();
        $profit = 0;
        foreach($this->orders as $order)
        {
            $profit += $order->price * $amount;
        }
        return $profit;
    }

    public function totalProfit()
    {
        $amount = $this->totalAmountSold();
        $profit = 0;
        foreach($this->orders as $order)
        {
            $profit += $order->price * $amount;
        }
        return $profit;
    }

    public function showStats()
    {

        if (empty($this->size->size))
        {
            $array = [
                'supply'                => $this->supply,
                'totalSold'             => $this->totalAmountSold(),
                'totalSoldThisMonth'    => $this->totalAmountSoldThisMonth(),
                'totalProfit'           => $this->totalProfit(),
                'totalProfitThisMonth'  => $this->thisMonthProfit(),
            ];
            return $array;

        }
        else
        {
            $array = [
                'supply'                => $this->supply,
                'size'                  => $this->size->size,
                'totalSold'             => $this->totalAmountSold(),
                'totalSoldThisMonth'    => $this->totalAmountSoldThisMonth(),
                'totalProfit'           => $this->totalProfit(),
                'totalProfitThisMonth'  => $this->thisMonthProfit(),
            ];
            return $array;

        }

    }
    public function  discount()
    {
        return $this->hasMany('\App\Discount');
    }
}
