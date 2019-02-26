@include('layouts.header')
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('select2/select2.min.css')}}">
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

{{csrf_field()}}	
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4">	
        @if ($errors)
        @foreach ($errors->all() as $error)
        	{{$error}}
        @endforeach
        		 
        		@endif	
                @include('includes.messages')	
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
                                {{ Form::select('type', ['Simple', 'Grouped', 'Veriable'], null, ['class' => 'form-control','required']) }}
                            </div>
                        </div>-->

                        <div class="form-group">
                            {{ Form::label('Price', null, ['class' => 'col-sm-4', 'style' => 'line-height:35px;']) }}
                            <div class="col-sm-8">
                                {{ Form::text('price', null, ['class' => 'form-control' ,'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Regular Price', null, ['class' => 'col-sm-4', 'placeholder' => 'BDT']) }}
                            <div class="col-sm-8">
                                {{ Form::text('regular_price', null, ['class' => 'form-control', 'placeholder' => '' ,'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Sale Price', null, ['class' => 'col-sm-4', 'placeholder' => 'BDT']) }}
                            <div class="col-sm-8">
                                {{ Form::text('sale_price', null, ['class' => 'form-control', 'placeholder' => '' ,'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Discount In Amount', null, ['class' => 'col-sm-4', 'placeholder' => 'BDT']) }}
                            <div class="col-sm-8">
                                {{ Form::text('discount_amount', null, ['class' => 'form-control', 'placeholder' => '100' ,'required']) }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('Discount In Percentage', null, ['class' => 'col-sm-4', 'placeholder' => 'BDT']) }}
                            <div class="col-sm-8">
                                {{ Form::text('discount_percentage', null, ['class' => 'form-control', 'placeholder' => '5' ,'required'])}}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Stock', null, ['class' => 'col-sm-4', 'style' => 'line-height:35px;']) }}
                            <div class="col-sm-8">
                                {{ Form::select('is_available', ['Not Available', 'Available'], null, ['class' => 'form-control','required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Origin', null, ['class' => 'col-sm-4', 'style' => 'line-height:35px;']) }}
                            <div class="col-sm-8">
                                {{ Form::select('origin', ['Local', 'Foreign'], null, ['class' => 'form-control' ,'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Minimum Quantity', null, ['class' => 'col-sm-4']) }}
                            <div class="col-sm-8">
                                {{ Form::text('min_quantity', null, ['class' => 'form-control']) }}
                            </div>
                        </div>

						
                        <div class="form-group">
                            {{ Form::label('type2', null, ['class' => 'col-sm-4', 'style' => 'line-height:35px;']) }}
                            <div class="col-sm-8 " class="form-group">
                            	<select name="type2" class="form-group" id="">
                               <option value="seasonal">Seasonal</option>
 								 <option value="featured">Featured</option>
 								 </select>
                            </div>
                        </div>
    <div class="form-group">
                        <label>Select Tags</label>
            <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a tag" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
             @foreach($tags as $tag)
             

             <option value="{{$tag->id}}">{{$tag->name}} </option>
             @endforeach
           </select>
                </div>



 						<div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                            	<button type="submit">submit</button>
                                {{-- <a id="create-product" class="btn btn-primary btn-block">Save</a> --}}
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
                            <option value="{{$val->id}}">{{$val->name}}</option>
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

                    <div class="form-control">
                        <div class="fallback">

                            <input name="file" type="file" required=""> 
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









</form>
<script type="text/javascript" src="{{ asset('select2/select2.full.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(".select2").select2();


  } ); 
</script> 

@include('layouts.footer')