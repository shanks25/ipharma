@extends('frontendlayout.app')
@section('content')
@include('frontendlayout.cart')

<div class="container" style="padding-top: 30px;">
	<div class="row">
		<div class="col-md-9 col-md-push-3 my-account">
			<h1 class="h2 heading-primary font-weight-normal">User Delivery Address</h1>

			<h2 class="h3 mb-sm"><strong> </strong></h2>
			<div class="row">
				@foreach ($addresss as $address) 
				<div class="col-sm-6">
					<div class="panel-box">
						<div class="panel-box-title">
							<h3>  {{$address->heading}}</h3> 

							<a href="{{ route('editaddress',$address->id) }}" class="panel-box-edit pull-right">Edit</a>
						</div>

						<div class="panel-box-content">
							<p>Name - {{ $address->name}}<br>
								Email - {{ $address->email }}<br>
								Mobile - {{ $address->mobile }}   <br>
								Address - {{ $address->address }}
							</p>
							@if ($address->defaultaddress=='true')
							<a class="btn btn-success" style="color:white;">Default Address</a>
							@endif
							@if ($address->defaultaddress=='false')
							<a href="{{ route('setdefault',$address->id) }}" class="btn btn-default" style="text-decoration: none;">Set As default</a>
							@endif
						</div>

					</div>

				</div>
				@endforeach
				<div class="col-sm-6">
					<a href="{{ route('addnewuseraddress') }}" class="btn btn-default">Add New Address</a>

				</div>

			</div>
		</div>
     
@include('frontendlayout.user_sidebar')
	</div>
</div>


@endsection