<div class="form-group" data-field-name="{{ $name }}">
	@if($label)
		{{ Form::label($name, $label, null, ['class' => 'form-label']) }}
	@endif

	@if(isset($attributes['required']))
		<div class="input-group">
			<div class="input-group-addon required">
				<i class="fa fa-exclamation"></i>
			</div>
	@endif

	@if($type == 'multiselect')
		{!! Form::multiselect($name, $value[0], old($name, $value[1]), $attributes) !!}
	@else
		<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" class="form-control" {!! Html::attributes($attributes) !!}>
	@endif

	@if(isset($attributes['required']))
		</div>
	@endif
</div>