<?php

namespace App\Http\Controllers;

use App\house;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\SoftDeletes;

// Tim was here
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

        $images = DB::table('images')
            ->select(DB::raw('*'))
            ->where([
                ['deleted_at', '=', null],
            ])
            ->get();


        return view('admin/products/product')
            ->with('products', $products)
            ->with('images', $images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $houses = \App\house::All();
        $catergories = \App\categorie::All();
        $storages = \App\storage::All();
        return view('admin/products/productAdd')
            ->with('houses', $houses)
            ->with('categories', $catergories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:products,name',
            'category' => 'required|max:50',
            'price' => 'required|integer',
            'house' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required',
            'image' => 'required'
        ]);

        dd($request->all());
        $product = new \App\product();

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->house_id = $request->house;

        $product->supply = $request->stock;
        $product->description = $request->description;

        $path = $request->file('image')->storePublicly('public');
        // File and new size
        $filename = storage_path("app/$path");

        // Content type
        header('Content-Type: image/jpeg');

        // Get new sizes
        list($width, $height) = getimagesize($filename);
        $newwidth = 377;
        $newheight = 337;

        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($filename);

        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        // Output
        imagejpeg($thumb , storage_path("app/$path"));

        $product->img = 'storage/'.$request->file('image')->hashName();


        $productV = \App\product::select('*')->where('name', '=', $request->name)->get();
    if ($request->category == 5)
        if($request->sizeS == 'on'){
            $size = new \App\size();

            $size->clothing_id = $productV[0]->id;
            $size->size = 'S';

            $size->save();
        }
        if($request->sizeM == 'on'){
            $size = new \App\Size();

            $size->clothing_id = $productV[0]->id;
            $size->size = 'M';

            $size->save();
        }
        if($request->sizeL == 'on'){
            $size = new \App\Size();

            $size->clothing_id = $productV[0]->id;
            $size->size = 'L';

            $size->save();
        }
        if($request->sizeXL == 'on'){
            $size = new \App\Size();

            $size->clothing_id = $productV[0]->id;
            $size->size = 'XL';

            $size->save();
        }
      elseif($request->category == 6){



      }

        $product->save();
        return redirect()->action('DashboardController@index');
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
        $product = \App\product::find($id);
        $catergories = \App\categorie::All();
        $houses = \App\house::All();
        $brands = \App\brand::all();
        $models = \App\brand_model::All();
        $storages = \App\storage::All();

        $images = DB::table('images')
            ->select(DB::raw('*'))
            ->where([
                ['product_id', '=', $id],
                ['deleted_at', '=', null]
            ])
            ->get();

        return view('admin/products/productAdjust')
            ->with('products', $product)
            ->with('categories', $catergories)
            ->with('images', $images)
            ->with('houses', $houses)
            ->with('brands', $brands)
            ->with('models', $models)
            ->with('storages', $storages);
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
        \App\product::destroy($id);

        return redirect('products')->with('succes', 'Product has been deleted!');
    }
}
