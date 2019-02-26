@include('layouts.header')

<!-- page content -->

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="box-body">
               <center class="content-header">
      <h1>
        Set Delivery Type & Assign Charges to them
        
      </h1>
         <div class="x_title">
                   
                    <center><a href="{{ url('admin/deliverytype/create') }}" class="btn btn-success">Add New </a></center>
               
                    @if(Session::has('error'))
                    <div class="col-xs-12">
                        <div class="alert alert-danger text-center">
                            <p class="form_error"><?php echo Session::get('error'); ?></p>
                        </div>
                    </div>
                    @endif
                </div>
         @if(Session::has('success'))
                    <div class="col-xs-12">
                        <div class="alert alert-success text-center">
                            <p class="form_error"><?php echo Session::get('success'); ?></p>
                        </div>
                    </div>
                    @endif
      
    </center><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>DeliveryType Name</th>
                  <th>Price</th>
                  <th>Edit</th>
                  <th>Delete</th>         

                </tr>
                </thead>
                <tbody>
                  @foreach($deliverytypes as $aggregator)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td> {{$aggregator->name}}</td>
                   <td> {{$aggregator->price}}</td>
 
   
     <td><a href="{{ route('deliverytype.edit',$aggregator->id) }}"> <i class="fa fa-fw fa-edit"></i></a> </td> 
    
    <td>
      <form id="delete-form-{{$aggregator->id}}" method="post" action="{{ route('deliverytype.destroy',$aggregator->id) }}" style="display: none;">

                       {{csrf_field()}}

                       {{method_field('DELETE')}}

                    </form>

                  <a href="" onclick="if(confirm('Are You Sure you want to delete this?'))
                  {event.preventDefault();document.getElementById('delete-form-{{$aggregator->id}}').submit();

                }
                else{
                  
                  event.preventDefault();

                }"><i class="fa fa-fw fa-trash"></i></a></td> 
   
                </tr>
      
               @endforeach
               
                
                 
              </table>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


 

@include('layouts.footer')