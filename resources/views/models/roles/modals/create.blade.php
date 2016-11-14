@extends('components.layouts.modal', [
	'route'  => 'roles.store',
	'target' => '#roles-wrapper'
])

@section('modal.heading')
	<i class="fa fa-puzzle-piece"></i>
	<span>Create New <b>Role</b></span>
@endsection

@section('modal.body')

	{!! Form::group('text', 'display_name', 'Display Name', '', ['required' => true]) !!}
	{!! Form::group('text', 'system_name',  'System Name',  '', ['required' => true]) !!}
	{!! Form::group('multiselect', 'permissions[]',  'Permissions',  [Factory::permissions()->select(), []],  ['required' => true]) !!}

@endsection