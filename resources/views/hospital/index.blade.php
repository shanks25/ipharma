@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Hospital List</h4>
                    <center><a href="{{ url('admin/hospital/create') }}" class="btn btn-success">Add </a></center>
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
                  <th>Hospital Name</th>
                  <th>Address</th>
                  <th>Phone</th>
               <th>Website</th>
                 
                  <th>Edit</th>  
                <th>Delete</th> 
                </tr>
                </thead>
                <tbody>
                  @foreach($hospitals as $hospital)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td> {{$hospital->name}}</td>
                  <td> {{$hospital->address}}</td>
                   <td> {{$hospital->phone}}</td>
                   <td> {{$hospital->website}}</td>
               

 
 
                     
                 <td><a href="{{ route('hospital.edit',$hospital->id) }}"> <i class="fa fa-fw fa-edit"></i></a> </td> 
    
 
                    <td>
                    <form id="delete-form-{{$hospital->id}}" method="post" action="{{ route('hospital.destroy',$hospital->id) }}" style="display: none;">

                       {{csrf_field()}}

                       {{method_field('DELETE')}}

                    </form>

                  <a href="" onclick="if(confirm('Are You Sure you want to delete this?'))
                  {event.preventDefault();document.getElementById('delete-form-{{$hospital->id}}').submit();

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