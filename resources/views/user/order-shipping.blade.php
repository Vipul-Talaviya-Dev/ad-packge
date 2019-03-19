@extends('user.layouts.main')

@section('title', 'Order Shipping')

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
        <div class="row">
            <form action="{{ route('user.shippingDetail') }}" method="post" id="form">
        {{ csrf_field() }}
        <div class="col-md-8 col-sm-6 col-xs-12 order-boxos">
            <div class="">
                <div class="panel-heading">Your Address Details</div>
                <div class="panel-body">
                    @if($addresses)
                        @foreach($addresses as $address)
                            <div class="col-md-6 col-xs-12 padding-left-0">
                                <div class="notification-area">
                                    <div class="info-box">
                                        <p>
                                            <b class="black-text">{{ $address->name }}</b><br><br>
                                            {{ $address->address }}<br>
                                            {{ $address->address_1 }}<br>
                                            {{ $address->city }} - {{ $address->pincode }},<br>{{ $address->state }}, {{ $address->country }}<br>
                                            Phone: <span class="black-text">{{ $address->mobile }}</span><br>
                                        </p>
                                    </div>
                                    <div class="add-box-footer">
                                        <label>
                                            <input type="radio" name="addressOption" id="selectAddress" value="{{ $address->id }}">
                                            Select <b class="black-text">Your</b> Address
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div> -->
                </div>
                <p><br></p>
                <button style="margin-left: 47px;" type="button" class="btn btn-success addAdddress"><i class="fa fa-plus"></i> Add New Address<div class="ripple-wrapper"></div></button>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 pck-box-shadow">
            <div class="">
                <h5 class="order-boxos-header">Order Summary</h5><hr>
                <div class="order-boxos-items">
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
                    <div class="order-boxos-item">
                        <div class="order-boxos-item-image">
                            <img src="{{ \Cloudder::secureShow($product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="order-boxos-item-detail">
                            <h5 style="line-height: 19px;">{{ $product->name }} <br></h5>
                            <div class="pull-left">Quantity : {{ $data['qty'] }}</div>
                            <div class="pull-right">Rs. {{ ($product->price * $data['qty']) }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="order-boxos-total">
                    <table>
                        <tbody>
                            <tr>
                                <td class="text-left">Subtotal Amount</td>
                                <td class="text-right">Rs. {{ $total }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Delivery Charge [+]</td>
                                <td class="text-right green">Rs. 0</td>
                            </tr>
                            <tr style="border-top: 1px solid;">
                                <td class="text-left">Total Amount</td>
                                <td class="text-right"><strong>Rs. {{ $finalAmount }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group spacet-20">
                    <input type="submit" class="btn btn-block btn-danger" name="Payment" value="Go To Payment ">
                </div>
            </div>
        </div>
    </form>
        </div>
    </div> 
</section>

<!-- Address -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Add Address
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" name="name" class="form-control name" autocomplete="off" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile :</label>
                            <input type="text" name="mobile" class="form-control mobile" onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" value="{{ old('mobile') }}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Address :</label>
                            <input type="text" name="address" class="form-control address" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>Address 1:</label>
                            <input type="text" name="address1" class="form-control address1" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label>pinCode :</label>
                            <input type="text" name="pincode" onkeydown="return max_length(this,event,6)" onkeypress="return isNumberKey(event)" class="form-control pincode" autocomplete="off" value="{{ old('pincode') }}" required>
                        </div>
                        <div class="form-group">
                            <label>City :</label>
                            <input type="text" name="city" class="form-control city" autocomplete="off" value="{{ old('city') }}" required>
                        </div>
                        <div class="form-group">
                            <label>State :</label>
                            <input type="text" name="state" class="form-control state" autocomplete="off" value="{{ old('state') }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default createAddress">Submit</button>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#form").validate({
        rules: {
         addressOption: 'required',
        }
      });

        $('body').on('click', '.addAdddress', function() {
            $('#myModal').modal();
        });
    });
</script>
@endsection