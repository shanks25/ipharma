@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>{{ $title }}</h4>
                </div>
                <div class="x_content">
                    <table id="order-table" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="attrOptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Prescription Image</h4>
            </div>
            <div class="modal-body">
                <img src="<?php echo asset('prescription') ?>"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@push('scripts')
<script>
    $(document).ready(function () {
        $('#order-table').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "inquiry-datatable",
            "columns": [
                {"data": "id", title: "#", "width": "5%"},
                {"data": "full_name", title: "Name", "width": "20%"},
                {"data": "email", title: "Email", "width": "20%"},
                {"data": "mobile", title: "Mobile", "width": "10%"},
                {"data": "product_inquiry", title: "Details", "width": "25%"},
                {"data": "file", title: "Prescription", "width": "15%"},
                {"data": "action", title: "Action", "width": "5%", "searchable": false},
            ],
            columnDefs: [
                {
                    targets: 0,
                    render: function () {
                        return '<input type="checkbox">';
                    }
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
                        return "<b>" + data + "</b>";
                    }
                },
                {
                    targets: 4,
                    render: function (data, type, row) {
                        return "<b>" + data + "</b>";
                    }
                },
                {
                    targets: 5,
                    render: function (data, type, row) {
                        return "<a href='<?php echo asset("prescription") ?>/" + data + "' target='_blank'><img src='<?php echo asset("prescription") ?>/" + data + "' style='height:100px; width:100px'></a>";
                    }
                },
//                },
//                {
//                    targets: 5,
//                    render: function (data, type, row) {
//                        return "<a href='#' data-toggle='modal' class='optionEdit' attrId='" + row.file + "' data-target='#attrOptionForm'><img src='<?php echo asset("prescription") ?>/" + data + "' style='height:100px; width:100px'></a>";
//                    }
//                },
                {
                    targets: 6,
                    render: function (data, type, row) {
                        return "<a href='inquiry-delete/" + row.id + "' data-method='delete' data-confirm='Product Delete will cause error of some page. Are you sure?'><i class='fa fa-trash-o text-danger'></i></a>";
                    }
                }
            ],
            "drawCallback": function (settings) {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal',
                    increaseArea: '20%'
                });
            }
        });

        $('table#product-table').on('click', '.optionEdit', function () {
            var imgId = $(this).attr('imgId');
            $('#attrOptionForm .imgId').val(imgId);
        });
    });
</script>
@endpush

@include('layouts.footer')