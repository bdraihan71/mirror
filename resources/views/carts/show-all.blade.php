@extends('layouts.app')

@section('content')
    <br><br><br><br><br>

    <div class="section black-bg">
        <div class="container-fluid">
            <div class="row">
                <h3 class="page-title"><a href="/home/#top"><i class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT PURCHASES</h3>
            </div>
            <br><br>
            @if (count($purchases) == 0)
                <h3 class="page-title text-center">You have not purchased any products</h3>
            @else
                <h4 class="text-center">After Clicking on the Download Link, please use (Command + p) for mac and (Crtl + p) for other platforms to print the pdf of the ticket</h4>
                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Purchase Date</th>
                            <th>Number of products</th>
                            <th>Payment Method</th>
                            <th>Invoice Link</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td>{{date("M d, Y", strtotime($purchase->created_at))}}</td>
                                <td>{{count($purchase->carts)}}</td>
                                <th>{{$purchase->method}}</th>
                                <td><a href="/purchase/print/{{$purchase->id}}" target="_blank">Download Link</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection