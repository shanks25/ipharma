@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Upload Media</h3>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <div class="x_content">                    	
                    <div class="dropzone">
    					<div class="fallback">
    						<input name="file" type="file" multiple />
    					</div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
    	$(document).ready(function() {

    		Dropzone.autoDiscover = false;
            window.DZ = new Dropzone(".dropzone", {
                addRemoveLinks: true,
                url: "{{ url('admin/media') }}",
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('input[name=_token]').val());
                },
                success: function(file, xhr) {
                    file.id = xhr;
                }
            });
            
    	});
    </script>
@endpush



@include('layouts.footer')