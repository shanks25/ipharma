@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">

       <form role="form" action="{{ route('deliverysurvey.store') }}" method="post" >
 {{csrf_field()}}
              <div class="box-body">
              <h1>Add New Delivery Survey Question</h1>  
              <br><br>
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">Survey Question</label>
                  <input type="text" class="form-control" id="testgroupname" name="question" placeholder=" Add Question Here" value="{{old('name')}}">
                </div>

          

                <div class="form-group">
                   
                <div>
                  
  
 
                           
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('admin/deliverysurvey') }}" class="btn btn-warning">Back</a>
              </div>
               </div>
          
        </div>

            </form>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@push('scripts')
<script>
    $(document).ready(function () {

        $('select#role').select2();

        $('#create-user').on('click', function (e) {
            e.preventDefault();

            var form = $('#userForm');
            var formData = form.serializeArray();

            $.ajax({
                url: "/admin/user",
                method: "POST",
                data: formData,
                success: function (res) {
                    if (res.success == 1) {
                        swal('Created!', res.message, 'success');
                    } else {
                        swal('Something Wrong!', res.message, 'error');
                    }

                    DT.ajax.reload();
                },
                error: function () {
                    swal('Something Wrong!', res.message, 'error');
                }
            });

        });

    });

</script>
@endpush


@include('layouts.footer')