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
						<h2 class="title text-center">Update user</h2>
						 <div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method='post' class="form-horizontal form-material" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
										<label class="col-md-12">Avatar</label>
                                        <div class="col-md-12" style="display: flex; align-items: center; gap: 20px">
											<img style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover" class="media-object" src="{{ asset('upload/avatar/'.$user->avatar)}}" alt="">
                                            <input type="file" name='avatar' class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name='name' value="{{$user->name}}" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name='email'  value="{{$user->email}}" class="form-control form-control-line" name="example-email" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name='password' class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name='phone'  value="{{$user->phone}}" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" name='address'  value="{{$user->address}}" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <input type="hidden" name="level" value="0">
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select name="id_country" class="form-control form-control-line">
                                                @foreach($countries as $val)
                                                <option value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
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

@endsection