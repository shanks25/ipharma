@include('layouts.header')

<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h4>Tags List</h4>
   @include('includes.messages') 
          <center><a href="{{ url('admin/tag/create') }}" class="btn btn-success">Add </a></center>
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
          @include('includes.messages') 
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Tag Name</th>
             
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tags as $tag)
              <tr>
                <td>{{$loop->index + 1}}</td>
                <td> {{$tag->name}}</td>
            
                <td><a href="{{ route('tag.edit',$tag->id) }}"> <i class="fa fa-fw fa-edit"></i></a> </td>
                <td>
                  <form id="delete-form-{{$tag->id}}" method="post" action="{{ route('tag.destroy',$tag->id) }}" style="display: none;">

                   {{csrf_field()}}

                   {{method_field('DELETE')}}

                 </form>

                 <a href="" onclick="if(confirm('Are You Sure you want to delete this?'))
                 {event.preventDefault();document.getElementById('delete-form-{{$tag->id}}').submit();

               }
               else{

                event.preventDefault();

              }"><i class="fa fa-fw fa-trash"></i></a></td>


            </tr>
          </tr>
          @endforeach


      
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.box-body -->

</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div> 
@include('layouts.footer')