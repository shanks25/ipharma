@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Product Attribute</h3>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <div class="x_content">

                    {{ Form::model($attribute, ['url' => 'admin/attribute/'.$attribute->id, 
                    'class' => 'form-horizontal', 
                    'method' => 'put']) }}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Attribute Title</label>
                            <div class="col-sm-8">
                                {{ Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Attribute Title']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-8">

                                @php
                                    $attribute_types = ['Text', 'Select', 'Multiselect'];
                                @endphp
                            
                                {{Form::select('type', array_combine($attribute_types, $attribute_types), null, ['class' => 'form-control'])}}
                            </div>
                        </div>


                        
                        

                        <div id="attribute-options">
                            
                            <hr>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Attribute Options : </label>
                                
                                <div class="col-sm-2">
                                    <a href="#" class="btn btn-sm" id="add-option">Add Option</a>
                                </div>
                            </div>


                            @foreach($attribute->options as $option)
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        {{ Form::text('options[]', $option->title, ['class' => 'form-control']) }}
                                    </div>            
                                </div>
                            @endforeach
                            
                        </div>



                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-default">Save</button>
                            </div>
                        </div>
                    {{Form::close()}}
                        
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
    	$(document).ready(function() {

            var template = Handlebars.compile($("#option-template").html());
            var html    = template({});


            var attrDiv = $("#attribute-options");

            $("#add-option").on('click', function(e) {
                e.preventDefault();
                attrDiv.append(html);
            });


            if ( $.inArray( $("select[name=type]").val(), ['Select', 'Multiselect']) > -1 ) {
                attrDiv.find('input[type=text]').prop('disabled', false);
                attrDiv.show();
            }else{
                attrDiv.hide();
                attrDiv.find('input[type=text]').prop('disabled', true);
            }


            $("select[name=type]").on('change', function() {
                    
                if ( $.inArray( $(this).val(), ['Select', 'Multiselect']) > -1 ) {
                    attrDiv.find('input[type=text]').prop('disabled', false);
                    attrDiv.show();
                }else{
                    attrDiv.hide();
                    attrDiv.find('input[type=text]').prop('disabled', true);
                }

            });

            
    	});
    </script>

    <script id="option-template" type="text/x-handlebars-template">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                {{ Form::text('options[]', null, ['class' => 'form-control']) }}
            </div>            
        </div>
    </script>
@endpush



@include('layouts.footer')