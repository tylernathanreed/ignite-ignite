<?php $name = "transactions[{$index}]"; ?>

<tr>
	<td rel="charged_at" width="150px">
		{!! Form::date("{$name}[charged_at]", $transaction->charged_at, ['class' => 'form-control']) !!}
	</td>

	<td rel="paid_for" width="20%">
		{!! Form::select("{$name}[paid_for][]", $payors, [$transaction->account->payor->id], [
			'class'       => 'form-control',
			'multiple'    => 'multiple',
			'data-toggle' => 'multiselect',
			'required'    => 'required'
		]) !!}
	</td>

	<td rel="description">
		{!! Form::text("{$name}[description]", $transaction->description, ['class' => 'form-control', 'required' => 'required']) !!}
	</td>

	<td rel="amount" width="200px">
		<div class="input-group">
			<span class="input-group-addon">$</span>
			{!! Form::number("{$name}[amount]", $transaction->amount / 100, ['class' => 'form-control', 'required' => 'required']) !!}
		</div>
	</td>
</tr>