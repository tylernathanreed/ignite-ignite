@extends('partials.layouts.context-menu')

@section('context-menu.heading')
	<i class="fa fa-key"></i> Permissions
@endsection

@section('context-menu.content')
	<a href="{{ route('permissions.create') }}" data-toggle="modal" data-target="#modal" data-remote="false">
		<i class="fa fa-plus-circle"></i> Create Permission
	</a>
@endsection