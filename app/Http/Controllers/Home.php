<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
// use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $setting = Setting::where('id', 1)->first();
        $products = Product::latest()->get(); 
        $category = Category::all();
        return view('welcome', compact('setting','products', 'category'));

    }
}
