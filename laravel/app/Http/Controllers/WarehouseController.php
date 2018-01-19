<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Controller;

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
        $brands = \App\brand::all();
        $brandModels = \App\ProductModel::all();

        return view('admin/products/productAdd')
            ->with('houses', $houses)
            ->with('categories', $catergories)
            ->with('brands', $brands)
            ->with('brandModels', $brandModels);
    }

    /**

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
            'priceS' => 'nullable|numeric|between:0.00,999999999.99',
            'priceM' => 'nullable|numeric|between:0.00,999999999.99',
            'priceL' => 'nullable|numeric|between:0.00,999999999.99',
            'priceXL' => 'nullable|numeric|between:0.00,999999999.99',
            'stockS' => 'integer|nullable',
            'stockM' => 'integer|nullable',
            'stockL' => 'integer|nullable',
            'stockXL' => 'integer|nullable',
            'price8' => 'nullable|numeric|between:0.00,999999999.99',
            'price16' => 'nullable|numeric|between:0.00,999999999.99',
            'price32' => 'nullable|numeric|between:0.00,999999999.99',
            'price64' => 'nullable|numeric|between:0.00,999999999.99',
            'stock8' => 'integer|nullable',
            'stock16' => 'integer|nullable',
            'stock32' => 'integer|nullable',
            'stock64' => 'integer|nullable',
            'priceSt' => 'nullable|numeric|between:0.00,999999999.99',
            'stockSt' => 'integer|nullable',
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
                    $path = $image;

                    // File and new size
                    $filename = $path;

                    // Content type
                    header('Content-Type: image/jpeg');

                    // Get new sizes
                    list($width, $height) = getimagesize($filename);
                    $newwidth = 377;
                    $newheight = 337;

                    // Load
                    $thumb = imagecreatetruecolor($newwidth, $newheight);
                    $source = imagecreatefromjpeg($path);

                    // Resize
                    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                    $test = public_path("img");
                    // Output
                    imagejpeg($thumb , "img/merch/{$image->hashName()}");

                    $product->img = "/img/merch/".$image->hashName();

                    $product->save();
                    $first = false;

                } else {
                    $productV = $product->id;
                    $path = $image;

                    // File and new size
                    $filename = $path;

                    // Content type
                    header('Content-Type: image/jpeg');

                    // Get new sizes
                    list($width, $height) = getimagesize($filename);
                    $newwidth = 1000;
                    $newheight = 1000;

                    // Load
                    $thumb = imagecreatetruecolor($newwidth, $newheight);
                    $source = imagecreatefromjpeg($path);

                    // Resize
                    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                    $test = public_path("img");
                    // Output
                    imagejpeg($thumb , "img/merch{$image->hashName()}");

                    $imageAdd = new \App\image();

                    $imageAdd->product_id = $productV;
                    $imageAdd->img = '/img/merch' . $image->hashName();

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
        elseif($request->category == 6) {

            $product = new \App\product();
            $product->category_id = $request->category;
            $product->house_id = $request->house;
            $product->description = $request->description;

            $first = true;
            foreach ($request->image as $image)
                    if ($first) {
                        $path = $image;

                        // File and new size
                        $filename = $path;

                        // Content type
                        header('Content-Type: image/jpeg');

                        // Get new sizes
                        list($width, $height) = getimagesize($filename);
                        $newwidth = 377;
                        $newheight = 337;

                        // Load
                        $thumb = imagecreatetruecolor($newwidth, $newheight);
                        $source = imagecreatefromjpeg($path);

                        // Resize
                        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                        $test = public_path("img");
                        // Output
                        imagejpeg($thumb , "img/merch/{$image->hashName()}");

                        $product->img = "/img/merch/".$image->hashName();

                        $product->save();
                        $first = false;

                    } else {
                        $productV = $product->id;
                        $path = $image;

                        // File and new size
                        $filename = $path;

                        // Content type
                        header('Content-Type: image/jpeg');

                        // Get new sizes
                        list($width, $height) = getimagesize($filename);
                        $newwidth = 1000;
                        $newheight = 1000;

                        // Load
                        $thumb = imagecreatetruecolor($newwidth, $newheight);
                        $source = imagecreatefromjpeg($path);

                        // Resize
                        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                        $test = public_path("img");
                        // Output
                        imagejpeg($thumb , "img/merch/{$image->hashName()}");

                        $imageAdd = new \App\image();

                        $imageAdd->product_id = $productV;
                        $imageAdd->img = '/img/merch/' . $image->hashName();

                        $imageAdd->save();
                    }

            if ($request->size8 == 'on') {
                $warehouse = new \App\Warehouse();
                $warehouse->product_id = $product->id;
                $warehouse->size_id = 5;
                $warehouse->supply = $request->stock8;
                $warehouse->price = $request->price8;
                $warehouse->save();
            }

            if ($request->size16 == 'on') {
                $warehouse = new \App\Warehouse();
                $warehouse->product_id = $product->id;
                $warehouse->size_id = 6;
                $warehouse->supply = $request->stock16;
                $warehouse->price = $request->price16;
                $warehouse->save();
            }
            if ($request->size32 == 'on') {
                $warehouse = new \App\Warehouse();
                $warehouse->product_id = $product->id;
                $warehouse->size_id = 7;
                $warehouse->supply = $request->stock32;
                $warehouse->price = $request->price32;
                $warehouse->save();
            }
            if ($request->size64== 'on') {
                $warehouse = new \App\Warehouse();
                $warehouse->product_id = $product->id;
                $warehouse->size_id = 8;
                $warehouse->supply = $request->stock64;
                $warehouse->price = $request->price64;
                $warehouse->save();
            }

        }
        elseif($request->category == 4) {

            $product = new \App\product();
            $product->category_id = $request->category;
            $product->house_id = $request->house;
            $product->brand_model_id = $request->brandType;
            $product->description = $request->description;

            $first = true;
            foreach ($request->image as $image)
                if ($first) {
                    $path = $image;

                    // File and new size
                    $filename = $path;

                    // Content type
                    header('Content-Type: image/jpeg');

                    // Get new sizes
                    list($width, $height) = getimagesize($filename);
                    $newwidth = 377;
                    $newheight = 337;

                    // Load
                    $thumb = imagecreatetruecolor($newwidth, $newheight);
                    $source = imagecreatefromjpeg($path);

                    // Resize
                    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                    $test = public_path("img");
                    // Output
                    imagejpeg($thumb , "img/merch/{$image->hashName()}");

                    $product->img = "/img/merch/".$image->hashName();

                    $product->save();
                    $first = false;

                } else {
                    $productV = $product->id;
                    $path = $image;

                    // File and new size
                    $filename = $path;

                    // Content type
                    header('Content-Type: image/jpeg');

                    // Get new sizes
                    list($width, $height) = getimagesize($filename);
                    $newwidth = 1000;
                    $newheight = 1000;

                    // Load
                    $thumb = imagecreatetruecolor($newwidth, $newheight);
                    $source = imagecreatefromjpeg($path);

                    // Resize
                    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                    $test = public_path("img");
                    // Output
                    imagejpeg($thumb , "img/merch/{$image->hashName()}");

                    $imageAdd = new \App\image();

                    $imageAdd->product_id = $productV;
                    $imageAdd->img = '/img/merch/' . $image->hashName();

                    $imageAdd->save();
                }

            $warehouse = new \App\Warehouse();
            $warehouse->product_id = $product->id;
            $warehouse->supply = $request->stockSt;
            $warehouse->price = $request->priceSt;
            $warehouse->save();

        }
        else{
            $product = new \App\product();
            $product->category_id = $request->category;
            $product->house_id = $request->house;
            $product->description = $request->description;

            $first = true;
            foreach ($request->image as $image)
                if ($first) {
                    $path = $image;

                    // File and new size
                    $filename = $path;

                    // Content type
                    header('Content-Type: image/jpeg');

                    // Get new sizes
                    list($width, $height) = getimagesize($filename);
                    $newwidth = 377;
                    $newheight = 337;

                    // Load
                    $thumb = imagecreatetruecolor($newwidth, $newheight);
                    $source = imagecreatefromjpeg($path);

                    // Resize
                    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                    $test = public_path("img");
                    // Output
                    imagejpeg($thumb , "img/merch/{$image->hashName()}");

                    $product->img = "/img/merch/".$image->hashName();

                    $product->save();
                    $first = false;

                } else {
                    $productV = $product->id;
                    $path = $image;

                    // File and new size
                    $filename = $path;

                    // Content type
                    header('Content-Type: image/jpeg');

                    // Get new sizes
                    list($width, $height) = getimagesize($filename);
                    $newwidth = 377;
                    $newheight = 337;

                    // Load
                    $thumb = imagecreatetruecolor($newwidth, $newheight);
                    $source = imagecreatefromjpeg($path);

                    // Resize
                    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                    $test = public_path("img");
                    // Output
                    imagejpeg($thumb , "img/merch/{$image->hashName()}");

                    $imageAdd = new \App\image();

                    $imageAdd->product_id = $productV;
                    $imageAdd->img = '/img/merch/' . $image->hashName();

                    $imageAdd->save();
                }
            $warehouse = new \App\Warehouse();
            $warehouse->product_id = $product->id;
            $warehouse->supply = $request->stockSt;
            $warehouse->price = $request->priceSt;
            $warehouse->save();
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
        $products = \App\Warehouse::where('id','=',$id)->get();
        return view('admin/products/productAdjust')
            ->with('products', $products);
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
        $request->validate([
            'price' => 'required|numeric|between:0.00,999999999.99',
            'stock' => 'required|integer|min:0',
            'discount' => 'integer|nullable|max:100',
            'startDate' => 'required|date|before:endDate',
            'endDate' => 'required|date|after:startDate',
        ]);

        $warehouse = \App\Warehouse::find($id);
        $warehouse->price = $request->price;
        $warehouse->supply = $request->stock;

        $discount = \App\Discount::where('warehouse_id','=',$id)->first();
        if($discount === null)
        {
            $discount = new \App\Discount();
            $discount->warehouse_id = $id;
            $discount->discount = $request->discount;
            $discount->start_date = $request->startDate . ' 00:00:01';
            $discount->end_date = $request->endDate . ' 23:59:59';
        }
        else
        {
            $discount->discount = $request->discount;
            $discount->start_date = $request->startDate;
            $discount->end_date = $request->endDate;
        }

        $discount->save();
        $warehouse->save();
        return back()->with('succes', 'Product has been updated');
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
