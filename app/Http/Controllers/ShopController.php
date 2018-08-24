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

        return view('shop/index')->with('products', $products)->with('footer', $this->footer());
    }

    public function show (Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        return view('shop/show')->with('product', $product)->with('footer', $this->footer());
    }

    public function create ()
    {
        if (auth()->user()->role != 'admin') {
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

    public function buy (Request $request)
    {
        $product = Product::find($id);

        $store_id = env('SSL_STORE_ID', false);
        $store_pass =  env('SSL_STORE_PASS', false);
        $total_amount = $product->price;
        $total_amount = number_format($total_amount, 2, '.', '');
        $currency = 'BDT';
        $tran_id = new Carbon;
        $tran_id = $tran_id->format('Y-m-d::H:i:s.u');
        $tran_id = $tran_id.auth()->user()->id.$product->id;
        $success_url = 'https://live.ecube-entertainment.com/api/payment/0/'.$product->id.'/'.auth()->user()->id;
        $fail_url = 'https://live.ecube-entertainment.com/api/payment/1/'.$product->id.'/'.auth()->user()->id;
        $cancel_url = 'https://live.ecube-entertainment.com/api/payment/2/'.$product->id.'/'.auth()->user()->id;
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
            $url = '/shop/'.$product->id;

            flash(json_decode($response->getBody())->failedreason)->error();

            return redirect($url);
        }

        return redirect(json_decode($response->getBody())->redirectGatewayURL);
    }

    public function status (Request $request, $id)
    {
        // if ($status == 0 && $request->status == 'VALID') {
        //     code for payment handing of the product

        //     $now = new Carbon;
        //     $now = $now->format('Ymd');
        //     $total_tickets = count(Ticket::where('event_id', $id)->get());
        //     $unsold_tickets = count(Ticket::where('event_id', $id)->whereNull('user_id')->get());
        //     $barcode = $now.time().$id;

        //     $invoice = new Invoice;
        //     $invoice->type = 'ticket';
        //     $invoice->number = ($total_tickets - $unsold_tickets + 1);
        //     $invoice->barcode = $barcode;
        //     $invoice->save();

        //     $ticket = Ticket::where('event_id', $id)->where('ticket_type_id', $type)->whereNull('user_id')->first();
        //     $ticket->user_id = $user;
        //     $ticket->invoice_id = $invoice->id;
        //     $ticket->save();
        //     $user = User::find($user);


        //     return redirect('/tickets')->with('success', 'Ticket successfully purchased');
        // } else {
        //     $answers = EventAnswer::where('event_id')->where('user_id', auth()->user()->id)->get();

        //     foreach ($answers as $answer) {
        //         $answer->delete();
        //     }

        //     $url = '/events/'.$id;

        //     return redirect($url)->with('error', 'Something went wrong');
        // }
    }
}
