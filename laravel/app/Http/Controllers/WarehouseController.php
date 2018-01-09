<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Warehouse::paginate(6);
        return view('admin/products/product')
            ->with('products', $products);
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
        $sizes = \App\size::All();
        $storages = \App\size::where('category_id', '=' , 6);

        return view('admin/products/productAdd')
            ->with('houses', $houses)
            ->with('categories', $catergories)
            ->with('sizes', $sizes)
            ->with('storages', $storages);
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
            'category' => 'required',
            'house' => 'required|integer',
            'priceS' => 'nullable|numeric|between:0,00.999999999,99',
            'priceM' => 'nullable|numeric|between:0,00.999999999,99',
            'priceL' => 'nullable|numeric|between:0,00.999999999,99',
            'priceXL' => 'nullable|numeric|between:0,00.999999999,99',
            'stockS' => 'integer|nullable',
            'stockM' => 'integer|nullable',
            'stockL' => 'integer|nullable',
            'stockXL' => 'integer|nullable',
            'storage' => 'integer|nullable',
            'description' => 'required',
            'image' => 'required'
        ]);

        if ($request->category == 5) {

            $product = new \App\product();
            $product->category_id = $request->category;
            $product->house_id = $request->house;
            $product->description = $request->description;

            $first = true;
            foreach ($request->image as $image)
                if ($first) {
                    $path = $image->storePublicly('public');
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
                    imagejpeg($thumb, storage_path("app/$path"));

                    $product->img = '/storage/' . $image->hashName();

                    $product->save();
                    $first = false;

                } else {
                    $productV = $product->id;
                    $path = $image->storePublicly('public');
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
                    imagejpeg($thumb, storage_path("app/$path"));

                    $imageAdd = new \App\image();

                    $imageAdd->product_id = $productV;
                    $imageAdd->img = '/storage/' . $image->hashName();

                    $imageAdd->save();
                }

                if ($request->sizeS == 'on') {
                    $warehouse = new \App\Warehouse();
                    $warehouse->product_id = $product->id;
                    $warehouse->size_id = 1;
                    $warehouse->supply = $request->stockS;
                    $warehouse->price = $request->priceS;
                    $warehouse->save();
                }

                if ($request->sizeM == 'on') {
                    $warehouse = new \App\Warehouse();
                    $warehouse->product_id = $product->id;
                    $warehouse->size_id = 2;
                    $warehouse->supply = $request->stockM;
                    $warehouse->price = $request->priceM;
                    $warehouse->save();
                }
                if ($request->sizeL == 'on') {
                    $warehouse = new \App\Warehouse();
                    $warehouse->product_id = $product->id;
                    $warehouse->size_id = 3;
                    $warehouse->supply = $request->stockL;
                    $warehouse->price = $request->priceL;
                    $warehouse->save();
                }
                if ($request->sizeXL == 'on') {
                    $warehouse = new \App\Warehouse();
                    $warehouse->product_id = $product->id;
                    $warehouse->size_id = 4;
                    $warehouse->supply = $request->stockXL;
                    $warehouse->price = $request->priceXL;
                    $warehouse->save();
                }

        }

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
        $product = \App\Product::find($id);
        $relatedProducts = \App\Product::select('*')->where('house_id', '=', $product->house_id)->where('category_id', '!=', $product->category_id)->get();
        $models = \App\Product::where('category_id', '=', $product->category_id)->where('house_id', '=', $product->house_id)->get();


        return view('pages/shop/details')
            ->with('product', $product)
            ->with('relatedProducts', $relatedProducts)
            ->with('models', $models);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = \App\Warehouse::where('product_id', '=', $id)->get();
        $catergories = \App\categorie::All();
        $houses = \App\house::All();
        $brands = \App\brand::All();
        $models = \App\ProductModel::All();

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
            ->with('models', $models);
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
        \App\Warehouse::destroy($id);
        return redirect('products')->with('succes', 'Product has been deleted!');
    }

}
