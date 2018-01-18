<?php

namespace App\Http\Controllers;

use App\order;
use App\Product;
use App\Warehouse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = new Product();
        $warehouse = new Warehouse();
//        $warehouseProducts = \App\order::all()->groupBy('warehouse_id');
        $orderProducts = \App\order::all()->groupBy('warehouse_id');
        $amounts = [];
        $query = [];

        $i = 0;
        foreach($orderProducts as $orderProduct){
            $count = 0;
            foreach($orderProduct as $productOrder){
                $count += $productOrder->amount;
            }
            array_push($amounts, ['amount' => $count, 'id' => $orderProduct[0]->warehouse_id]);
        }

        usort($amounts, function ($a, $b) {
            return $a['amount'] - $b['amount'];
        });

        $amounts = array_reverse($amounts);

        foreach ($amounts as $amount){
            array_push($query, [$amount['id']]);
        }

        $warehouseProducts = \App\Warehouse::whereIn('id', $query)->paginate(6);

//        foreach($warehouseProducts as $orderProduct){
//            $count = 0;
//            foreach($orderProduct as $test){
//                $count += $test->amount;
//            }
//            array_push($amounts, [$count, $orderProduct[0]->warehouse_id]);
//        }

        $warehouse = new Warehouse();
        $productsLow = $warehouse->where('supply','<',4)->orderBy('supply')->paginate(3);

        return view('admin/index')
            ->with('warehouseProducts', $warehouseProducts)
            ->with('products',$products)
            ->with('productsLow', $productsLow)
            ->with('amounts', $amounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showProduct = Warehouse::where('product_id','=',$id)->get();
        return view('admin/products/show')->with('showProduct',$showProduct)->with('urlId',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lowStockList()
    {
        $lowOnStock = \App\Warehouse::where('supply','<',4)->orderBy('supply')->paginate(6);
        return view('admin/products/lowStockList', ['lowOnStock' => $lowOnStock]);
    }
}
