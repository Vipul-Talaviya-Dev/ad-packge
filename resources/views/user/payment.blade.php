@extends('user.layouts.main')

@section('title', 'Payment')

@section('css')
<link rel="stylesheet" type="text/css" href="http://fashion.altsolution.in/front/css/payment.css">
<style type="text/css">
#cartLoad, #myModal {
   top: 0; 
}
</style>
@endsection

@section('content')
<section class="section-padding offer-section">
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
                                        $total += ($product->price * $data['qty']);
                                        $finalAmount = $total;
                                    ?>
                                        <div class="row">
                                            <div class="col-xs-3 col-md-2">
                                                <a href="javascript:void(0);">
                                                    <img src="{{ \Cloudder::secureShow($product->image) }}" alt="{{ $product->name }}" class="cart-img-thumb">
                                                </a>
                                            </div>
                                            <div class="col-xs-4 col-md-5 order-pay">
                                                <h5 style="line-height: 19px;">{{ $product->name }}</h5>
                                            </div>
                                            <div class="col-xs-3 col-md-2 font-size-13">{{ $data['qty'] }} x Qty</div>
                                            <div class="col-xs-2 col-md-3 font-size-13">Rs. {{ ($product->price * $data['qty']) }}</div>
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
                                        <!-- Credit Card -->
                                        <div class="radio radio-danger">
                                            <label><input type="radio" class="payment_option" name="payment_option" value="101"><span class="circle"></span><span class="check"></span> Credit Card</label>
                                            <!-- <ul class="payment_card_img">
                                                <li><img src="/front/images/discover-curved-32px.png"></li><li><img src="/front/images/american-express-curved-32px.png"></li><li><img src="/front/images/mastercard-curved-32px.png"></li><li><img src="/front/images/visa-curved-32px.png"></li>
                                            </ul> -->
                                        </div>
                                        <br>
                                        <span>Note: Payments will be processed through a merchant account residing in <b>India</b></span>
                                        <hr>
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
                                        </div><hr>
                                        <div class="radio radio-danger">
                                            <label><input type="radio" class="payment_option" name="payment_option" value="1"><span class="circle"></span><span class="check"></span> Cash On Delivery</label>
                                            <button class="btn btn-danger btn-xs pull-right cod_place_btn" type="submit" name="PLACE_ORDER" >Place Order</button>
                                        </div><hr>
                                        <div class="radio radio-danger">
                                            <label><input type="radio" class="payment_option" name="payment_option" value="104"><span class="circle"></span><span class="check"></span> EMI Option</label>
                                        </div><hr>
                                        <div class="radio radio-danger">
                                            <label><input type="radio" class="payment_option" name="payment_option" value="107"><span class="circle"></span><span class="check"></span> UPI</label>
                                        </div>
                                        <!-- <hr> -->
                                        <!-- <div class="radio radio-danger">
                                            <label><input type="radio" class="payment_option" name="payment_option" value="1" checked><span class="circle"></span><span class="check"></span> Order Place</label>
                                        </div> -->
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
