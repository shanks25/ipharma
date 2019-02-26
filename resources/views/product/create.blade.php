@include('layouts.header')

<!-- page content -->
{!! Form::open(['route' => ['product.store'], 'method' => 'post']) !!}

	@include('product.form')

{!! Form::close() !!}
<!-- /page content -->

@include('layouts.footer')