@include('adminoperatorslayouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Add New User</h2></center> 
    
    </section>
   <form role="form" action="{{ route('adduser') }}" method="post">
 {{csrf_field()}}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
                </div>

                 <div class="form-group">
                  <label for="name">Mobile</label>
                  <input type="text" class="form-control" id="Mobile" name="mobile" placeholder="Mobile" value="{{old('Mobile')}}" required>
                </div>    

                 <div class="form-group">
                  <label for="name">Address</label>
                  <input type="text" class="form-control" id="ownername" name="address" placeholder="Address" value="{{old('Address')}}" required>
                </div>    

                   <div class="form-group">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" id="ownername" name="email" placeholder="Email" value="{{old('email')}}" required>
                </div>   

                  <div class="form-group">
                  <label for="name">Medium of Contact</label>
                  <input type="text" class="form-control" id="ownername" name="medium" placeholder="medium" value="{{old('medium')}}" required>
                </div>  

                 <div class="form-group">
                  <label for="email">Password</label>
                  <input type="password" class="form-control" id="ownernumber" name="password" placeholder="password" required>
                </div>
                  <div class="form-group">
                  <label for="email">Confirm Password</label>
                  <input type="password" class="form-control" id="ownernumber" name="password_confirmation" placeholder="Confirm Your Password" required>
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
  

@include('adminoperatorslayouts.footer')