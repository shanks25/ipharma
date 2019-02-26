@include('layouts.header')

<!-- page content -->

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="box-body">
               <center class="content-header">
      <h1>
        Deliveryman page
        
      </h1>
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
                  <th>Deliveryman Name</th>
                  <th>Id Number</th>
          
                 <th>Mobile Number</th>   
                 <th>Duty From</th>  
                 <th>Duty to</th>  
              
               
   
                  <th>Edit</th>
            <th>Delete</th>         

                </tr>
                </thead>
                <tbody>
                  @foreach($deliverymans as $aggregator)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td> {{$aggregator->name}}</td>
                   <td> {{$aggregator->idnumber}}</td>
                     <td> {{$aggregator->mobile}}</td>
                       <td> {{$aggregator->dutyfrom}}</td>
                       <td> {{$aggregator->dutyto}}</td>
             
 
   
                 <td><a href="{{ route('deliveryman.edit',$aggregator->id) }}"> <i class="fa fa-fw fa-edit"></i></a> </td> 
    
    <td>
      <form id="delete-form-{{$aggregator->id}}" method="post" action="{{ route('deliveryman.destroy',$aggregator->id) }}" style="display: none;">

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