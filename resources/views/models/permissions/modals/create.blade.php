@extends('components.layouts.modal', [
	'route'  => 'permissions.store',
	'target' => '#permissions-wrapper'
])

@section('modal.heading')
	<i class="fa fa-key"></i>
	<span>Create New <b>Permission</b></span>
@endsection

@section('modal.body')

	{!! Form::group('text', 'display_name', 'Display Name', '', ['required' => true]) !!}
	{!! Form::group('text', 'system_name',  'System Name',  '', ['required' => true]) !!}
	{!! Form::group('text', 'system_group', 'System Group', '', ['required' => true]) !!}
	{!! Form::group('multiselect', 'roles[]',  'Roles',  [Factory::roles()->select(), []],  ['required' => true]) !!}

@endsection