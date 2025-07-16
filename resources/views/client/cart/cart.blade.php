
@extends('client.layouts.app')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
						@else
							<tr>
								<td>Chưa có sản phẩm</td>	
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li class="total_price_all_product">Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

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
					url: '{{ url("product-detail/add-to-cart/ajax")}}',
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
					url: '{{ url("product-detail/add-to-cart/ajax")}}',
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