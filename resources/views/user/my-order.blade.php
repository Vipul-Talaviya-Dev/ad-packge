@extends('user.layouts.main')

@section('title', 'My Account')

@section('css')
<style type="text/css">
    #cartLoad, #myModal {
     top: 0; 
    }
    .shopping-order-box {
        background: #fff;
        padding: 11px 25px;
        box-shadow: 0 1px 3px 1px rgba(0,0,0,.2);
        border-left: 5px solid transparent;
        margin: 5px 0;
    }
</style>
@endsection
@section('content')
<section class="">
    <p><br></p>
    <div class="container">
        <h3 class="text-center">My Orders</h3><br>
        <div class="row">
            @if(count($orders) == 0)
            <div class="shopping-order-box text-center" >
                <h3>Hey, There are no any Order history available 
                    <a href="{{ route('user.index') }}"><b class="red">Order Now!</b></a>
                </h3> 
            </div>
            @endif
            <div class="col-md-12 col-sm-12">
                @foreach($orders as $order)
                <?php
                    $product = $order->product;
                ?>
                <div class="shopping-order-box col-md-6">
                    <div class="" align="center">
                        @if($order->order->order_status == 1 || $order->order->order_status == 2)
                            <h4><label class="label label-default pull-right">{{ \App\Helper\Helper::orderStatus($order->order->order_status) }}</label></h4>
                        @elseif($order->order->order_status == 3 || $order->order->order_status == 6)
                            <h4><label class="label label-success pull-right">{{ \App\Helper\Helper::orderStatus($order->order->order_status) }}</label></h4>
                        @elseif($order->order->order_status == 4 || $order->order->order_status == 5 || $order->order->order_status == 7)
                            <h4><label class="label label-info pull-right">{{ \App\Helper\Helper::orderStatus($order->order->order_status) }}</label></h4>
                        @elseif($order->order->order_status == 8)
                            <h4><label class="label label-danger pull-right">{{ \App\Helper\Helper::orderStatus($order->order->order_status) }}</label></h4>
                        @endif
                        <span class="timetitle btimes"><a href="javascript:void(0);"><img class="img-responsive" src="{{ \Cloudder::secureShow($product->image) }}" alt="{{ $product->name }}" style="width: 50%;"></a></span>
                        <p>{{ $product->name }}</p><hr>
                        <div class="text-center">
                            <div class="price">
                                <span class="current">Paid Amount: <i class="fa fa-rupee"></i> {{ $order->order->cart_amount }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12 col-sm-12"><p><br></p></div>
        </div>
    </div> 
</section>

@endsection
