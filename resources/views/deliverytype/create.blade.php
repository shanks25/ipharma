@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Add New DeliveryType</h2></center> 
   @include('includes.messages')   
    
   
    </section>
   <form role="form" action="{{ route('deliverytype.store') }}" method="post">
 {{csrf_field()}}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Delivery Type Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
                </div>

                 <div class="form-group">
                  <label for="name">Price</label>
                  <input type="number" class="form-control" id="Price" name="price" placeholder="Price" value="{{old('address')}}" required>
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