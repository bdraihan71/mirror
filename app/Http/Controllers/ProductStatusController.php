<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Carbon\Carbon;
use App\Issue;

class ProductStatusController extends Controller
{
    public function updateStatus (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error();

            return back();
        }

        $prefix = 'cart-';
        $str = $request->cart_id;
        $str = preg_replace('/^' . preg_quote($prefix, '/') . '/', '', $str);
        $now = new Carbon;
        $status = $request->status_id;
        $cart = Cart::find($str);
        
        if ($status == 1) {
            if ($cart->confirmed_at == null) {
                $cart->confirmed_at = $now->toDateTimeString();
            } else {
                $cart->confirmed_at = null;
            }
        } elseif ($status == 2) {
            if ($cart->sent_at == null) {
                $cart->sent_at = $now->toDateTimeString();
            } else {
                $cart->sent_at = null;
            }
        } elseif ($status == 3) {
            if ($cart->delivered_at == null) {
                $cart->delivered_at = $now->toDateTimeString();
            } else {
                $cart->delivered_at = null;
            }
        } else {
            if ($cart->cancelled_at == null) {
                $cart->cancelled_at = $now->toDateTimeString();
            } else {
                $cart->cancelled_at = null;
            }
        }

        $cart->save();

        flash('Status successfully changed')->success();

        return back();
    }

    public function respond (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error();

            return back();
        }

        $now = new Carbon;
        $issue = Issue::find($request->issue_id);
        $issue->response = $request->response_id;
        $issue->responded_at = $now->toDateTimeString();
        $issue->save();

        flash('Response has been made')->success();

        return back();
    }

    public function issue (Request $request)
    {
        $cart = Cart::find($request->cart_id);

        if ($cart->user->id != auth()->user()->id) {
            flash('You are not authorized to make this change')->error();

            return back();
        }

        $issue = new Issue;
        $issue->cart_id = $request->cart_id;
        $issue->issue = $request->new_issue;
        $issue->save();

        flash('Issue submitted')->success();

        return back();
    }
}
