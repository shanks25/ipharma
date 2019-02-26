@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Review List</h4>
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
                    <table id="order-table" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@push('scripts')
<script>
    $('#order-table').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "review-datatable",
        "columns": [
            {"data": "id", title: "#"},
            {"data": "product", title: "Product Name", "searchable": false},
            {"data": "user", title: "User Name", "searchable": false},
            {"data": "rating", title: "Rating"},
            {"data": "comment", title: "Review"},
            {"data": "status", title: "Status"},
            {"data": "created_at", title: "Date"},
            {"data": "action", title: "Action", "searchable": false},
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
                    return "<b>" + row.product.name + "</b>";
                }
            },
            {
                targets: 2,
                render: function (data, type, row) {
                    return "<b>" + row.user.name + "</b>";
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
                    if (row.status == 1) {
                        return "<a href='#' class='statusUpdate' reviewId='" + row.id + "' status='0'><i style='color: green' class='fa fa-toggle-on fa-2x'><i></a>";
                    } else {
                        return "<a href='#' class='statusUpdate' reviewId='" + row.id + "' status='1'><i style='color: red' class='fa fa-toggle-off fa-2x'><i></a>";
                    }
                }
            },
            {
                targets: 6,
                render: function (data, type, row) {
                    var date = new Date(row.created_at);
                    var month = date.getMonth() + 1;
                    return date.getDate() + "/" + (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                }
            },
            {
                targets: 7,
                render: function (data, type, row) {
                    return "<a href='delete-review/" + row.id + "' data-confirm='Are you sure want to delete?'><i class='fa fa-trash-o text-danger'></i></a>";
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

    $(document).ready(function () {
        $('#order-table').on('click', '.statusUpdate', function () {
            var rId = $(this).attr('reviewId');
            var status = $(this).attr('status');
            var token = '{{ csrf_token() }}';
            $.ajax({
                type: "POST",
                url: "{{URL::to('admin/update-review')}}",
                data: {rId: rId, status: status, _token: token},
                success: function (res) {
                    location.reload();
                }
            });
            return false;
        });
    })
</script>
@endpush

@include('layouts.footer')