<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Purchase;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Mail;
use App\Mail\ProductPurchase as vMail;
use App\User;

class CartsController extends Controller
{
    public function add (Request $request, $id)
    {
        $this->validate($request, [
            'quantity' => 'required|min:1',
        ]);
        $product = Product::find($id);

        if ($product->quantity < $request->quantity) {
            $url = '/shop/'.$id;
            $message = 'Sorry, we do not have that many '.$product->name.' in stock';
            flash($message)->error();

            return redirect($url);
        }

        $cart = Cart::where('user_id', auth()->user()->id)->whereNull('purchase_id')->where('product_id', $id)->first();

        if ($cart == null) {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $id;
            $cart->quantity = $request->quantity;
            $cart->purchase_id = null;
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
        $items = Cart::whereNull('purchase_id')->where('user_id', auth()->user()->id)->get();
        $total = 0;

        foreach ($items as $item) {
            $total += ($item->quantity * $item->product->price);
        }

        return view('carts/cart')->with('items', $items)->with('total', $total);
    }

    public function remove (Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        flash('Item removed from cart');

        return redirect('/cart');
    }

    public function checkout ()
    {
        return view('carts/checkout');
    }

    public function session (Request $request)
    {
        $items = Cart::where('user_id', auth()->user()->id)->whereNull('purchase_id')->get();
        $names = array();

        foreach ($items as $item) {
            if ($item->quantity > $item->product->quantity) {
                array_push($names, $item->product->name);
            }
        }

        if (sizeof($names) != 0) {
            $message = 'Sorry, we do not have the required number of ';

            for ($i = 0; $i < sizeof($names); $i++) {
                if ($i == (sizeof($names) - 1)) {
                    $message = $message.' '.$names[$i].'.';
                } else {
                    $message = $message.' '.$names[$i].', ';
                }
            }

            flash($message)->error();

            return redirect('/checkout');
        }

        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required',
            'division' => 'required'
        ]);

        $now = new Carbon;

        $purchase = new Purchase;
        $purchase->user_id = auth()->user()->id;
        $purchase->number = $now->format('Ymd').time();
        $purchase->address = $request->address;
        $purchase->division = $request->division;
        $purchase->phone = $request->phone;

        if ($request->meth == 'cash') {
            $purchase->method = 'Cash on delivery';
            $purchase->save();

            foreach ($items as $item) {
                $item->purchase_id = $purchase->id;
                $item->save();

                $product = $item->product;
                $product->quantity = $product->quantity - $item->quantity;
                $product->save();
            }

            Mail::to(auth()->user()->email)->send(new vMail($purchase));

            flash('You have successfully bought the product(s)')->success();

            return redirect('/home');
        } else {
            $purchase->method = 'Online Payment';
            $purchase->save();
            $total_amount = 0;

            foreach ($items as $item) {
                $total_amount += ($item->product->price * $item->quantity);
            }

            $appURl = config('app.url');

            $store_id = env('SSL_STORE_ID', false);
            $store_pass =  env('SSL_STORE_PASS', false);
            $total_amount = number_format($total_amount, 2, '.', '');
            $currency = 'BDT';
            $tran_id = new Carbon;
            $tran_id = $tran_id->format('Y-m-d::H:i:s.u');
            $tran_id = $tran_id.auth()->user()->id.$purchase->id;
            $success_url = $appURl.'/api/product/0/'.$purchase->id.'/'.auth()->user()->id;
            $fail_url = $appURl.'/api/product/1/'.$purchase->id.'/'.auth()->user()->id;
            $cancel_url = $appURl.'/api/product/2/'.$purchase->id.'/'.auth()->user()->id;
            $emi_potion = '0';
            $cus_name = auth()->user()->profile->f_name.auth()->user()->profile->m_name.auth()->user()->profile->l_name;
            $cus_email = auth()->user()->email;
            $cus_phone = auth()->user()->profile->phone;
            $client = new Client();

            $response = $client->request('POST', 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php', [
                'form_params' => [
                    'store_id' => $store_id,
                    'store_passwd' => $store_pass,
                    'total_amount' => $total_amount,
                    'currency' => $currency,
                    'tran_id' => $tran_id,
                    'success_url' => $success_url,
                    'fail_url' => $fail_url,
                    'cancel_url' => $cancel_url,
                    'emi_potion' => $emi_potion,
                    'cus_name' => $cus_name,
                    'cus_email' => $cus_email,
                    'cus_phone' => $cus_phone,
                ]
            ]);

            if (json_decode($response->getBody())->status == 'FAILED') {
                $url = '/shop';

                $purchase->delete();

                flash(json_decode($response->getBody())->failedreason)->error();

                return redirect($url);
            }

            return redirect(json_decode($response->getBody())->redirectGatewayURL);
        }
    }

    public function status (Request $request, $status, $id, $user)
    {
        $purchase = Purchase::find($id);
        if ($status == 0 && $request->status == 'VALID') {
            $items = Cart::where('user_id', $user)->whereNull('purchase_id')->get();

            foreach ($items as $item) {
                $item->purchase_id = $id;
                $item->save();

                $product = $item->product;
                $product->quantity = $product->quantity - $item->quantity;
                $product->save();
            }

            
            Mail::to(User::find($user)->email)->send(new vMail($purchase));

            flash('Congratulations! Your order has been placed!')->success();

            return redirect('/home');
        } else {
            $purchase->delete();
            // flash('Something went wrong, we could not place your order')->error();

            flash('Something went wrong, we could not place your order')->error();

            return redirect('/checkout');
        }
    }

    public function invoice ()
    {
        $purchases = Purchase::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view('carts/show-all')->with('purchases', $purchases);
    }

    public function print (Request $request, $id)
    {
        $purchase = Purchase::find($id);
        $user = auth()->user();

        $total = 0;

        foreach ($purchase->carts as $item) {
            $total += ($item->quantity * $item->product->price);
        }

        $shipping = array(50, 3);

        if ($user->profile->division != 'Dhaka') {
            $shipping[0] = 100;
            $shipping[1] = 10;
        }

        return view('carts/print')->with('purchase', $purchase)->with('user', $user)->with('total', $total)->with('shipping', $shipping);
    }
}
