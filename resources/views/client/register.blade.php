@extends('client.layouts.app')
@section('content')

<section id="form" style="margin-top: 0px"><!--form-->
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						
                                <form method='post' class="form-horizontal form-material" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Avatar</label>
                                        <div class="col-md-12">
                                            <input type="file" name='avatar' class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name='name' placeholder="Johnathan Doe" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name='email' placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
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
                                            <input type="text" name='phone' placeholder="123 456 7890" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" name='address' placeholder="Paris" class="form-control form-control-line">
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
                                            <button type='submit' class="btn btn-success">Register</button>
                                        </div>
                                    </div>
                                </form>
					</div><!--/sign up form-->
	</section><!--/form-->

@endsection()