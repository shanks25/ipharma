@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>User List</h4>
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
            "ajax": "user-datatable",
            "columns": [
            { "data": "id", title: "#" },
            { "data": "name", title: "User Name" },
            { "data": "email", title: "Email" },
            ],
            columnDefs: [
            { 
                targets: 0, 
                render: function(){
                    return '<input type="checkbox">';
                }
            },
            { 
                targets: 1, 
                render: function(data, type, row){
                    return "<a href='user/"+ row.id +"/edit' >"+row.name+"</a>";
                }
            }
            ],
            "drawCallback": function( settings ) {
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