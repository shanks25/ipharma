@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <h3>Product List</h3>
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
                <div class="x_content">
                    <table id="product-table" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->




@push('scripts')
<script>
    window.csrfToken = '<?php echo csrf_token(); ?>';

    $(document).ready(function () {


        $('#product-table').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "product-datatable",
            "columns": [
                {"data": "id", title: "#"},
                {"data": "name", title: "Product Title"},
                {"data": "id", title: "Product ID"},
                {"data": "categories", title: "Categories", "width": "20%", "searchable": false},
                {"data": "price", title: "Price"},
                {"data": "action", title: "Action", "searchable": false},
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
                        return "<a href='product/" + row.id + "' >" + data + "</a>";
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
                        var categories = "";
                        $.each(data, function (k, v) {
                            categories += "<span class=badge>" + v.name + "</span> ";
                        });
                        return categories;
                    }
                },
                {
                    targets: 4,
                    render: function (data, type, row) {
                        return "<a href='product/" + row.id + "' >" + data + "</a>";
                    }
                },
                {
                    targets: 5,
                    render: function (data, type, row) {
                        return "<a href='product/" + row.id + "' data-method='delete' data-confirm='Product Delete will cause error of some page. Are you sure?'><i class='fa fa-trash-o text-danger'></i></a>";
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

    });
</script>
@endpush

@include('layouts.footer')