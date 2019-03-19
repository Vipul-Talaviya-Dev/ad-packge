@extends('user.layouts.main')

@section('title', 'My Account')

@section('css')
<link rel="stylesheet" type="text/css" href="http://fashion.altsolution.in/front/css/custom.css">
<style type="text/css">
    #cartLoad, #myModal {
     top: 0; 
    }
</style>
@endsection
@section('content')
<section class="section-padding offer-section">
    <div class="container">
        <div class="col-md-9 col-xs-12 margin-top-10">
        @if(count($orders) == 0)
        <div class="fsn-box pck-box-shadow text-center" >
            <h3>Hey, There are no any Order history available 
                <a href="{{ route('user.index') }}"><b class="red">Order Now!</b></a>
            </h3> 
        </div>
        @endif
        @foreach($orders as $order)
        <?php
            $product = $order->product;
        ?>
        <div class="shopping-order-box">
            <div class="row">
                <div class="col-md-3">
                    <span class="timetitle btimes"><a href="javascript:void(0);"><img class="track-img-thumb" src="{{ \Cloudder::secureShow($product->image) }}" alt="{{ $product->name }}" width="72" height="72"></a></span>
                </div>
                <div class="col-md-3">
                    <a href="javascript:void(0);" target="_blank" class="btn btn-cart btn-xs black-text">GET INVOICE<div class="ripple-wrapper"></div></a>
                </div>
                <div class="col-md-3 text-center">
                    <span class="timetitle atimes">{{ 'ADPACKING'.date('Ymd', strtotime($order->created_at)).$order->order_id }}</span><br>
                    <span class="font-size-10 green">Placed On {{ date('d M, Y', strtotime($order->created_at)) }}</span>
                </div>
                <div class="col-md-3 text-center">
                    <span class="timetitle atimes">Rs. {{ $order->price }}</span><br>
                    <span class="bus-order-location">Qty : {{ $order->qty }} </span>
                </div>
            </div>
            <p><br></p>
            @if(false)
            <span class="line-divider-dashed1"></span>
            <span>7-Day Easy Returns Policy period has ended. You cannot return / replace your product now.</span>
            @endif
        </div>
        @endforeach
        <p><br></p>
    </div>
    </div> 
</section>

@endsection
