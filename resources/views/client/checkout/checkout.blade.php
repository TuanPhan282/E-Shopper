
@extends('client.layouts.app')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<!-- <div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div>/checkout-options -->

			<!-- <div class="register-req"> -->
				<!-- <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p> -->
			<!-- </div>/register-req -->

			@if(!Auth::Check())

				<span>You need login before checkout</span>
				<a href="{{ url('login-user')}}"  class="btn btn-success">Login</a>
				<span>Or</span>
				<a href="{{ url('register-user')}}" class="btn btn-success">Register</a>

			@else
				<a class="btn btn-primary" href="{{ url('test')}}">Continue</a>
			@endif
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if($cart)
							@foreach($cart as $val)
		
								<tr class="trOfProduct">
								<td class="cart_product">
									<a href=""><img src="{{ asset('upload/product/'.$val['userId'].'/hinh85x84_'.$val['images'][0])}}" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{$val['name']}}</a></h4>
									<p>Web ID: {{$val['id']}}</p>
								</td>
								<td class="cart_price">
									<p>${{$val['price']}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href=""> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$val['qty']}}" autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">$</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@endforeach
							<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$59</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td class="total_price_all_product"><span>$</span></td>
									</tr>
								</table>
							</td>
						</tr>
						@else
							<tr>
								<td>Chưa có sản phẩm</td>	
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
</section> <!--/#cart_items-->

<script src="{{ asset('client/js/jquery-1.9.1.min.js') }}"></script>
	<script>
		$(document).ready(function(){
			$.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			function totalPriceOfProduct(price, qty){
				var total = price * qty;
				console.log("giá: "+total);
				
				return total;
			}

			function totalPriceAllProduct(price){
				var total = 0;
				price.forEach(function(item){
					total += item;
				})
				console.log("giá: "+total);
				
				return total;
			}

			var totalPrice = 0;
			$('.trOfProduct').each(function(){
				var price = parseFloat($(this).find('.cart_price p').text().replace('$', ''));
				var qty = parseInt($(this).find('.cart_quantity_input').val());
				var total = totalPriceOfProduct(price, qty);
				
				
				$(this).find('.cart_total_price').text('$'+ total);
				
				var priceToPay = parseFloat($(this).find('.cart_total_price').text().replace('$', ''));
				console.log(priceToPay+ " - " + totalPrice);
				totalPrice += priceToPay;
			})
			$('.total_price_all_product span').text("$"+ totalPrice)

			// tăng số lượng sản phẩm
			$('.cart_quantity_up').click(function(e){
				e.preventDefault();

				var qty = parseInt($(this).closest('tr').find('.cart_quantity_input').val()) + 1;
				$(this).closest('tr').find('.cart_quantity_input').val(qty);
				var new_qty = $(this).closest('tr').find('.cart_quantity_input').val();

				var price = parseInt($(this).closest('tr').find('.cart_price p').text().replace('$', ''));
				var total = totalPriceOfProduct(price, qty);
				console.log(price+ " - " + qty);
				$(this).closest('tr').find('.cart_total_price').text('$'+ total);

				totalPrice = 0;
				$('.trOfProduct').each(function(){
					var priceToPay = parseFloat($(this).find('.cart_total_price').text().replace('$', ''));
					totalPrice += priceToPay;
				})
				$('.total_price_all_product span').text("$"+ totalPrice)

				var id_product = $(this).closest('tr').find('.cart_description p').text().replace('Web ID: ', '');
				$.ajax({
					type: 'POST',
					url: '{{ url("cart/update-product-qty/ajax")}}',
					data: {
						id: id_product,
						qty: new_qty,
					},
					success: function(data) {
							console.log(data); // Hiển thị kết quả trả về từ server
						}
				})
			})


			// giảm số lượng sản phẩm
			$('.cart_quantity_down').click(function(e){
				e.preventDefault();

				var qty = parseInt($(this).closest('tr').find('.cart_quantity_input').val()) - 1;
				$(this).closest('tr').find('.cart_quantity_input').val(qty);
				var new_qty = $(this).closest('tr').find('.cart_quantity_input').val();

				var price = parseInt($(this).closest('tr').find('.cart_price p').text().replace('$', ''));
				var total = totalPriceOfProduct(price, qty);
				console.log(price+ " - " + qty);
				$(this).closest('tr').find('.cart_total_price').text('$'+ total);

				totalPrice = 0;
				$('.trOfProduct').each(function(){
					var priceToPay = parseFloat($(this).find('.cart_total_price').text().replace('$', ''));
					totalPrice += priceToPay;
				})
				$('.total_price_all_product span').text("$"+ totalPrice)

				var id_product = $(this).closest('tr').find('.cart_description p').text().replace('Web ID: ', '');				
				$.ajax({
					type: 'POST',
					url: '{{ url("cart/update-product-qty/ajax")}}',
					data: {
						id: id_product,
						qty: new_qty,
					},
					success: function(data) {
							console.log(data); // Hiển thị kết quả trả về từ server
						}
				})
			})


			// Xóa sản phẩm
			$('.cart_quantity_delete').click(function(e){
				e.preventDefault();

				$(this).closest('tr').hide();

				var id_product = $(this).closest('tr').find('.cart_description p').text().replace('Web ID: ', '');	
				$.ajax({
					type: 'POST',
					url: '{{ url("cart/cart-qty-delete/ajax")}}',
					data: {
						id: id_product
					},
					success: function(data) {
							console.log(data); // Hiển thị kết quả trả về từ server
						}
				})
			})
		})
	</script>
@endsection