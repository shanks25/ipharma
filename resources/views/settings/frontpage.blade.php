@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h2>Settings <small>Frontpage</small></h2>                    
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>

                    
                <div class="x_content">
                    {{ Form::open(['url' => 'admin/settings', 'class' => 'form-horizontal']) }}
                        
                        @inject('option', 'Epharma\Model\Option')
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Slider Images</label>
                            
                            <div class="col-sm-10">
                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>                        
                                </div>
                            </div>

                            {{-- {{Form::hidden('slider-images[]', $option->valueOf('slider-images')->first()->value, ['id' => 'slider-images'])}} --}}
                        </div>

                        @inject('categories', 'Epharma\Model\Category')

                        <div class="form-group">
                            <label for="popular-category" class="col-sm-2 control-label">Popular Catagories</label>

                            <div class="col-sm-10">
                                @php
                                $dd = [
                                '0' => 5,
                                '1' =>7,
                                '2' =>9
                                ];
                                $popularCategory = $option->valueOf('popular-category')->count() ? json_decode($option->valueOf('popular-category')->first()->value, true) : "";
                                $newArray = array_map(create_function('$value', 'return (int)$value;'), $popularCategory);
                                @endphp
                                <input type="hidden" name="pop_cat" value="9,10"/>
                                {{Form::select('popular-category[]', $categories->pluck('name', 'id'), $newArray, ['class' => 'form-control select2', 'multiple', 'id' => 'popular_category'])}}
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="collections" class="col-sm-2 control-label">Collections</label>
                            
                            <div class="col-sm-10">
                                @php
                                    $collections = $option->valueOf('collections')->count() ? json_decode($option->valueOf('collections')->first()->value, true) : "";
                                    $newArray2 = array_map(create_function('$value', 'return (int)$value;'), $collections);
                                @endphp
                                {{ Form::select('collections[]', $categories->pluck('name', 'id'), $newArray2, ['class' => 'form-control select2', 'multiple', 'id' => 'collections']) }}
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Feature Products</label>
                            
                            <div class="col-sm-10">
                                @php
                                    $featuredProduct = $option->valueOf('featured-product')->count() ? json_decode($option->valueOf('featured-product')->first()->value, true) : "";
                                    $newArray3 = array_map(create_function('$value', 'return (int)$value;'), $featuredProduct);
                                @endphp
                                
                                @inject('product', 'Epharma\Model\Product')
                                {{ Form::select('featured-product[]', $product->findMany($featuredProduct)->pluck('name', 'id'), $newArray3, ['class' => 'form-control select2', 'multiple', 'id' => 'product-search']) }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="announcement" class="col-sm-2 control-label">Announcement</label>
                            <div class="col-sm-10">
                                @php
                                    $announcement = $option->valueOf('announcement')->count() ? $option->valueOf('announcement')->first()->value : "";
                                @endphp
                                
                                {{ Form::text('announcement', $announcement ,['class' => 'form-control']) }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="shipping" class="col-sm-2 control-label">Shipping</label>
                            <div class="col-sm-10">
                                @php
                                    $shipping = $option->valueOf('shipping')->count() ? $option->valueOf('shipping')->first()->value : "";
                                @endphp
                                
                                {{ Form::select('shipping', ['Paid Shipping', 'Free Shipping'], $shipping ,['class' => 'form-control']) }}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Save</button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->



@push('scripts')
    <script>
        $(document).ready(function() {

            $("select#popular_category").select2({
                multiple:true,
                placeholder: "Add Category"
            });
            
            $("select#collections").select2({
                multiple:true,
                placeholder: "Add Collections"
            });

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


            @inject('media', 'Epharma\Model\Media')

            var files = {!! $media->findMany( option('slider-images') )->pluck('src', 'id') !!};

            $.each(files, function(k, v) {
                var mockFile = { name: "Filename", size: 12345, id: k };
                DZ.emit("addedfile", mockFile);
                DZ.emit("complete", mockFile);
                DZ.createThumbnailFromUrl(mockFile, '/storage/'+v);
                DZ.files.push(mockFile);
            });

            $('form').on('submit', function(e) {
                var form = $(this);
                $.each(DZ.files, function(key, value) {
                    var input = $("<input>")
                        .attr("type", "hidden")
                        .attr("name", "slider-images[]").val(value.id);
                    form.append($(input));
                });
            });


            var productSearchSelect2 = $("#product-search").select2({
                placeholder: "Add Products",
                width: 'element',
                ajax: {
                    placeholder: "Select Product",
                    url: "../product-list",
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
                            results: data.data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: function(product) {
                    return product.name;
                }, 
                templateSelection: function(product) {
                    if (product.id === '') {
                        return 'Select Product';
                    }
                    return product.text || product.name;                    
                }
            });

        });
    </script>
@endpush



@include('layouts.footer')