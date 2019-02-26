@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Add New Deliveryman</h2></center> 
    
    </section>
   <form role="form" action="{{ route('deliveryman.store') }}" method="post">
 {{csrf_field()}}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{old('name')}}" required>
                </div>

                 <div class="form-group">
                  <label for="name">Home Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Home Address" value="{{old('address')}}" required>
                </div>    

                 <div class="form-group">
                  <label for="name">ID Number</label>
                  <input type="text" class="form-control" id="ownername" name="idnumber" placeholder="OwnerName" value="{{old('ownername')}}" required>
                </div>    

                 <div class="form-group">
                  <label for="email">Employees Number</label>
                  <input type="text" class="form-control" id="ownernumber" name="Employeesnumber" placeholder="Employees number" value="{{old('email')}}" required>
                </div>

                     <div class="form-group">
                  <label for="name">Area assigned</label>
                  <input type="text" class="form-control" id="managername" name="areaassigned" placeholder="Add Details" value="{{old('managername')}}" required>
                </div>    

               

                 <div class="form-group">
                  <label for="email">Mobile number</label>
                  <input type="text" class="form-control" id="email" name="mobile" placeholder="Enter Mobile" value="{{old('email')}}" required>
                </div>
    
                 <div class="form-group">
                  <label for="email">Brief Background</label>
                  <textarea name="Brief" id="" class="form-control" cols="10" rows="3"></textarea>
                </div>
 
                <div class="form-group">
                  <label for="email">Duty From</label>
                  <input type="time" class="form-control" id="email" name="dutyfrom" required>
                </div>

                 <div class="form-group">
                  <label for="email">Duty to</label>
                  <input type="time" class="form-control" id="email" name="dutyto" required>
                </div>

                   
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('deliverman') }}" class="btn btn-warning">Back</a>
              </div>
               </div>
          
        </div>

            </form>

    </div>
</div>
  

@include('layouts.footer')