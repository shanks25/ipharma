@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Menu Builder</h3>
                    </div>

                    <div class="col-md-6">
                        <a href="#" data-toggle="modal" data-target="#catForm">
                            <button class="btn btn-success pull-right" id="save-menu">Save Menu</button>
                        </a>
                    </div>
                </div>
                <div class="x_content">


                    <div class="dd" id="domenu-1">
                        <button id="domenu-add-item-btn" class="dd-new-item">+</button>
                        <li class="dd-item-blueprint">
                            <button class="collapse" data-action="collapse" type="button" style="display: none;">–</button>
                            <button class="expand" data-action="expand" type="button" style="display: none;">+</button>
                            <div class="dd-handle dd3-handle">
                                {{-- <i class="fa fa-bars" aria-hidden="true"></i> --}}
                            </div>
                            
                            <div class="dd3-content">
                                <span class="item-name">[item_name]</span>
                                <div class="dd-button-container">                                    
                                    <button class="item-add">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>

                                    <button class="item-remove" data-confirm-class="item-remove-confirm">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="dd-edit-box" style="display: none;">
                                    <input type="text" name="title" autocomplete="off" placeholder="Item"
                                           data-placeholder="Any nice idea for the title?"
                                           data-default-value="Menu Item {?numeric.increment}">
                                    <select name="custom-select">
                                        <option value="/">select something...</option>
                                        <optgroup label="Pages">
                                            <option value="1">http://localhost:8000/category/1</option>
                                            <option value="2">http://localhost:8000/category/2</option>
                                        </optgroup>
                                        <optgroup label="Categories">
                                            @foreach($categories as $category)
                                                <option value="/category/{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    <input type="text" name="icon" placeholder="fa fa-user" style="border: 1px solid #ddd; padding-left: 10px; line-height: 24px;"/>
<!--                                    <select name="icon">
                                        <optgroup label="icon">
                                            <option value="">No Icon</option>
                                            <option value="fa fa-users">fa fa-users</option>
                                            <option value="fa fa-prescription-bottle-alt">fa fa-prescription-bottle-alt</option>
                                            <option value="fa fa-pills">fa fa-pills</option>
                                            <option value="fa fa-female">fa fa-female</option>
                                            <option value="fa fa-child">fa fa-child</option>
                                            <option value="fa fa-heart">fa fa-heart</option>
                                        </optgroup>
                                    </select>-->
                                    <i class="end-edit">save</i>
                                </div>
                            </div>

                        </li>

                        <ol class="dd-list"></ol>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@include('layouts.footer')
<script>
    $(document).ready(function () {

        var domenu = $('#domenu-1').domenu({
            slideAnimationDuration: 0,
            select2: {
                support: true,
                params: {
                    tags: true
                }
            },
            data: '{!! $menu !!}'
        }).parseJson();

        $('#save-menu').on('click', function(e) {
            $.ajax({
                url: '/admin/menu',
                method: 'POST',
                data: {menu: domenu.toJson(), _token: '{{ csrf_token() }}'},
                error: function() {
                    toastr.error('Some error occurred while storing menus', 'Something Error');
                },
                success: function(){
                    toastr.success('Menu has updated successfully.', 'Menu Updated');
                }
            })
            // console.log(domenu.toJson());
        })

    });
</script>





