@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">

                <div class="row x_title">
                    <div class="col-xs-12">
                        <h3>Brand List</h3>
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
{{ Form::open(['url' => 'admin/edit-brand-attr-option', 'class' => 'form-horizontal']) }}
<div class="modal fade" id="attrOptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Attribute Option</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Options Discount</label>
                    <div class="col-sm-8">
                        {{ Form::text('discount_percentage', null, ['class' => 'form-control discount', 'placeholder'=>'Discount in (%) Percentage']) }}
                        <input type="hidden" name="attrOptionId" class="attrId"/>
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
<!-- /page content -->




@push('scripts')
<script id="option-template" type="text/x-handlebars-template">
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
    {{ Form::text('options[]', null, ['class' => 'form-control']) }}
    </div>            
    </div>
</script>

<script>
    $(document).ready(function () {

        var template = Handlebars.compile($("#option-template").html());
        var html = template({});


        var attrDiv = $("#attribute-options");

        $("#add-option").on('click', function (e) {
            e.preventDefault();
            attrDiv.append(html);
        });


        $("select[name=type]").on('change', function () {

            if ($.inArray($(this).val(), ['Select', 'Multiselect']) > -1) {
                attrDiv.show();
            } else {
                attrDiv.hide();
            }

        });


//            $('form#add-attribute').on('submit', function(e) {
//                e.preventDefault();
//                console.log('skdfjh');
//            })


    });
</script>

<script>
    $(document).ready(function () {

        $('#product-table').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "brand-datatable",
            "columns": [
                {"data": "id", title: "#"},
                {"data": "title", title: "Company Title"},
                {"data": "discount_percentage", title: "Discount (%)"},
                {"data": "action", title: "Action", "searchable": false}
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
                        return data ? "<b>" + data + "<b>" : "";
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, row) {
                        return "<a href='#' data-toggle='modal' class='optionEdit' discount='" + row.discount_percentage + "' attrId='" + row.id + "' data-target='#attrOptionForm'><i class='fa fa-pencil text-info'></i></a>";
                    }
                }
            ],
            "drawCallback": function (settings) {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal',
                    increaseArea: '20%' // optional
                });
            }
        });

        $('table#product-table').on('click', '.optionEdit', function () {
            var attrId = $(this).attr('attrId');
            var optionName = $(this).attr('title');
            var discount = $(this).attr('discount');
            $('#attrOptionForm .attrId').val(attrId);
            $('#attrOptionForm .discount').val(discount);
        });

    });
</script>
@endpush

@include('layouts.footer')