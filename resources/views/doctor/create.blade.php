@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Add New doctor</h2></center> 
    
    </section>
   <form role="form" action="{{ route('doctor.store') }}" method="post" enctype="multipart/form-data">
 {{csrf_field()}}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
                </div>

                 <div class="form-group">
                  <label for="name">Experience</label>
                  <input type="text" class="form-control" id="address" name="experience" placeholder="Experience" value="{{old('experience')}}" required>
                </div>    

                 <div class="form-group">
                  <label for="name">Refer</label>
                  <input type="text" class="form-control" id="ownername" name="refer" placeholder="Refer" value="{{old('refer')}}" required>
                </div>    

                   <div class="form-group">
                  <label for="name">phone</label>
                  <input type="text" class="form-control" id="ownername" name="phone" placeholder="phone" value="{{old('refer')}}" required>
                </div>    

                 <div class="form-group">
                  <label for="email">Address</label>
                  <input type="text" class="form-control" id="ownernumber" name="address" placeholder="Address" value="{{old('address')}}" required>
                </div>

                     <div class="form-group">
                  <label for="name">Upload Picture</label>
                  <input type="file" class="form-control" id="managername" name="picture" placeholder="Picture" value="{{old('picture')}}" required>
                </div>    
 
                           
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="#" class="btn btn-warning">Back</a>
              </div>
               </div>
          
        </div>

            </form>

    </div>
</div>
  

@include('layouts.footer')