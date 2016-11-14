@extends('components.layouts.box', [
	'name' => 'roles'
])

@section('box.heading.roles')
	<i class="fa fa-puzzle-piece"></i> Roles
@endsection

@section('box.tools.roles')
	<a href="{{ route('roles.create') }}" data-toggle="modal" data-target="#modal" data-remote="false">
		<button type="button" class="btn btn-box-tool text-primary">
			<i class="fa fa-plus-circle"></i>
		</button>
	</a>
@endsection

@section('box.body.roles')
	<div id="roles-wrapper">
		<table id="roles" class="table table-striped table-hover" data-toggle="data-table">
			<thead>
				<tr>
					<th>Display Name</th>
					<th>System Name</th>
					<th>Permissions</th>
					<th class="text-center no-sort">Actions</th>
				</tr>
			</thead>

			@foreach($roles as $role)
				@include('models.roles.components.teaser', compact('role'))
			@endforeach
		</table>
	</div>
@endsection