<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
class PagesController extends Controller
{
    public function index()
    {
        if(""){
            //Vikings
            if(""){
                $products = \App\Products::where('house_id', '=', 1)->get();
            }
            //Dragons
            elseif(""){
                $products = \App\Products::where('house_id', '=', 2)->get();
            }
            //Ravens
            elseif(""){
                $products = \App\Products::where('house_id', '=', 3)->get();
            }
            //Serpents
            elseif(""){
                $products = \App\Products::where('house_id', '=', 4)->get();
            }
        }
        else{
            $products = \App\Product::all();
        }

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
