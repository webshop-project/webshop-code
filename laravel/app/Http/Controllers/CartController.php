<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;
use App\Warehouse;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/shop/cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->size === "S"){
            $getPrice = DB::table('warehouse')->where('product_id', $request->id)->where('size_id', 1)->get();
        }
        if ($request->size === "M"){
            $getPrice = DB::table('warehouse')->where('product_id', $request->id)->where('size_id', 2)->get();
        }
        if ($request->size === "L"){
            $getPrice = DB::table('warehouse')->where('product_id', $request->id)->where('size_id', 3)->get();
        }
        if ($request->size === "XL"){
            $getPrice = DB::table('warehouse')->where('product_id', $request->id)->where('size_id', 4)->get();
        }

        $price = $getPrice[0]->price;

        Cart::add($request->id, $request->name, 1, $price, [ 'size' => $request->size])->associate('App\Product');
        return redirect('/shop')->withSuccessMessage('Item was added to your cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('/shop/cart')->withSuccessMessage('Item has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('/shop')->withSuccessMessage('Your cart has been cleared!');
    }
}
