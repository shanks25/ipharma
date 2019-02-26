@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">

        {{Form::model($shipping, ['url' => 'admin/update-dhaka-shipping', 'class' => 'form-horizontal', 'id' => 'shippingForm', 'method' => 'POST'])}}
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title row">
                    <div class="col-sm-6">
                        <h4>Shipping Details</h4>
                    </div>

                    <div class="col-sm-6">

                    </div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Area Name</label>
                        <div class="col-sm-10">
                            {{Form::text('name', null, ['placeholder' => 'Area Name', 'class' => 'form-control', 'disabled'])}}
                            <input type="hidden" name="id" value="{{$shipping->id}}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Shipping Fee</label>
                        <div class="col-sm-10">
                            {{Form::text('shipping_fee', null, ['placeholder' => 'Shipping Fee', 'class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <button id="create-shipping" class="btn btn-lg btn-primary pull-right">Save</button>
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
        $('#create-shipping').on('click', function (e) {
            e.preventDefault();

            var form = $('#shippingForm');
            var formData = form.serializeArray();

            $.ajax({
                url: "/admin/update-dhaka-shipping",
                method: "POST",
                data: formData,
                success: function (res) {
                    if (res.success == 1) {
                        swal('Updated!', res.message, 'success');
                    } else {
                        swal('Something Wrong!', res.message, 'error');
                    }
                },
                error: function (res) {
                    swal('Something Wrong!', res.message, 'error');
                }
            });

        });

    });

</script>
@endpush


@include('layouts.footer')