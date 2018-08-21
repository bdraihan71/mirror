<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\TicketType;
use App\Ticket;
use App\EventAnswer;
use GuzzleHttp\Client;

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
        $success_url = 'https://live.ecube-entertainment.com/api/payment/0/'.$type->event_id.'/'.auth()->user()->id.'/'.$id;
        $fail_url = 'https://live.ecube-entertainment.com/api/payment/1/'.$type->event_id.'/'.auth()->user()->id.'/'.$id;
        $cancel_url = 'https://live.ecube-entertainment.com/api/payment/2/'.$type->event_id.'/'.auth()->user()->id.'/'.$id;
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
            $url = '/events/'.$type->event_id;

            return redirect($url)->with('error', json_decode($response->getBody())->failedreason);
        }

        return redirect(json_decode($response->getBody())->redirectGatewayURL);
    }

    public function status (Request $request, $status, $id, $user, $type)
    {
        if ($status == 0 && $request->status == 'VALID') {
            $ticket = Ticket::where('event_id', $id)->where('ticket_type_id', $type)->whereNull('user_id')->first();
            $ticket->user_id = $user;
            $ticket->save();
            $url = '/events/'.$id;

            return redirect($url)->with('success', 'Ticket successfully bought!');
        } else {
            $answers = EventAnswer::where('event_id')->where('user_id', auth()->user()->id)->get();

            foreach ($answers as $answer) {
                $answer->deleteO();
            }

            $url = '/events/'.$id;

            return redirect($url)->with('error', 'Something went wrong');
        }
    }
}
