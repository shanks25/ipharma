@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Edit Pharmacy</h2></center> 
    
    </section>


            @include('includes.messages')   
   <form role="form" action="{{ route('pharmacy.update',$pharmacy->id) }}" method="post">
 {{csrf_field()}}
   {{ method_field('PATCH') }}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Pharmacy Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$pharmacy->name}}" required>
                </div>

                 <div class="form-group">
                  <label for="name">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$pharmacy->address}}" required>
                </div>    

                 <div class="form-group">
                  <label for="name">Owner Name</label>
                  <input type="text" class="form-control" id="ownername" name="ownername" placeholder="OwnerName" value="{{$pharmacy->ownername}}" required>
                </div>    

                 <div class="form-group">
                  <label for="email">Owner Contact Number</label>
                  <input type="text" class="form-control" id="ownernumber" name="ownernumber" placeholder="Owner number" value="{{$pharmacy->ownernumber}}" required>
                </div>

                     <div class="form-group">
                  <label for="name">Manager Name</label>
                  <input type="text" class="form-control" id="managername" name="managername" placeholder="Enter Manager name" value="{{$pharmacy->managername}}" required>
                </div>    

                 <div class="form-group">
                  <label for="email">Manager Contact Number</label>
                  <input type="text" class="form-control" id="managernumber" name="managernumber" placeholder="Manager Number" value="{{$pharmacy->managernumber}}" required>
                </div>


                 <div class="form-group">
                  <label for="email">Pharmacy 24hour contact number</label>
                  <input type="text" class="form-control" id="email" name="hr" placeholder="Enter Here" value="{{$pharmacy->hr}}" required>
                </div>
    
                 <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$pharmacy->email}}" required>
                </div>
 
                         
    <div class="form-group">
 <label for="status">Status</label>
 <select name="status">
                    <option selected disable>Select Status</option>
<option value="1" @if ($pharmacy->status == 1)
{{'selected'}}
 @endif>Enabled</option>
<option value="0" @if ($pharmacy->status == 0)
{{'selected'}}
 @endif>Disabled</option>
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