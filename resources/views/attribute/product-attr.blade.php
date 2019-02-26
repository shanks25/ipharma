<div class="form-group">
	{{ Form::label('type', $title, ['class' => 'col-sm-4']) }}
	<div class="col-sm-8">
		@if($type == 'Select')


			{{ Form::select('attr_'.$id, collect($options)->pluck('title', 'id'), collect($eav)->pluck('option_id')->toArray(), ['class' => 'form-control']) }}

		@elseif($type == 'Multiselect')

			{{ Form::select('attr_'.$id.'[]', collect($options)->pluck('title', 'id'), collect($eav)->pluck('option_id')->toArray(), ['class' => 'form-control', 'multiple']) }}

		@else

			{{ Form::text('attr_text_'.$id, $eav[0]['value'], ['class' => 'form-control']) }}

		@endif
	</div>
</div>