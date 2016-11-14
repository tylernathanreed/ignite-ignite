@section('modal.form')

	{!! Form::model($category, [
		'url' => route('transaction-categories.update', $category->id),
		'data-ajax-post' => 'true',
		'data-ajax-method' => 'PATCH',
		'data-ajax-success' => 'success'
	]) !!}

@endsection

@section('modal.heading')
	<i class="fa fa-sitemap"></i> <span>Update <b>Transaction Category</b> <i>{{ $category->display_name }}</i></span>
@endsection

@section('modal.body')

	{!! Form::group('text', 'display_name', 'Display Name', null, ['required' => true]) !!}
	{!! Form::group('text', 'system_name',  'System Name',  null,  ['required' => true]) !!}

@endsection