@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Today's Order</h3>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="x_content">
                    <table id="todays-order-table" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Call Request</h3>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="x_content">
                    <table id="callme-table" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::open(array('url' => 'admin/edit-call-status', 'method' => 'POST')) !!}
<div class="modal fade" id="callEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-md" style="float: none; margin: 0 auto; background: #fff">
            <div class="modal-header text-center">
                <h3>Add Staff Information</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="mobile form-control" readonly name="mobile"/>
                    <input type="hidden" class="id_input" readonly name="id"/>
                </div>
                <div class="form-group">
                    <?php
                    $status = [
                        0 => 'Not Done',
                        1 => 'Done',
                    ];

                    $statusSelected = (isset($user_info->address[0])) ? $user_info->address[0]->division : null;
                    ?>
                    {{ Form::select('status', $status, NULL, ['id'=>'billing:region_id', 'class' => 'status form-control']) }}
                </div>
                <button class="btn btn-info pull-right" name="submit" type="submit">Update</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<!-- /page content -->
@push('scripts')
<script>
    $('#todays-order-table').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "admin/todaysOrder-datatable",
        "columns": [
            {"data": "id", title: "Order Id"},
            {"data": "user_id", title: "Customer Name"},
            {"data": "total", title: "Amount Total"},
            {"data": "payment_type", title: "Payment Type", "searchable": false},
            {"data": "payment_status", title: "Payment Status", "searchable": false},
            {"data": "created_at", title: "Order Date", "searchable": false},
            {"data": "pickup_date", title: "Pickup Date", "searchable": false},
            {"data": "stauts", title: "Order Status", "searchable": false},
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row) {
                    return row.id;
                }
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    var username = row.user ? row.user.name : "<b>Guest</b>";
                    return "<a href='admin/order/" + row.id + "/edit' >" + username + "</a>";
                }
            },
            {
                targets: 2,
                render: function (data, type, row) {
                    return row.total;
                }
            },
            {
                targets: 3,
                render: function (data, type, row) {
                    if (row.payment) {
                        if (row.payment.payment_type == 'tco') {
                            return "<p>Online Payment</p>";
                        } else {
                            return "<p>Cash On Delivery</p>";
                        }
                    } else {
                        return "<p>Cash On Delivery</p>";
                    }

                }
            },
            {
                targets: 4,
                render: function (data, type, row) {
                    if (row.payment) {
                        if (row.payment.status == 1) {
                            return "<b class = 'text-success'>SUCCESS</b>";
                        } else if (row.payment.status == 2) {
                            return "<b class = 'text-primary'>PENDING</b>";
                        } else if (row.payment.status == 3) {
                            return "<b class = 'text-info'>CANCELED</b>";
                        } else {
                            return "<b class = 'text-danger'>FAILED</b>";
                        }
                    } else {
                        return "<b class = 'text-success'>SUCCESS</b>";
                    }

                }
            },
            {
                targets: 5,
                render: function (data, type, row) {
                    var date = new Date(row.created_at);
                    var month = date.getMonth() + 1;
                    return date.getDate() + "/" + (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                }
            },
            {
                targets: 6,
                render: function (data, type, row) {
                    var pickdate = new Date(row.pickup_date);
                    var pickmonth = pickdate.getMonth() + 1;
                    return pickdate.getDate() + "/" + (pickmonth.length > 1 ? pickmonth : "0" + pickmonth) + "/" + pickdate.getFullYear();
                }
            },
            {
                targets: 7,
                render: function (data, type, row) {
                    if (row.status == 3) {
                        return "<b class='text-primary'>Cancelled</b>";
                    } else if (row.status == 2) {
                        return "<b class='text-success'>Success</b>";
                    } else if(row.status == 1) {
                        return "<b class='text-info'>Hold</b>";
                    } else {
                        return "<b class='text-danger'>Processing</b>";
                    }
                },
                title: "My column title"
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
</script>

<script>
    $('#callme-table').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "admin/callme-datatable",
        "columns": [
            {"data": "id", title: "Caller Id"},
            {"data": "mobile", title: "Mobile"},
            {"data": "created_at", title: "Request Date", "searchable": false},
            {"data": "stauts", title: "Status", "searchable": false},
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, row) {
                    return row.id;
                }
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    return "<a href='#' class='call_edit' data-toggle='modal' data-target='#callEdit' id='" + row.id + "' mobile='" + row.mobile + "' status='" + row.status + "'>" + row.mobile + "</a>";
                }
            },
            {
                targets: 2,
                render: function (data, type, row) {
                    var date = new Date(row.created_at);
                    var month = date.getMonth() + 1;
                    return date.getDate() + "/" + (month.length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                }
//                render: function (data, type, row) {
//                    return row.created_at;
//                }
            },
            {
                targets: 3,
                render: function (data, type, row) {
                    if (row.status == 0) {
                        return "<b class='text-info'>Wait for call</b>";
                    } else {
                        return "<b class='text-success'>Called</b>";
                    }
                },
                title: "My column title"
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
</script>
@endpush

@include('layouts.footer')
<!--Start of Tawk.to Script-->
 
<!--End of Tawk.to Script-->
<script>
    $('#callme-table_wrapper').on('click', '.call_edit', function () {
        var id = $(this).attr('id');
        var mobile = $(this).attr('mobile');
        var status = $(this).attr('status');
        $('#callEdit .id_input').val(id);
        $('#callEdit .mobile').val(mobile);
        $('#callEdit .status').val(status);
    });
</script>
