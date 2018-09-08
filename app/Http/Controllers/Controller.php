<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\WebContent;

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
}
