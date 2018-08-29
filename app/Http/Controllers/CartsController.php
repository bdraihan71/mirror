<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartsController extends Controller
{
    public function add (Request $request, $id)
    {
        $product = Product::find($id);

        if ($product->quantity < $request->quantity) {
            $url = '/shop/'.$id;
            $message = 'Sorry, we do not have that many '.$product->name.' in stock';
            flash($message)->error();

            return redirect($url);
        }

        $cart = Cart::where('user_id', auth()->user()->id)->where('is_purchased', false)->where('product_id', $id)->first();

        if ($cart == null) {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $id;
            $cart->quantity = $request->quantity;
            $cart->is_purchased = false;
            $cart->save();
        } else {
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
        }

        flash('Product successfully added to cart')->success();

        return redirect('/shop');
    }

    public function index ()
    {
        $items = Cart::where('is_purchased', false)->where('user_id', auth()->user()->id)->get();
        $total = 0;

        foreach ($items as $item) {
            $total += ($item->quantity * $item->product->price);
        }

        return view('carts/checkout')->with('items', $items)->with('total', $total);
    }

    public function remove (Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect('/cart');
    }
}
