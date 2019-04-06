@extends('user.layouts.main')

@section('title', 'Payment')

@section('css')
<link rel="stylesheet" type="text/css" href="/front/css/payment.css">
<style type="text/css">
#cartLoad, #myModal {
   top: 0; 
}
</style>
@endsection

@section('content')
<section class="">
    <p><br></p>
    <div class="container">
        <div class="row">
            <form action="{{ route('user.order-place') }}" method="post">
            {{ csrf_field() }}
            <div data-alerts="alerts"></div>
            <section id="content" class="gray-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="pck-box pck-box-shadow">
                                <h2 style="font-size: 1.6667em;">Order Summary</h2>
                                <div align="left">
                                    <?php
                                        $total = 0;
                                        $finalAmount = 0;
                                    ?>
                                    @foreach(\Session::get('order')['product'] as $key => $data)
                                    <?php
                                        $key++;
                                        $product = \App\Models\Product::find($data['product_id']);
                                        // $total += ($product->price * $data['qty']);
                                        $subPrice = json_decode($product->prices_box);
                                        $price = 0;
                                        if($data['qty'] == 100) {
                                            $total += $subPrice->first_100 * $data['qty'];
                                            $price = $subPrice->first_100;
                                        }

                                        if($data['qty'] == 250) {
                                            $total += $subPrice->second_250 * $data['qty'];
                                            $price = $subPrice->second_250;
                                        }

                                        if($data['qty'] == 500) {
                                            $total += $subPrice->third_500 * $data['qty'];
                                            $price = $subPrice->third_500;
                                        }

                                        if($data['qty'] >= 1000) {
                                            $total += $subPrice->four_1001 * $data['qty'];
                                            $price = $subPrice->four_1001;
                                        }
                                        $finalAmount = $total;
                                    ?>
                                        <div class="row">
                                            <div class="col-xs-3 col-md-2">
                                                <a href="javascript:void(0);">
                                                    <img src="{{ \Cloudder::secureShow($product->image) }}" alt="{{ $product->name }}" class="cart-img-thumb">
                                                </a>
                                            </div>
                                            <div class="col-xs-2 col-md-3 order-pay">
                                                <h5 style="line-height: 19px;">{{ substr($product->name, 0, 30).'...' }}</h5>
                                            </div>
                                            <div class="col-xs-2 col-md-2 font-size-13"><i class="fa fa-rupee"></i> {{ $price }} / per box</div>
                                            <div class="col-xs-3 col-md-2 font-size-13">{{ $data['qty'] }} x Qty</div>
                                            <div class="col-xs-2 col-md-3 font-size-13">Rs. {{ ($price * $data['qty']) }}</div>
                                        </div>
                                        <hr>
                                    @endforeach
                                        <div class="row order-cart-summary" style="line-height: 2">
                                            <div class="col-md-6">Sub Total</div>
                                            <div class="col-md-6 order-cart-amount">Rs. {{ $total }}</div>
                                            @if(Session::get('discount') > 0)
                                            <div class="col-md-6">Member Ship Discount</div>
                                            <div class="col-md-6 order-cart-amount"> [-] Rs. {{ Session::get('discount') }}</div>
                                            @endif
                                            <div class="col-md-6">Delivery Charges</div>
                                            <div class="col-md-6 order-cart-amount"> [+] Rs. {{ $deliverCharge }}</div>
                                            <div class="col-md-6 total">Total Amount</div>
                                            <div class="col-md-6 order-cart-amount total">Rs. {{ ($finalAmount - Session::get('discount')) + $deliverCharge }}</div>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default pck-box-shadow">
                                <div class="panel-heading"><h4 class="panel-title">Shipping Address Details</h4></div>
                                <div class="panel-body">
                                    <div class="notification-area">
                                        <div class="info-box">
                                            <p><b>{{ $address->name }}</b><br><br>
                                                {{ $address->address }}<br>
                                                {{ $address->address_1 }}<br>
                                                {{ $address->city }} - {{ $address->pincode }}, {{ $address->state }}<br>Phone: {{ $address->mobile }}<br>
                                            </p>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!-- Payment Options-->
                        <div class="col-md-5">
                            <!--online Payment-->
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title white-text"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-2">Other Online Payment Options</a></h4>
                                </div>
                                <div class="panel-collapse collapse in" id="collapse-2">
                                    <div class="panel-body">
                                        <!-- Debit Card -->
                                        <div class="radio radio-danger">
                                            <label><input type="radio" class="payment_option" name="payment_option" value="2"><span class="circle"></span><span class="check"></span> Debit Card</label>
                                            <!-- <ul class="payment_card_img">
                                                <li><img src="/front/images/rupay-curved-32px.png"></li><li><img src="/front/images/maestro-curved-32px.png"></li><li><img src="/front/images/mastercard-curved-32px.png"></li><li><img src="/front/images/visa-curved-32px.png"></li>
                                            </ul> -->
                                        </div>
                                        <hr>
                                        <div class="radio radio-danger">
                                            <label><input type="radio" class="payment_option" name="payment_option" value="3"><span class="circle"></span><span class="check"></span> Net Banking</label>
                                            <a class="pull-right label label-success" data-style="toast" data-content="This is a toast! Lorem lipsum dolor sit amet..." data-toggle="snackbar" data-timeout="0">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="PLACE_ORDER" class="btn btn-placeholder btn-raised pull-right">Proceed to Pay <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        </div>
    </div> 
</section>

@endsection
