{!! Form::select($name, $values, $selected, array_merge([
	'class'            => 'form-control',
	'multiple'         => 'multiple',
	'data-toggle'      => 'multiselect',
	'data-placeholder' => ' '
], $attributes)) !!}