<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\SoftDeletes;



class ProductController extends Controller
{
    use SoftDeletes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = DB::table('products')
            ->select(DB::raw('*'))
            ->where('deleted_at', '=', null)
            ->paginate(6);

        $images = DB::table('image')
            ->select(DB::raw('*'))
            ->where([
                ['deleted_at', '=', null],
                    ])
            ->get();


        return view('admin/products/product')
            ->with('products' , $products)
            ->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/products/productAdd');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = \App\product::find($id);
        $catergories = \App\categorie::All();
        $houses = \App\house::All();
        $brands = \App\brand::all();
        $models = \App\brand_model::All();
        $storages = \App\storage::All();

        $images = DB::table('image')
            ->select(DB::raw('*'))
            ->where([
                 ['product_id', '=', $id],
                 ['deleted_at', '=', null]
            ])
            ->get();

        return view('admin/products/productAdjust')
            ->with('products', $product)
            ->with('categories', $catergories)
            ->with('image', $images)
            ->with('houses', $houses)
            ->with('brands', $brands)
            ->with('models', $models)
            ->with('storages', $storages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\product::destroy($id);

        return redirect('products')->with('succes', 'Product has been deleted!');
    }
}
