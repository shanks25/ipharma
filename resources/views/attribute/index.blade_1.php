@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Attribute List</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="#" data-toggle="modal" data-target="#attrForm">
                            <a href="{{ url('admin/attribute/create') }}" class="btn btn-success pull-right">Add New Attribute</a>
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
{{ Form::open(['url' => 'admin/attribute', 'class' => 'form-horizontal', 'id' => 'add-attribute']) }}
<div class="modal fade" id="attrForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                @include('attribute.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
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
        $(document).ready(function() {

            var template = Handlebars.compile($("#option-template").html());
            var html    = template({});


            var attrDiv = $("#attribute-options");

            $("#add-option").on('click', function(e) {
                e.preventDefault();
                attrDiv.append(html);
            });


            $("select[name=type]").on('change', function() {
                    
                if ( $.inArray( $(this).val(), ['Select', 'Multiselect']) > -1 ) {
                    attrDiv.show();
                }else{
                    attrDiv.hide();
                }

            });


            $('form#add-attribute').on('submit', function(e) {
                e.preventDefault();
                console.log('skdfjh');
            })

            
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#product-table').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "attribute-datatable",
                "columns": [
                    { "data": "id", title: "#" },
                    { "data": "title", title: "Attribute Title" }
                ],
                columnDefs: [
                    { 
                        targets: 0, 
                        render: function(){
                            return '<input type="checkbox">';
                        },
                        width: "5%"
                    },
                    { 
                        targets: 1, 
                        render: function(data, type, row){
                            return "<a href='attribute/"+ row.id +"' >"+data+"</a>";
                        }
                    }
                ],
                "drawCallback": function( settings ) {
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