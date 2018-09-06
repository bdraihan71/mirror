<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Purchase;

class ShopController extends Controller
{
    public function index ()
    {
        $products = Product::where('quantity', '>', 0)->paginate(12);

        return view('shop/index')->with('products', $products)->with('footer', $this->footer());
    }

    public function show (Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        return view('shop/show')->with('product', $product)->with('footer', $this->footer());
    }

    public function create ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to view the page')->error();

            return redirect('/shop');
        }

        return view('shop/create')->with('footer', $this->footer());
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'img' => 'image|required|max:1999|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;

        $filenameWithExt = $request->file('img')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        $extension = $request->file('img')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
        $path = $request->file('img')->storeAs('public/uploadedImg', $fileNameToStore);
        $request->img->move('public/uploadedImg', $fileNameToStore);

        $product->img = '/public/uploadedImg/'.$fileNameToStore;
        $product->save();

        flash('Product successfully added')->success();

        return redirect('shop');
    }

    public function edit (Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        return view('shop/edit')->with('product', $product)->with('footer', $this->footer());
    }

    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $product = Product::where('id', $id)->first();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;

        if ($request->hasFile('img')) {
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $request->file('img')->storeAs('public/uploadedImg', $fileNameToStore);
            $request->img->move('public/uploadedImg', $fileNameToStore);

            $product->img = '/public/uploadedImg/'.$fileNameToStore;
        }

        $product->save();

        flash('Product successfully edited')->success();

        return redirect('shop');
    }

    public function delete (Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $product->quantity = -1;
        $product->save();

        flash('Product successfully deleted')->success();
        return redirect('/shop');
    }
}
