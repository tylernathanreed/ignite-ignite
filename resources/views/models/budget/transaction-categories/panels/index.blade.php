@extends('components.layouts.box', [
	'name' => 'transaction-categories'
])

@section('box.heading.transaction-categories')
	<i class="fa fa-sitemap"></i> Transaction Categories
@endsection

@section('box.tools.transaction-categories')
	<a href="{{ route('transaction-categories.create') }}" data-toggle="modal" data-target="#modal" data-remote="false">
		<button type="button" class="btn btn-box-tool text-primary">
			<i class="fa fa-plus-circle"></i>
		</button>
	</a>
@endsection

@section('box.body.transaction-categories')
	<table id="transaction-categories" class="table table-striped table-hover" data-toggle="data-table">
		<thead>
			<tr>
				<th>Display Name</th>
				<th>System Name</th>
				<th class="text-center no-sort">Actions</th>
			</tr>
		</thead>

		@foreach($categories as $category)
			@include('models.budget.transaction-categories.components.teaser')
		@endforeach
	</table>
@endsection