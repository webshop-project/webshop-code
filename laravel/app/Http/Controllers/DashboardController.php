<?php

namespace App\Http\Controllers;

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

//
//        $products = DB::table('products')
//            ->select(DB::raw('*'))
//            ->where('deleted_at', '=', null)
//            ->orderBy('viewAmount', 'desc')
//            ->paginate(3);

//        $productsLow = DB::table('products')
//            ->select(DB::raw('*'))
//            ->where([
//                ['deleted_at', '=', null],
//                ['supply', '<=', 3]
//            ])
//            ->orderBy('supply', 'asc')
//            ->paginate(3,['*'],'pag');
//
//        $images = DB::table('images')
//            ->select(DB::raw('*'))
//            ->where([
//                ['deleted_at', '=', null],
//            ])
//            ->get();
//
//        $productsCount = DB::table('products')->count();
//        $userCount = DB::table('users')->count();
//        $orderCount = DB::table('orders')->count();
//        $voucherCount = DB::table('vouchers_used')->count();
        $warehouse = new Warehouse();
        $lowOnStock = $warehouse::where('supply','<',4)->count();
        return view('admin/index')->with('lowOnStock',$lowOnStock);
//            ->with('products', $products)
//            ->with('image', $images)
//            ->with('productsLow', $productsLow)
//            ->with('productsCount', $productsCount)
//            ->with('usersCount' ,  $userCount)
//            ->with('ordersCount',$orderCount)
//            ->with('vouchersCount' , $voucherCount);
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
}
