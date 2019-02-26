@include('layouts.header')
<style>
    .order_header{
        margin: 0;
        padding-bottom: 20px;
    }
    .order_header li{
        list-style: none;
        display: inline;
        font-size: 18px;
        padding-left: 20px;
        padding-bottom: 20px;
        text-align: center;
        color: #333;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Order List</h4>
                </div>
                <div class="x_content">
                    <div class="col-xs-12">
                        <ul class="order_header">
                            <li>Total Order - <span class="text-danger">{{ $totalOrder }}</span></li>
                            <li>Processing Order - <span class="text-danger">{{ $prossOrder }}</span></li>
                            <li>Success Order - <span class="text-danger">{{ $completeOrder }}</span></li>
                            <li>On Hold Order - <span class="text-danger">{{ $holdOrder }}</span></li>
                            <li>Cancel Order - <span class="text-danger">{{ $cancelOrder }}</span></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
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
        "ajax": "order-datatable",
        "columns": [
            {"data": "id", title: "Order Id"},
            {"data": "user_id", title: "Customer Name"},
            {"data": "total", title: "Amount Total"},
            {"data": "payment_type", title: "Payment Type", "searchable": false},
            {"data": "payment_status", title: "Payment Status", "searchable": false},
            {"data": "created_at", title: "Order Date", "searchable": false},
            {"data": "pickup_date", title: "Pickup Date", "searchable": false},
            {"data": "status", title: "Order Status"},
            {"data": "action", title: "Action", "searchable": false},
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
                    var username = row.user ? row.user.first_name+row.user.last_name  : "<b>Guest</b>";
                    return "<a href='order/" + row.id + "/edit' >" + username + "</a>";
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
//                render: function (data, type, row) {
//                    return row.created_at;
//                }
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
                    if (row.status == 5) {
                        return "<b class='text-primary'>Cancelled</b>";
                    } else if (row.status == 3) {
                        return "<b class='text-success'>Delivered</b>";
                    } else if(row.status == 1) {
                        return "<b class='text-info'>Order Placed</b>";
                    } 
                      else if(row.status == 0) {
                        return "<b class='text-info'>Processing</b>";
                    } 
                    else if(row.status == 2) {
                        return "<b class='text-info'>On the way to delivery address</b>";
                    }   
                    else {
                        return "<b class='text-danger'>On Hold</b>";
                    }
                },
                title: "My column title"
            },
            {
                targets: 8,
                render: function (data, type, row) {
                    return "<a href='invoice/" + row.id +"' ><bitton class='btn btn-info'>Download</button></a>";
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