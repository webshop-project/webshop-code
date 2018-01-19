<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\User;
use App\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = \App\Order::where('shipped','=', 0)->paginate(6);
        $users = DB::table('users')->join('orders', 'users.id', '=', 'orders.user_id');

        return view('admin/orders/orderIndex')
            ->with('orders', $orders)
            ->with('users', $users);
    }

    public function orderS()
    {
        $orders = \App\Order::where('shipped', '=', 1)->paginate(6);
        $users = \App\User::all();

        return view('admin/orders/orderShipped')
            ->with('orders', $orders)
            ->with('users', $users);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = \App\order::find($id);
        $users = \App\User::all();

        return view('admin/orders/detail/orderDetail')
            ->with('orders', $orders)
            ->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $orders = \App\Order::find($id);
        $orders->shipped = 1;
        $orders->save();

        return back();
    }

    public function finish($id){

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
