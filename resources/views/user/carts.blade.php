<div id="cartLoad" class="modal fade in top-65" role="dialog" style="z-index: 99999;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom: 1px solid #e5e5e5;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="padding-left: 0;">Shopping Cart</h4>
			</div>
			@if(\Session::get('cart') != null)
			<div class="modal-body" style="padding: 0px;">
				<div style="margin: 10px 30px 0px 30px;">
					<div class="row">
						<table class="timetable_sub table-reponsive" >
							<thead>
								<tr>
									<th>SL No.</th>	
									<th colspan="2">Item Detail</th>
									<th>Quality</th>
									<th>Price</th>
									<th>Remove</th>
								</tr>
							</thead>
							<?php
							$total = 0;
							$finalAmount = 0;
							?>
							@foreach(\Session::get('cart') as $cartId => $cart)
							<?php
								$cartId++;
								$product = \App\Models\Product::find($cart['cart_product_id']);
								$subPrice = json_decode($product->prices_box);
								$price = 0;
								if($cart['cart_product_qty'] == 100) {
									$total += $subPrice->first_100 * $cart['cart_product_qty'];
									$price = $subPrice->first_100;
								}

								if($cart['cart_product_qty'] == 250) {
									$total += $subPrice->second_250 * $cart['cart_product_qty'];
									$price = $subPrice->second_250;
								}

								if($cart['cart_product_qty'] == 500) {
									$total += $subPrice->third_500 * $cart['cart_product_qty'];
									$price = $subPrice->third_500;
								}

								if($cart['cart_product_qty'] >= 1000) {
									$total += $subPrice->four_1001 * $cart['cart_product_qty'];
									$price = $subPrice->four_1001;
								}


								$finalAmount = $total;
							?>
							<tr class="rem{{ $cartId }}">
								<td class="invert">{{ $cartId }}</td>
								<td class="invert-image" style="width: 9%;"><img src="{{ \Cloudder::secureShow($product->image) }}" class="img-responsive cart-thumb-img" alt="{{ $product->name }}"></td>
								<td class="invert">
									<p>{{ $product->name }}</p><br>
								</td>
								<td class="invert">
									<div class="quantity"> 
										<div class="quantity-select">                           
											<!-- <div class="entry value-minus btn-number" data-type="minus" data-field="{{ $product->id }}">&nbsp;</div> -->
											<span><input type="text" style="text-align: center;" name="{{ $product->id }}" readonly data-field="{{ $product->id }}" class="value input-number update-qty" value="{{ $cart['cart_product_qty'] }}" min="1" max="{{ $product->qty }}" size="2"></span>
											<!-- <div class="entry value-plus btn-number" data-type="plus" data-field="{{ $product->id }}">&nbsp;
											</div> -->
										</div>
									</div>
									<span class="max-qty-reach-{{ $product->id }}"></span>
								</td>
								<td class="cart-td-border" style="display:none;">
									<input type="hidden" class="p_id" value="{{ $product->id }}">
									<span id="product_subtotal1{{ $product->id }}" >{{ $price }}</span>
								</td>
								<td class="invert">Rs. <span class="cart-subtotal sellingprice" id="product_subtotal{{ $product->id }}">{{ $price }}</span></td>
								<td class="invert">
									<span><button type="button" class="fa fa-times removeItem" data-id="{{ $cart['cart_id'] }}"></button></span>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="clearfix"></div>
					<p><br></p>
					<div class="row pull-right">	
						<div class="cart-totals">
							<table id="shopping-cart-totals-table">
								<tbody>
									<tr>
										<td colspan="4">Subtotal</td>
										<td> Rs.<span class="price" id="total">{{ $total }}</span></td>
									</tr>
									<!-- <tr>
										<td colspan="4">Delivery Charge</td>
										<td> Rs.<span >0</span></td>
									</tr> -->
								</tbody>
								<tfoot>
									<tr>
										<td colspan="4"><strong>Grand Total</strong></td>
										<td><strong> Rs. <span id="finalPrice">{{ $finalAmount }}</span></strong></td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="/" class="btn theme-btn pull-left"><i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Continue Shopping</a>

				<a href="javascript:void(0);" class="btn theme-btn pull-right" id="orderContinue"> Checkout <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
			</div>
			@else
			<div class="modal-body modal-body-sub" align="center">
				<div><img src="/front/images/cart-3.png" style="width: 50%;" class="img-responsive"></div>
			</div>
			<div class="modal-footer">
				<a href="/" class="btn theme-btn pull-right"> GO FOR SHOPPING</a>
			</div>
			@endif
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function () {
	$("body").on("click", "#orderContinue", function(){
        var product_id   = $('.p_id').map(function(){ return this.value;}).get();
        var product_qty  = $('.update-qty').map(function(){ return this.value;}).get();
        var total        = document.getElementById('total').innerHTML;
        var finalamount  = document.getElementById('finalPrice').innerHTML;
        if(product_id == "" || product_qty == "" || total == "" || finalamount == "") {
            window.location.href = "/";
        }

        show_loader();
        $.ajax({ 
            type: "POST",
            cache: false,
            url: '{{ route("user.cartOrderDetail") }}',
            data: {finalamount:finalamount,product_qty:product_qty,total:total,product_id:product_id, '_token': '{{ csrf_token() }}'},
            success: function(result) {
                if (result.status) {
                    window.location.href = "{{route('user.orderShipping')}}";
                } else {
                    toastr.warning(result.error);
                }
                hide_loader();
            }
        });
    });
});
</script>