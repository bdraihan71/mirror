<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SoftwareProduct;

class SoftwareProductController extends Controller
{
    public function index(){
        $softwareProducts = SoftwareProduct::all();
        return view('software-products.index', compact('softwareProducts'));
    }
}