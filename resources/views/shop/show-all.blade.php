@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <h3 class="page-title">All Purchases</h3>
        </div>

        <div class="row border-bottom">
            <div class="col-md-2">User Name</div>
            <div class="col-md-1">Purchase method</div>
            <div class="col-md-2">Purchase Date</div>
            <div class="col-md-2">Product Name</div>
            <div class="col-md-1">Product Price</div>
            <div class="col-md-1">Product Quantity</div>
            <div class="col-md-1">Product Total</div>
            <div class="col-md-2">Total</div>
        </div>
        @foreach ($purchases as $purchase)
            <div class="row border-top">
                <div class="col-md-2">{{$purchase->user->profile->f_name.' '.$purchase->user->profile->m_name.' '.$purchase->user->profile->l_name}}</div>
                <div class="col-md-1">{{$purchase->method}}</div>
                <div class="col-md-2">{{date("M d, Y", strtotime($purchase->created_at))}}</div>
                <div class="col-md-2"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
                <div class="col-md-2">{{App\Http\Controllers\Controller::purchaseTotal($purchase->id)}}</div>
            </div>

            @foreach ($purchase->carts as $item)
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2 border-bottom">{{$item->product->name}}</div>
                    <div class="col-md-1 border-bottom">{{$item->product->price}}</div>
                    <div class="col-md-1 border-bottom">{{$item->quantity}}</div>
                    <div class="col-md-1 border-bottom">{{$item->product->price * $item->quantity}}</div>
                    <div class="col-md-2 border-bottom"></div>
                </div>
            @endforeach
            <hr>
        @endforeach
    </div>
@endsection