<?php

namespace App\Transformers\Budget;

use App\Models\Budget\Account;
use App\Support\Transformation\Transformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AccountTransformer extends Transformer
{
	/**
	 * Untransfroms the specified Data into an Object.
	 *
	 * @param  array  $data
	 *
	 * @return \App\Models\Budget\Transaction
	 */
	public function untransform($data)
	{
		// Determine the Account Details
		$name = $data['Account Name'];
		$number = substr($data['Account Number'], -4);
		$type = $data['Account Type'];

		$details = compact('name', 'number', 'type');

		// Find the Account
		try {
			return Account::where($details)->firstOrFail();
		}
		catch(ModelNotFoundException $ex) {
			throw new ModelNotFoundException(sprintf('Could not find [%s] using %s.', Account::class, json_encode($details)), 0, $ex);
		}
	}
}