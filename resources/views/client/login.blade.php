@extends('client.layouts.app')
@section('content')

<section id="form" style="margin-top: 0px"><!--form-->
					<div class="login-form"><!--login form-->
                        <form method="post">
                            @csrf
                            <h2>Login to your account</h2>
                            <form action="#">
                                <input type="text" name="email" placeholder="Email" />
                                <input type="password" name="password" placeholder="Password" />
                                <span>
                                    <input type="checkbox" name="remember_me" class="checkbox"> 
                                    Keep me signed in
                                </span>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </form>
					</div><!--/login form-->
	</section><!--/form-->

@endsection()