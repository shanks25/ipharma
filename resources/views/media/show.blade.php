@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
		<div class="col-sm-4">
			<div class="x_panel">
                <div class="row x_title">
                    <h4>Image Actions</h4>
                </div>
                <div class="row x_content">
                	<div class="col-sm-6">
						<a href="#" class="btn btn-block btn-primary">Edit</a>
                	</div>
                	<div class="col-sm-6">
						<a href="#" class="btn btn-block btn-primary">Delete</a>
                	</div>
                </div>
            </div>
		</div>

        <div class="col-sm-8">
            <div class="x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h4>Media</h4>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <div class="x_content">                    	
                    <img src="/storage/{{ $image }}" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
    	$(document).ready(function() {

    		
            
    	});
    </script>
@endpush



@include('layouts.footer')