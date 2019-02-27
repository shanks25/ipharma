@extends('frontendlayout.app')
@section('content')
@include('frontendlayout.cart')



<div role="main" class="main">


<!--    <section class="page-header mb-lg">

        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Edit User Info</a></li>
            </ul>
        </div>
    </section>-->

    <div class="container" style="padding-top: 30px;">
    	<div class="row">
    		<div class="col-md-9 col-md-push-3 my-account">
    			<h1 class="h2 heading-primary font-weight-normal">{{ $userInfo->first_name }} {{$userInfo->last_name}} - Edit Account</h1>
    			@if(Session::has('message'))
    			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    			@endif
    			<h2 class="h3 mb-sm"><strong>Edit Account Information</strong></h2>

    			<div class="row">
    				<div class="col-sm-12">
    					<form class="col-md-6" action="{{ url('update-user') }}" method="post" id="form-validate">
    						<div class="panel-box-content">
    							{{ csrf_field() }}
    							<h2 class="legend">Account Information</h2>
    							<div class="form-group">
    								<label for="name">First Name<em class="text-danger">*</em></label>
    								<input type="text" id="name" name="first_name" value="{{ $userInfo->first_name }}" placeholder="Full Name" class="form-control" required/>
    							</div>

    							<div class="form-group">
    								<label for="name">Last Name<em class="text-danger">*</em></label>
    								<input type="text" id="name" name="last_name" value="{{ $userInfo->last_name}}" placeholder="Full Name" class="form-control" required/>
    							</div>
    							<div class="form-group">
    								<label for="email">Email Address<em class="text-danger">*</em></label>
    								<input type="email" id="email" name="email" value="{{ $userInfo->email }}" placeholder="Email Address" class="form-control" required/>
    							</div>
    							<div class="form-group">
    								<label for="mobile">Mobile<em class="text-danger">*</em></label>
    								<input type="text" id="mobile" name="mobile" value="{{ $userInfo->mobile }}" placeholder="Mobile" class="form-control" required/>
    							</div>

    							<div class="form-group">
    								<label for="mobile">address<em class="text-danger">*</em></label>
    								<input type="text" id="mobile" name="address" value="{{ $userInfo->address }}" placeholder="Mobile" class="form-control" required/>
    							</div>

    							<div class="checkbox-inline">
    								<input type="checkbox" name="change_password" id="change_password" value="1" onclick="setPasswordForm(this.checked)" title="Change Password" class="checkbox" /><label for="change_password">Change Password</label>
    							</div>
    						</div>
    						<div class="panel-box-content password_form" style="display:none;">
    							<h2 class="legend">Change Password</h2>
    							<div class="form-group">
    								<label for="current_password">Current Password<em class="text-danger">*</em></label>
    								<input type="password" id="current_password" name="current_password" placeholder="Current Password" class="form-control"/>
    							</div>
    							<div class="form-group">
    								<label for="password">New Password<em class="text-danger">*</em></label>
    								<input type="password" id="password" name="password" placeholder="New Password" class="form-control"/>
    							</div>
    						</div>
    						<div class="buttons-set">
    							<p class="required text-danger">* Required Fields</p>
    							<button type="submit" title="Save" class="btn btn-success btn-lg"><span><span>Save</span></span></button>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    			@include('frontendlayout.user_sidebar')
    	</div>
    
    </div>

</div>

@endsection