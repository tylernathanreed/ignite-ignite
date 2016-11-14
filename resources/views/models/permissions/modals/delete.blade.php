@extends('components.layouts.modal', [
	'route'  => 'permissions.destroy',
	'params' => [ $permission->id ],
	'target' => '#permissions-wrapper'
])

@section('modal.heading')
	<i class="fa fa-key"></i>
	<span>Delete <b>Permission</b> <i>{{ $permission->display_name }}</i>?</span>
@endsection

@section('modal.body')

	Are you sure you want to do that?

@endsection

@section('modal.footer')

	<button type="submit" class="btn btn-primary" ajax-form="#modal-form" ajax-success="success">Delete</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

@endsection