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


				<form role="form" method="POST" action="{{ URL::to('register') }}">
					{{ csrf_field() }}
					@include('frontendlayout.error')
					<div class="col-lg-4 col-lg-offset-2">
						<h4>Register</h4>
						<p class="before-login-text">Create your very own account</p>
						<div class="form-group">
							<label for="emmail_login">First Name<span class="required">*</span></label>
							<input id="emmail_login" name="first_name" type="test" placeholder="First Name" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="emmail_login">Last Name<span class="required">*</span></label><br>
							<input id="emmail_login" name="last_name" type="test" placeholder="Last Name" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="emmail_login">Mobile<span class="required">*</span></label>
							<input id="emmail_login" name="mobile" type="number" placeholder="Mobile No" class="form-control" required>	
						</div>
						<div class="form-group">
							<label for="emmail_login">Email<span class="required">*</span></label>
							<input id="emmail_login" name="email" type="email" placeholder="Email Id" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="emmail_login">Address<span class="required">*</span></label>
							<input id="emmail_login" name="address" type="tex" placeholder="your Address" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password_login">Password<span class="required">*</span></label>
							<input id="password_login" name="password" type="password" class="form-control" required>
						</div>
							<p class="forgot-pass"><a href="#">Lost your password?</a></p>
							<button class="button" type="submit"><i class="fa fa-lock"></i>&nbsp; <span>Register</span></button><label class="inline" for="rememberme">
								<input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me
							</label>
						</div>
					</form>
					<div class="col-lg-4 col-lg-offset-2 ">
						<h4>Already Have Account ?</h4> 										
						<br> 
						<a href="{{ url('user-login') }}"><button class="button"><i class="fa fa-user"></i>&nbsp; <span>login here</span></button></a>	
						<br> 

					</div>


				</div>
			</div>

		</div>
	</section>

	@endsection