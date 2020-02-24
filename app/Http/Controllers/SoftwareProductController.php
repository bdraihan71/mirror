<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SoftwareProduct;

class SoftwareProductController extends Controller
{
    public function index(){
        return view('software-products.index');
    }
}