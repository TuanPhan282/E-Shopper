<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link href="{{ asset('client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('client/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('client/css/responsive.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('client/css/rate.css') }}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('client/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('client/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('client/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('client/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('client/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>
<body>
 
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
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$val['qty']}}" autocomplete="off" size="2">
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">${{$val['qty']*$val['price']}}</p>
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
										<td><span>${{$total}}</span></td>
									</tr>
								</table>
							</td>
						</tr>
						@endif
					</tbody>
				</table>
</body>
<script src="{{asset('client/js/jquery.js')}}"></script>
	<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('client/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('client/js/price-range.js')}}"></script>
    <script src="{{asset('client/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
</html>