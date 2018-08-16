<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\TicketType;

class PaymentsController extends Controller
{   
    public function sessionId (Request $request, $id)
    {
        $type = TicketType::where('id', $id)->first();

        $store_id = env('SSL_STORE_ID', false);
        $store_pass =  env('SSL_STORE_PASS', false);
        $total_amount = $type->price;
        $total_amount = number_format($total_amount, 2, '.', '');
        $currency = 'BDT';
        $tran_id = new Carbon;
        $tran_id = $tran_id->format('Y-m-d::H:i:s.u');
        $tran_id = $tran_id.auth()->user()->id.$type->event_id;
        $success_url = '/payment/0';
        $fail_url = '/payment/1';
        $cancel_url = '/payment/2';
        $emi_potion = '0';
        $cus_name = auth()->user()->profile->f_name.auth()->user()->profile->m_name.auth()->user()->profile->l_name;
        $cus_email = auth()->user()->email;
        $cus_phone = auth()->user()->profile->phone;
        

    }
}
