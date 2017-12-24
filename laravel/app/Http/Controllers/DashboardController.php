<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Warehouse;
use Illuminate\Http\Request;
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
//        $products = $products->orderByDesc('viewAmount')->paginate(3);

        $warehouse = new Warehouse();
        //test
//        $warehouseProducts = $warehouse->with(['product' => function ($query) {
//            $query->orderBy('viewAmount', 'desc');
//        }])->paginate(3);
        $warehouseProducts = $products->orderByDesc('viewAmount')->paginate(3);
//        $warehouseProducts = $warehouse::with('product')->paginate(3);//orderby viewAmount
        //endtest
        $productsLow = $warehouse->where('supply','<',4)->orderByDesc('supply')->paginate(3);
        $lowOnStock = $warehouse->where('supply','<',4)->count();
        $productsCount = $warehouse->count();

        $user = new User();
        $userCount = $user->count();

        $orderCount = DB::table('orders')->count();
        $voucherCount = DB::table('vouchers_used')->count();

        return view('admin/index')
            ->with('lowOnStock',$lowOnStock)
            ->with('warehouseProducts', $warehouseProducts)
            ->with('products',$products)
            ->with('productsLow', $productsLow)
            ->with('productsCount', $productsCount)
            ->with('usersCount' ,  $userCount)
            ->with('ordersCount',$orderCount)
            ->with('vouchersCount' , $voucherCount);
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
        //
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
        $warehouse = new Warehouse();
        $lowOnStock = $warehouse::where('supply','<',4)
            ->paginate(6);
        return view('admin/products/lowStockList')->with('lowOnStock',$lowOnStock);
    }
}
