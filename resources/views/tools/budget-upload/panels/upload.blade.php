@extends('components.layouts.box', [
	'name' => 'budget-upload'
])

@section('box.form.budget-upload')

	{!! Form::open([
		'url' => route('tools.budget-upload.upload'),
		'enctype' => 'multipart/form-data'
	]) !!}

@endsection

@section('box.heading.budget-upload')
	<i class="fa fa-money"></i> Budget Upload
@endsection

@section('box.body.budget-upload')

	<div class="form-group{{ has_error('upload_file') }}">
		{!! Form::label('upload_file', 'Upload File:', ['class' => 'control-label']) !!}
		{!! Form::file('upload_file') !!}
		@error('upload_file')
	</div>

@endsection

@section('box.footer.budget-upload')

	<div class="pull-right">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-upload"></i> Upload
		</button>
	</div>

@endsection