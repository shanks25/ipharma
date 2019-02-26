@include('layouts.header')
	<!-- Content Wrapper. Contains page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Add New Tag</h2></center> 
    
    </section>
	         @include('includes.messages')

	         
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('tag.store')}}" method="post">
 {{csrf_field()}}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">Tag Name</label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="Tag Title">
	              </div>

	       

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <a href="{{ route('tag.index') }}" class="btn btn-warning">Back</a>
	            </div>
	            	
	            </div>
					
				</div>

	          </form>
	        </div>
	        <!-- /.box -->

	        
	      </div>
	      <!-- /.col-->
	    </div>
	    <!-- ./row -->
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
 @include('layouts.footer')