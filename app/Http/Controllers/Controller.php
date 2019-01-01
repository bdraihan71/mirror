<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\WebContent;
use App\Purchase;
use App\Cart;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function footer ()
    {
        $footer = array(WebContent::where('id', 16)->first(), WebContent::where('id', 17)->first(), WebContent::where('id', 18)->first());

        return $footer;
    }

    public static function notAdmin ()
    {   
        if (auth()->user()->role != 'admin' && auth()->user()->role != 'super-admin') {
            return true;
        } else {
            return false;
        }
    }

    public function findSRC ($url)
    {
        $url = explode(' ', $url);
        $i = 0;
        $flag = true;

        for ($i = 0; $i < sizeof($url); $i++) {
            if (strpos($url[$i], 'src') !== false) {
                break;
                $flag = false;
            }
        }

        if (!$flag) {
            dd('This is not an embedded link');
        }

        $url = str_split($url[$i], 1);
        $x = '';

        for ($j = 5; $j < sizeof($url) - 1; $j++) {
            $x = $x.$url[$j];
        }

        return $x;
    }

    public static function purchaseTotal ($id)
    {
        $purchase = Purchase::find($id);
        $total = 0;

        foreach ($purchase->carts as $item) {
            $total += ($item->product->price * $item->quantity);
        }

        return $total;
    }

    public function uploadImage ($request)
    {
        $filenameWithExt = $request->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        $extension = $request->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
        $path = $request->storeAs('/uploads', $fileNameToStore);

        return '/storage/uploads/'.$fileNameToStore;
    }

    public static function cartItems ()
    {
        $items = Cart::whereNull('purchase_id')->where('user_id', auth()->user()->id)->get();

        return count($items);
    }

    public static function formatMoney ($amount)
    {
        if ($amount == 0) {
            return 0;
        }

        $tmp = explode(".",$amount); // for float or double values
        $strMoney = "";
        $divide = 1000;
        $amount = $tmp[0];
        $strMoney .= str_pad($amount%$divide, 3, "0", STR_PAD_LEFT);
        $amount = (int)($amount/$divide);
        
        while($amount>0) {
            $divide = 100;
            $strMoney = str_pad($amount%$divide, 2, "0", STR_PAD_LEFT).",".$strMoney;
            $amount = (int)($amount/$divide);
        }

        if(substr($strMoney, 0, 1) == "0")
            $strMoney = substr($strMoney,1);

        if(isset($tmp[1])) {
            return $strMoney.".".$tmp[1];
        }

        return $strMoney;
    }

    public static function nameConcatenator ($user)
    {
        $user = $user->profile;
        $name = null;

        if ($user->m_name == null) {
            $name = $user->f_name.' '.$user->l_name;
        } else {
            $name = $user->f_name.' '.$user->m_name.' '.$user->l_name;
        }

        return $name;
    }

    public function updateImage ($request, $previous)
    {
        dd(exec('cd ../storage/app/public/ && pwd'));
        $file_path = $path.str_replace("storage/","",$previous->url);
        unlink($file_path);
        $filenameWithExt = $request->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        $extension = $request->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
        $path = $request->storeAs('/uploads', $fileNameToStore);

        return '/storage/uploads/'.$fileNameToStore;
    }
}
