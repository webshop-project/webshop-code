<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
class PagesController extends Controller
{
    public function index()
    {
        $products = \App\product::all();

        return view('pages/index', ['products' => $products]);
        
    }

    public function about()
    {
        return view('pages/about');
    }

    public function shop()
    {
        return view('pages/shop');
    }

    public function category()
    {
        return view("/pages/shop/category");
    }
    public function item()
    {
        return view("/pages/shop/details");
    }

    public function contact()
    {
        return view('pages/contact');
    }
    public function houses()
    {
        return view('pages/houses');
    }


}
