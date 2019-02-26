@include('layouts.header')

<!-- page content -->
{!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'put']) !!}

<div class="right_col" role="main">
    <div class="row">
        <div class="col-xs-12">
            <a class="btn btn-info" id="back-btn">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">			
            <div class="x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Publish</h3>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="x_content">

                    <div class="form-horizontal">
<!--                        <div class="form-group">
                            {{ Form::label('type', null, ['class' => 'col-sm-4']) }}
                            <div class="col-sm-8">
                                {{ Form::select('type', ['Simple', 'Grouped', 'Veriable'], null, ['class' => 'form-control']) }}
                            </div>
                        </div>-->

                        <div class="form-group">
                            {{ Form::label('Price', null, ['class' => 'col-sm-4', 'style' => 'line-height:35px;']) }}
                            <div class="col-sm-8">
                                {{ Form::text('price', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Discount In Amount', null, ['class' => 'col-sm-4', 'placeholder' => 'BDT']) }}
                            <div class="col-sm-8">
                                {{ Form::text('discount_amount', null, ['class' => 'form-control', 'placeholder' => '100']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Discount In Percentage', null, ['class' => 'col-sm-4', 'placeholder' => 'BDT']) }}
                            <div class="col-sm-8">
                                {{ Form::text('discount_percentage', null, ['class' => 'form-control', 'placeholder' => '5']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Stock', null, ['class' => 'col-sm-4', 'style' => 'line-height:35px;']) }}
                            <div class="col-sm-8">
                                {{ Form::select('is_available', ['Not Available', 'Available'], null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Origin', null, ['class' => 'col-sm-4', 'style' => 'line-height:35px;']) }}
                            <div class="col-sm-8">
                                {{ Form::select('origin', ['Local', 'Foreign'], null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Minimum Quantity', null, ['class' => 'col-sm-4']) }}
                            <div class="col-sm-8">
                                {{ Form::text('min_quantity', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <a id="create-product" class="btn btn-primary btn-block">Save</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Category</h3>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="x_content">
                    <?php

                    use Epharma\Model\Category;
                    ?>
                    <select name="category[]" class="form-control" id="category">
                        @foreach($parCat as $cat)
                        <optgroup label="{{$cat->name}}">
                            @foreach(Category::where('parent', $cat->id)->get() as $val)
                            <option value="{{$val->id}}" <?php if ($val->id == $product->categories[0]->id) {
                        echo 'selected="selected"';
                    } ?>>{{$val->name}}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>






        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Product Intro</h3>
                </div>
                <div class="x_content">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Product Title']) }}

                    <br>

                    {{ Form::text('product_code', null, ['class' => 'form-control', 'placeholder' => 'Product Code']) }}
                    
                    <br>

                    {{ Form::textarea('short_description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Add short description of product!']) }}
                    
                    <br>

                    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) }}

                    <br>

                    <div class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>                        
                    </div>
                </div>

                <div class="x_content">
                    <div class="form-horizontal">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            {{ Form::label('Attribute', null) }}

                            @if(isset($attributes))
                            {{Form::select('attributes[]', $attributes, $attribute_keys, ['class' => 'form-control', 'id' => 'attributes', 'multiple'])}}
                            @else
                            {{Form::select('attributes[]', [], [], ['class' => 'form-control', 'id' => 'attributes', 'multiple'])}}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
<!-- /page content -->

@include('layouts.footer')
<script>
    	$(document).ready(function() {
            
            var configParamsObj = {
            placeholder: 'Select an option...', // Place holder text to place in the select
            minimumResultsForSearch: 3 // Overrides default of 15 set above
            }


            $("select#category").select2(configParamsObj);

            $("select#attributes").select2({

                ajax: {
                    url: "/admin/attributes",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: formatAttributes, 
                templateSelection: formatAttributesSelection

            });


            function formatAttributes(item) {
                return item.text;
            }

            function formatAttributesSelection(item) {

                if (item.id === '') {
                    return 'Select Product';
                }

                return item.text;
            }

    		Dropzone.autoDiscover = false;
            window.DZ = new Dropzone(".dropzone", {
                addRemoveLinks: true,
                url: "{{ url('admin/media') }}",
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('input[name=_token]').val());
                },
                success: function(file, xhr) {
                    file.id = xhr;
                }
            });

            var files = {!! $product->media->pluck('src', 'id') !!};

            $.each(files, function(k, v) {
                var mockFile = { name: "Filename", size: 12345, id: k };
                DZ.emit("addedfile", mockFile);
                DZ.emit("complete", mockFile);
                DZ.createThumbnailFromUrl(mockFile, '/storage/'+v);
                DZ.files.push(mockFile);
            });
            



            $('textarea[name = description]').summernote({
                placeholder: 'Add product description..',
                minHeight: 250,
                toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['Insert', ['picture', 'link', 'table']]
                ]
            });
            
            $('textarea[name = short_description]').summernote({
                placeholder: 'Add product short description..',
                minHeight: 80,
                toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['Insert', ['picture', 'link', 'table']]
                ]
            });
            
            $('#back-btn').on('click', function(){
               var backLink = document.referrer;
               window.location.href = backLink;
            });

            $('#create-product').on('click', function(){
    			var form = $(this).parents('form:first'),
                formData = form.serializeArray();

                $.each(DZ.files, function(k, v) {
                    formData.push({name: "files[]", value: v.id});
                });

    			$.ajax({
    				method: form.attr('method'),
    				url: form.attr('action'),
    				data: formData,
    				error: function() {
    					toastr.error('Some error occurred while creating product', 'Something Error');
    				},
    				success: function(res){
    					toastr.success('New product has created successfully.', 'Product Created');
                        var url = '{{ url('admin/product') }}';

                        window.history.pushState("object or string", "Title", "/admin/product/" + res.id);
                        
                        form.attr('action', url);


                        $('<input>').attr({
                            type: 'hidden',
                            name: '_method',
                            value: 'PUT'
                        }).appendTo(form);


                         window.location.replace(url);

    				}
    			});

    		});


            // $('#attributes').on('change', function() {
            //     var attributes = $(this).val();
            //     $.ajax({
            //         url: "/admin/product/attributes",
            //         type: "POST",
            //         data: {_token: '{{ csrf_token() }}', attributes: attributes },
            //         success: function(res) {
            //             $('.product-attr').html(res);
            //         }
            //     }) 
            // });
    	});
    </script>