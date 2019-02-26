@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Ambulance List</h4>
                    <center><a href="{{ url('admin/ambulance/create') }}" class="btn btn-success">Add </a></center>
                    @if(Session::has('success'))
                    <div class="col-xs-12">
                        <div class="alert alert-success text-center">
                            <p class="form_error"><?php echo Session::get('success'); ?></p>
                        </div>
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="col-xs-12">
                        <div class="alert alert-danger text-center">
                            <p class="form_error"><?php echo Session::get('error'); ?></p>
                        </div>
                    </div>
                    @endif
                </div>
                          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Service Name</th>
               <th>Phone</th>
                 
                  <th>Edit</th>  
                <th>Delete</th> 
                </tr>
                </thead>
                <tbody>
                  @foreach($ambulances as $ambulance)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td> {{$ambulance->servicename}}</td>
                   <td> {{$ambulance->phone}}</td>
               

 
 
                     
                 <td><a href="{{ route('ambulance.edit',$ambulance->id) }}"> <i class="fa fa-fw fa-edit"></i></a> </td> 
    
 
                    <td>
                    <form id="delete-form-{{$ambulance->id}}" method="post" action="{{ route('ambulance.destroy',$ambulance->id) }}" style="display: none;">

                       {{csrf_field()}}

                       {{method_field('DELETE')}}

                    </form>

                  <a href="" onclick="if(confirm('Are You Sure you want to delete this?'))
                  {event.preventDefault();document.getElementById('delete-form-{{$ambulance->id}}').submit();

                }
                else{
                  
                  event.preventDefault();

                }"><i class="fa fa-fw fa-trash"></i></a></td> 
                

                </tr>
        
               @endforeach
               
                
                </tbody>
              </table>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
 
@include('layouts.footer')