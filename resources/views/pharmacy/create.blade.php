@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Add New Pharmacy</h2></center> 
    
    </section>
   <form role="form" action="{{ route('pharmacy.store') }}" method="post">
 {{csrf_field()}}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Pharmacy Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
                </div>

                 <div class="form-group">
                  <label for="name">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{old('address')}}" required>
                </div>    

                 <div class="form-group">
                  <label for="name">Owner Name</label>
                  <input type="text" class="form-control" id="ownername" name="ownername" placeholder="OwnerName" value="{{old('ownername')}}" required>
                </div>    

                 <div class="form-group">
                  <label for="email">Owner Contact Number</label>
                  <input type="text" class="form-control" id="ownernumber" name="ownernumber" placeholder="Owner number" value="{{old('email')}}" required>
                </div>

                     <div class="form-group">
                  <label for="name">Manager Name</label>
                  <input type="text" class="form-control" id="managername" name="managername" placeholder="Enter Manager name" value="{{old('managername')}}" required>
                </div>    

                 <div class="form-group">
                  <label for="email">Manager Contact Number</label>
                  <input type="text" class="form-control" id="managernumber" name="managernumber" placeholder="Manager Number" value="{{old('email')}}" required>
                </div>


                 <div class="form-group">
                  <label for="email">Pharmacy 24hour contact number</label>
                  <input type="text" class="form-control" id="email" name="hr" placeholder="Enter Here" value="{{old('email')}}" required>
                </div>
    
                 <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
                </div>

                    <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required>
                </div>   
                 <div class="form-group">
                  <label for="Password">Confirm Password</label>
                  <input type="Password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Confirm password">
                </div>
                         
 <div class="form-group">
 <label for="status">Status</label>
 <select name="status">
                    <option selected disable>Select Status</option>
<option value="1">Enabled</option>
<option value="0">Disabled</option>
</select>
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