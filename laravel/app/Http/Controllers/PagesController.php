<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('views/pages/index');
    }

    public function about()
    {
        return view('views/pages/about');
    }

    public function shop()
    {
        return view('views/pages/shop');
    }

    public function contact()
    {
        return view('views/pages/contact');
    }
    public function houses()
    {
        return view('views/pages/houses');
    }
}
