@extends('partials.layouts.context-menu')

@section('context-menu.heading')
	<i class="fa fa-puzzle-piece"></i> Roles
@endsection

@section('context-menu.content')
	<a href="{{ route('roles.create') }}" data-toggle="modal" data-target="#modal" data-remote="false">
		<i class="fa fa-plus-circle"></i> Create Role
	</a>
@endsection