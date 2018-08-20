<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Purchase;

class ShopController extends Controller
{
    public function index ()
    {
        $products = Product::where('quantity', '>=', 0)->get();

        return view('shop/index')->with('products', $products);
    }
}
