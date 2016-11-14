@extends('components.layouts.box', [
	'name' => 'permissions'
])

@section('box.heading.permissions')
	<i class="fa fa-key"></i> Permissions
@endsection

@section('box.tools.permissions')
	<a href="{{ route('permissions.create') }}" data-toggle="modal" data-target="#modal" data-remote="false">
		<button type="button" class="btn btn-box-tool text-primary">
			<i class="fa fa-plus-circle"></i>
		</button>
	</a>
@endsection

@section('box.body.permissions')
	<div id="permissions-wrapper">
		<table id="permissions" class="table table-striped table-hover" data-toggle="data-table">
			<thead>
				<tr>
					<th>Category</th>
					<th>Display Name</th>
					<th>System Name</th>
					<th class="text-center no-sort">Actions</th>
				</tr>
			</thead>

			@foreach($categories as $category)
				@foreach($category->permissions as $permission)
					@include('models.permissions.components.teaser', compact('category', 'permission'))
				@endforeach
			@endforeach
		</table>
	</div>
@endsection