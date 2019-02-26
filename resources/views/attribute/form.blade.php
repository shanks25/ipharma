<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Attribute Title</label>
    <div class="col-sm-8">
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Attribute Title']) }}
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
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

    <div class="form-group">

        <div class="col-sm-offset-2 col-sm-8">
            {{ Form::text('options[]', null, ['class' => 'form-control']) }}
        </div>                                
    
    </div>
    
</div>



<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-default">Save</button>
    </div>
</div>
