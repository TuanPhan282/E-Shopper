@extends('client.layouts.app')
@section('content')

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Account</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">account</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{ url('/account/my-product')}}">My product</a></h4>
								</div>
							</div>
							
						</div><!--/category-products-->
					
						
					</div>
				</div>
				<div class="col-sm-9">
					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td class="image">image</td>
									<td class="description">name</td>
									<td class="price">price</td>
									
									<td class="total">action</td>
									
								</tr>
							</thead>
							<tbody>

								@foreach($data as $val)
									<tr>
										<td class="cart_product">
											<a href=""><img src="{{ asset('/upload/product/'. $val->userId.'/hinh85x84_'.$val->first_image)}}" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><a href="">{{$val->name}}</a></h4>

										</td>
										<td class="cart_price">
											<p>${{$val->price}}</p>
										</td>

										<td class="cart_total">
											<a href="{{ url('/account/edit-product/' . $val->id)}}">edit</a>
											<a style="color: red" class="delete-product" href="{{ url('/account/delete-product/' . $val->id)}}">delete</a>
										</td>
									
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="margin-top: 50px" class="d-flex justify-content-center ">
							{{ $data->links() }}
						</div>
                        <a class="btn btn-primary level-n" href="{{ url('/account/add-product') }}">Add New</a>
					</div>
				</div>

			</div>
		</div>
</section>

<script src="{{ asset('client/js/jquery-1.9.1.min.js') }}"></script>
<script>
	$(document).ready(function(){
		$('.delete-product').click(function(){
			return confirm("Bạn có muốn xóa sản phẩm này không!");
		})
	})
</script>

@endsection