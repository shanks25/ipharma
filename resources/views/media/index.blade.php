@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Order List</h4>
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
            "ajax": "media-datatable",
            "columns": [
                { data: "id", title: "#"},
                { data: "src", title: "Image"},
                { data: null }
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
	                    return "<img src=/admin/get-image/"+ row.id +" class=img-responsive>";
	                }
	            },
                { 
                    targets: 2, 
                    render: function(data, type, row){
                        return "<a href=/admin/media/" + row.id + ">View</a> "
                                +"<a href=/admin/media/" + row.id + "/edit>Edit</a> "
                                +"<a href=/admin/media/" + row.id + ">Delete</a>";
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