@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Category List</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="#" data-toggle="modal" data-target="#catForm">
                            <button class="btn btn-success pull-right">Add New Category</button>
                        </a>
                    </div>
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
                    <table id="category-table" class="table table-hover"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

{!! Form::open(array('url' => 'admin/category', 'method' => 'POST', 'id'=>'create-form', 'file' => true)) !!}
<div class="modal fade" id="catForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-md" style="float: none; margin: 0 auto; background: #fff">


            <div class="modal-header text-center">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

                <h3>Add Category</h3>
            </div>          

            <div class="modal-body">

                {{Form::hidden('id', '')}}

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Category Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Category Name" required/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-xs-12">
                        <label>Parent Category</label>
                        {{Form::select('parent', $categories, null, ['class' => 'form-control'])}}
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label>Discount Percentage</label>
                        <input class="form-control" type="text" name="discount_percentage" placeholder="Discount Percentage" required/>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="">Category Image</label>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file"/>
                            </div>                        
                        </div>
                    </div>
                </div>

                <div class="form-group text-center signup_btn pull-right" style="padding-top: 10px;">
                    <button type="submit" id="create-category" class="btn btn-success">SAVE</button>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
{!! Form::close() !!}


{!! Form::open(array('url' => 'admin/category', 'method' => 'PUT', 'id'=>'edit-form', 'file' => true)) !!}
<div class="modal fade" id="catEditForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-md" style="float: none; margin: 0 auto; background: #fff">


            <div class="modal-header text-center">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

                <h3>Edit Category</h3>
            </div>          

            <div class="modal-body">

                {{Form::hidden('id', '')}}

                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Category Name" required/>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-xs-12">
                        <label>Parent Category</label>
                        {{Form::select('parent', $categories, null, ['class' => 'form-control'])}}
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <label>Discount Percentage</label>
                        <input class="form-control" type="text" name="discount_percentage" placeholder="Discount Percentage" required/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="">Category Image</label>

                    <div class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file"/>
                        </div>                        
                    </div>
                </div>

                <div class="form-group text-center signup_btn pull-right" style="padding-top: 10px;">
                    <button type="submit" id="update-category" class="btn btn-success">SAVE</button>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
</div>
{!! Form::close() !!}






@push('scripts')
<script>
    $(document).ready(function () {

        window.csrfToken = '<?php echo csrf_token(); ?>';

        Dropzone.autoDiscover = false;
        window.DZ1 = new Dropzone("#catForm .dropzone", {
            addRemoveLinks: true,
            url: "{{ url('admin/media') }}",
            sending: function (file, xhr, formData) {
                formData.append("_token", $('input[name=_token]').val());
            },
            success: function (file, xhr) {
                file.id = xhr;
            }
        });




        var DT = $('#category-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "category-datatable",
            "columns": [
                {"data": "id", title: "#"},
                {"data": "name", title: "Category Name"},
                {"data": "parent", title: "Parent Category", "searchable": false},
                {"data": "discount_percentage", title: "Discount", "searchable": false},
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

                        var imgArr = [];
                        if (row.media.length) {
                            var imgArr = row.media.map(function (media) {
                                return media.src
                            });
                        }

                        var parent = (row.parent) ? row.parent : "";

                        return "<a href='#' data-toggle='modal' data-target='#catEditForm'"
                                + " data-id= '" + row.id
                                + "' data-name= '" + row.name
                                + "' data-parent= '" + parent.id
                                + "' data-discount_percentage= '" + row.discount_percentage
                                + "' data-img= '" + imgArr.join(',')
                                + "'>" + data + "</a>";
                    }
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        return data ? "<span class='badge'>" + data.name + "</span>" : "";
                    }
                },
                {
                    targets: 3,
                    render: function (data, type, row) {
                        return data ? "<b>" + data + "%<b>" : "";
                    }
                },
                {
                    targets: 4,
                    render: function (data, type, row) {
                        return "<a href='category/" + row.id + "' data-method='delete' data-confirm='Are you sure?'><i class='fa fa-trash-o text-danger'></i></a>";
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


        $('form button#create-category').on('click', function (e) {
            e.preventDefault();

            var form = $(this).closest('form');
            var formData = form.serializeArray();

            $.each(DZ1.files, function (k, v) {
                formData.push({name: "files[]", value: v.id});
            });


            $.ajax({
                url: "/admin/category",
                method: "POST",
                data: formData,
                success: function (res) {
                    $('#catForm').modal('toggle');

                    if (res.success == 1) {
                        swal('Created!', res.message, 'success');
                    } else {
                        swal('Something Wrong!', res.message, 'error');
                    }

                    DT.ajax.reload();
                }
            });

        });


        $('form button#update-category').on('click', function (e) {
            e.preventDefault();


            var form = $(this).closest('form');
            var formData = form.serializeArray();

            $.each(DZ2.files, function (k, v) {
                formData.push({name: "files[]", value: v.id});
            });

            var id = form.find("input[name=id]").val();

            $.ajax({
                url: "/admin/category/" + id,
                method: "POST",
                data: formData,
                success: function (res) {
                    $('#catEditForm').modal('toggle');

                    if (res.success == 1) {
                        swal('Updated!', res.message, 'success');
                    } else {
                        swal('Something Wrong!', res.message, 'error');
                    }

                    DT.ajax.reload();
                }
            });

        });

        $('#catEditForm').on('show.bs.modal', function (e) {

            window.DZ2 = new Dropzone("#catEditForm .dropzone", {
                addRemoveLinks: true,
                url: "{{ url('admin/media') }}",
                sending: function (file, xhr, formData) {
                    formData.append("_token", $('input[name=_token]').val());
                },
                success: function (file, xhr) {
                    file.id = xhr;
                }
            });

            var $invoker = $(e.relatedTarget),
                    data = $invoker.data();

            if (data.id) {
                $('input[name=id]').val(data.id);
                $('input[name=name]').val(data.name);
                $('select[name=parent]').val(data.parent);
                $('input[name=discount_percentage]').val(data.discount_percentage);
            }

            if (data.img) {
                var imgArr = data.img.split(',');

                $.each(imgArr, function (k, v) {
                    var mockFile = {name: "Filename", size: 12345, id: k};
                    DZ2.emit("addedfile", mockFile);
                    DZ2.emit("complete", mockFile);
                    DZ2.createThumbnailFromUrl(mockFile, '/storage/' + v);
                    DZ2.files.push(mockFile);
                });
            }
        });

        $('#catEditForm').on('hidden.bs.modal', function (e) {
            DZ2.destroy();
        });

        $('#catForm').on('show.bs.modal', function (e) {
            $('form#create-form ')[0].reset();
            DZ1.removeAllFiles(true);
        });

    });
</script>
@endpush

@include('layouts.footer')



