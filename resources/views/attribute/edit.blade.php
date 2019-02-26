@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>{{ $attribute->title }} Attribute Options</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="#" data-toggle="modal" data-target="#attrForm">
                            <button class="btn btn-success pull-right">Add Attribute Options</button>
                        </a>
                    </div>
                </div>
                <div class="x_content">
                    <table id="product-table" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
{{ Form::open(['url' => 'admin/add-attr-option', 'class' => 'form-horizontal']) }}
<div class="modal fade" id="attrForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Attribute Option</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Options Title</label>
                    <div class="col-sm-8">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Attribute Title']) }}
                        <input type="hidden" name="attrId" value="{{ $attribute->id }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Options Discount</label>
                    <div class="col-sm-8">
                        {{ Form::text('discount_percentage', null, ['class' => 'form-control', 'placeholder'=>'Discount in (%) Percentage']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{Form::close()}}

<!-- Modal -->
{{ Form::open(['url' => 'admin/edit-attr-option', 'class' => 'form-horizontal']) }}
<div class="modal fade" id="attrOptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Attribute Option</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Options Title</label>
                    <div class="col-sm-8">
                        {{ Form::text('name', null, ['class' => 'form-control title', 'placeholder'=>'Attribute Title']) }}
                        <input type="hidden" name="attrOptionId" class="attrId"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Options Discount</label>
                    <div class="col-sm-8">
                        {{ Form::text('discount_percentage', null, ['class' => 'form-control discount', 'placeholder'=>'Discount in (%) Percentage']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{Form::close()}}


@push('scripts')
<script>
    $(document).ready(function () {
        var attrId = $('input[name=attrId]').val();

        $('#product-table').dataTable({
            "processing": true,
            "serverSide": true,
            "search": true,
            "ajax": {
                "url": "../attribute-options-datatable",
                "type": "POST",
                "data": {"id": attrId, "_token": "{{ csrf_token() }}"},
                "datatype": "json"
            },
            "columns": [
                {data: 'id', title: 'SL'},
                {data: 'title', title: 'Title'},
                {data: 'discount_percentage', title: 'Discount (%)'},
                {title: 'Action', "searchable": false},
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: function () {
                        return '<input type="checkbox">';
                    },
                    width: "5%"
                },
                {
                    targets: 1,
                    render: function (data, type, row) {
                        return "<b>" + data + "</b>";
                    }
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        return "<b>" + data + "</b>";
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, row) {
                        return "<a href='#' data-toggle='modal' class='optionEdit' discount='" + row.discount_percentage + "' attrId='" + row.id + "' title='" + row.title + "' data-target='#attrOptionForm'><i class='fa fa-pencil text-info'></i></a> | <a href='../delete-option/" + row.id + "'><i class='fa fa-trash-o text-danger'></i></a>";
                    }
                }
            ],
        });

        $('table#product-table').on('click', '.optionEdit', function () {
            var attrId = $(this).attr('attrId');
            var optionName = $(this).attr('title');
            var discount = $(this).attr('discount');
            $('#attrOptionForm .attrId').val(attrId);
            $('#attrOptionForm .title').val(optionName);
            $('#attrOptionForm .discount').val(discount);
        });


//        $('#product-table').dataTable({
//            "processing": true,
//            "serverSide": true,
//            "type": "POST",
//            "ajax": "../attribute-options-datatable",
//            "columns": [
//                {"data": "id", title: "#"},
//                {"data": "title", title: "Option Title"}
//            ],
//            columnDefs: [
//                {
//                    targets: 0,
//                    render: function () {
//                        return '<input type="checkbox">';
//                    },
//                    width: "5%"
//                },
//                {
//                    targets: 1,
//                    render: function (data, type, row) {
//                        return "<a href='attribute/" + row.id + "' >" + data + "</a>";
//                    }
//                }
//            ],
//            "drawCallback": function (settings) {
//                $('input').iCheck({
//                    checkboxClass: 'icheckbox_minimal',
//                    radioClass: 'iradio_minimal',
//                    increaseArea: '20%' // optional
//                });
//            }
//        });

    });
</script>
@endpush



@include('layouts.footer')