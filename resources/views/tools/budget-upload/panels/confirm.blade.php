@extends('components.layouts.box', [
	'name' => 'budget-upload-confirm'
])

@section('box.form.budget-upload-confirm')

	{!! Form::open([
		'url' => route('tools.budget-upload.save'),
	]) !!}

@endsection

@section('box.heading.budget-upload-confirm')
	<i class="fa fa-money"></i> Confirm Budget Upload
@endsection

@section('box.body.budget-upload-confirm')

	<?php $transactions = old('transactions', Session::get('uploads.transactions')); ?>
	<?php $payors = App\Models\Budget\Payor::all()->pluck('first_name', 'id')->all(); ?>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label(null, 'Paid By:', ['class' => 'control-label']) !!}
				{!! Form::text(null, $transactions[0]->account->payor->first_name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
			</div>
		</div>
	</div>

	<input type="hidden" name="account" value="{{ $transactions[0]->account->id }}">

	<table id="transactions" class="table table-striped table-hover">
		<thead>
			<tr>
				<th width="150px">Charged At</th>
				<th width="20%">Paid For</th>
				<th>Description</th>
				<th width="200px">Amount</th>
			</tr>
		</thead>

		@foreach($transactions as $index => $transaction)
			@include('tools.budget-upload.components.transaction')
		@endforeach
	</table>

@endsection

@section('box.footer.budget-upload-confirm')

	<div class="pull-right">
		<button type="submit" class="btn btn-primary">
			<i class="fa fa-check"></i> Save
		</button>
	</div>

@endsection