@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">

        {{Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'id' => 'userForm'])}}

        <div class="col-sm-4">
            <div class="x_panel">
                <div class="x_title">
                    <h4>User Status</h4>
                </div>

                <div class="x_content">
                    <div class="form-horizontal">
                        <?php
                        $status = [
                            0 => 'Inactive',
                            2 => 'Active',
                        ];
                        ?>
                        <div class="form-group">
                            {{ Form::label('status', null, ['class' => 'col-sm-4']) }}
                            <div class="col-sm-8">
                                {{ Form::select('status', $status, null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button id="create-user" class="btn btn-primary btn-block">Save</button>
                            </div>                       
                        </div>  
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="x_panel">
                <div class="x_title row">
                    <div class="col-sm-6">
                        <h4>User Details</h4>
                    </div>

                    <div class="col-sm-6">

                    </div>
                </div>
                <div class="x_content">




                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            {{Form::text('name', null, ['placeholder' => 'User Full Name', 'class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile" class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-10">
                            {{Form::text('mobile', null, ['placeholder' => 'User Mobile Number', 'class' => 'form-control'])}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            {{Form::text('email', null, ['placeholder' => 'User Email Address', 'class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            {{Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control'])}}
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="role" class="col-sm-2 control-label">User Role</label>
                        <div class="col-sm-10">
                            {{Form::select('role[]', $roles, null, ['class' => 'form-control', 'multiple', 'id' => 'role'])}}
                        </div>
                    </div>

                    {!! Form::close() !!}


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