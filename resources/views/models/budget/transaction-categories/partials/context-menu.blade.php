@extends('partials.layouts.context-menu')

@section('context-menu.heading')
	<i class="fa fa-sitemap"></i> Transaction Categories
@endsection

@section('context-menu.content')
	<li>
		<a href="{{ route('transaction-categories.create') }}" data-toggle="modal" data-target="#modal" data-remote="false">
			<i class="fa fa-plus-circle"></i> Create Transaction Category
		</a>
	</li>
@endsection