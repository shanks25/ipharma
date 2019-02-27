@extends('frontendlayout.app')
@section('content')

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul>
					<li class="home"> <a title="Go to Home Page" href="{{ url('/') }}">Home</a><span>&raquo;</span></li>
					<li><strong>My Account</strong></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<section class="main-container col1-layout">
	<div class="main container">


		<div class="page-content">

			<div class="account-login">


				<form role="form" method="POST" action="{{ URL::to('post-login') }}">
					{{ csrf_field() }}
					@include('frontendlayout.error')
					<div class="box-authentication">
						<h4>Login</h4>
						<p class="before-login-text">Welcome back! Sign in to your account</p>
						<label for="emmail_login">Mobile<span class="required">*</span></label>
						<input id="emmail_login" name="mobile" type="number" placeholder="0191XXXXXXX" class="form-control">
						<label for="password_login">Password<span class="required">*</span></label>
						<input id="password_login" name="password" type="password" class="form-control">
						<p class="forgot-pass"><a href="#">Lost your password?</a></p>
						<button class="button"><i class="fa fa-lock"></i>&nbsp; <span>Login</span></button><label class="inline" for="rememberme">
							<input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me
						</label>
					</div>
				</form>
					<div class="box-authentication">
						<h4>Register</h4><p>Create your very own account</p> 											

						<a href="{{ url('registration') }}"><button class="button"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button></a>	
						<br> 
						<div class="register-benefits">
							<h5>Sign up today and you will be able to :</h5>
							<ul>
								<li>Speed your way through checkout</li>
								<li>Track your orders easily</li>
								<li>Keep a record of all your purchases</li>
							</ul>
						</div>
					</div>


				</div>
			</div>

		</div>
	</section>

	@endsection