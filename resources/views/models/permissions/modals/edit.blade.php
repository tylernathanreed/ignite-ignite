@extends('components.layouts.modal', [
	'route' => 'permissions.update',
	'params' => [ $permission->id ],
	'target' => '#permission-' . $permission->id
])

@section('modal.heading')
	<i class="fa fa-key"></i>
	<span>Update <b>Permission</b> <i>{{ $permission->display_name }}</i></span>
@endsection

@section('modal.body')

	{!! Form::group('text', 'display_name', 'Display Name', $permission->display_name, ['required' => true]) !!}
	{!! Form::group('text', 'system_name',  'System Name',  $permission->system_name,  ['required' => true]) !!}
	{!! Form::group('text', 'system_group', 'System Group', $permission->system_group, ['required' => true]) !!}
	{!! Form::group('multiselect', 'roles[]',  'Roles',  [Factory::roles()->select(), $permission->roles->pluck('system_name')->all()],  ['required' => true]) !!}
@endsection