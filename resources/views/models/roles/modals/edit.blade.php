@extends('components.layouts.modal', [
	'route' => 'roles.update',
	'params' => [ $role->id ],
	'target' => '#roles-wrapper'
])

@section('modal.heading')
	<i class="fa fa-puzzle-piece"></i>
	<span>Update <b>Role</b> <i>{{ $role->display_name }}</i></span>
@endsection

@section('modal.body')

	{!! Form::group('text', 'display_name', 'Display Name', $role->display_name, ['required' => true]) !!}
	{!! Form::group('text', 'system_name',  'System Name',  $role->system_name,  ['required' => true]) !!}
	{!! Form::group('multiselect', 'permissions[]',  'Permissions',  [Factory::permissions()->select(), $role->permissions->pluck('system_name')->all()],  ['required' => true]) !!}

@endsection