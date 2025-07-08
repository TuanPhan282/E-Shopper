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
					<div class="blog-post-area">
						<h2 class="title text-center">Edit Product</h2>
						 <div class="signup-form"><!--sign up form-->
						<h2>New product!</h2>
						<form method='post' class="form-horizontal form-material" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name='name' value="{{$product->name}}" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Price</label>
                                        <div class="col-md-12">
                                            <input type="text" name='price' value="{{$product->price}}" class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Select Category</label>
                                        <div class="col-sm-12">
                                            <select name="id_category" class="form-control form-control-line">

                                                @foreach($categories as $val)
                                                <option value="{{$val->id}}" {{$categoryOfProduct->id == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Select Brand</label>
                                        <div class="col-sm-12">
                                            <select name="id_brand" class="form-control form-control-line">
                                            
                                                @foreach($brands as $val)
                                                <option value="{{$val->id}}" {{$brandOfProduct->id == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Sale</label>
                                        <div class="col-sm-5">
                                            <select name="status" class="form-control form-control-line sale-status">
                                                <option value="0" {{$product->status == 0 ? 'selected' : ''}}>None</option>
                                                <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Sale</option>
                                            </select>
                                        </div>

                                        <div style="display: flex; align-items: center; gap:5px" class="col-md-5">
                                            <input type="number" name='sale' value="{{$product->sale}}" class="form-control form-control-line sale">
                                            <p>%</p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Company profile</label>
                                        <div class="col-md-12">
                                            <input type="text" name='company' value="{{$product->company}}" class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Images</label>
                                        <div class="col-md-12">
                                            <input type="file" name='images[]' multiple class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div style="display: flex; gap: 20px; align-items: center">
                                        @foreach($product->images as $val)
                                        <div>
                                            <img src="{{asset('/upload/product/hinh85x84_'.$val)}}" alt="">
                                            <input type="checkbox" name="removeImages[]" value="{{$val}}">
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Description</label>
                                        <div class="col-md-12">
                                            <textarea name='description' rows="2" class="form-control form-control-line">{{$product->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Detail</label>
                                        <div class="col-md-12">
                                            <textarea name='detail' rows="4" class="form-control form-control-line">{{$product->detail}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type='submit' class="btn btn-success">Sign up</button>
                                        </div>
                                    </div>
                            </form>
					    </div>
					</div>
				</div>

			</div>
		</div>
</section>

<script src="{{ asset('client/js/jquery-1.9.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        function saleStatusChange(){
            if($('.sale-status').val() == 0){
                $('.form-group').find('.sale').val('0');
                $('.form-group').find('.sale').attr('readonly', true);
            }else{
                $('.form-group').find('.sale').removeAttr('readonly');
            }
        }

        saleStatusChange();
        $('.sale-status').on('change', function(){
            saleStatusChange();
        })
        
    })
</script>

@endsection