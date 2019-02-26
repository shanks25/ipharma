@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Edit DeliveryType</h2></center> 
   @include('includes.messages')   
    
   
    </section>
   <form role="form" action="{{ route('deliverytype.update',$deliverytype->id) }}" method="post">
 {{csrf_field()}}
  {{ method_field('PATCH') }}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Delivery Type Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$deliverytype->name}}" required>
                </div>

                 <div class="form-group">
                  <label for="name">Price</label>
                  <input type="number" class="form-control" id="Price" name="price" placeholder="Price" value="{{$deliverytype->price}}"  required>
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