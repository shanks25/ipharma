@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">

        {{Form::open(['route' => 'shipping.store', 'class' => 'form-horizontal', 'id' => 'shippingForm'])}}

        <div class="col-sm-4">
            <div class="x_panel">
                <div class="x_title">
                    <h4>User Status</h4>
                </div>

                <div class="x_content">
                    <div class="form-horizontal">

                        <div class="form-group">
                            {{ Form::label('status', null, ['class' => 'col-sm-4']) }}
                            <div class="col-sm-8">
                                {{ Form::select('status', ['Inactive', 'Active'], null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button id="create-shipping" class="btn btn-primary btn-block">Save</button>
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
                        <label for="name" class="col-sm-2 control-label">Shipping</label>
                        <div class="col-sm-10">
                            {{Form::text('description', null, ['placeholder' => 'Shipping Description', 'class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                            {{Form::text('price', null, ['placeholder' => 'Price', 'class' => 'form-control'])}}
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

        $('#create-shipping').on('click', function (e) {
            e.preventDefault();

            var form = $('#shippingForm');
            var formData = form.serializeArray();

            $.ajax({
                url: "/admin/shipping",
                method: "POST",
                data: formData,
                success: function (res) {
                    if (res.success == 1) {
                        swal('Created!', res.message, 'success');
                    } else {
                        swal('Something Wrong!', res.message, 'error');
                    }
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