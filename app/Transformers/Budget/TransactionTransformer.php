<?php

namespace App\Transformers\Budget;

use Carbon\Carbon;
use App\Models\Budget\Account;
use App\Models\Budget\Transaction;
use App\Support\Transformation\Transformer;

class TransactionTransformer extends Transformer
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
		// Determine the Account from the Data
		$account = $this->adapter->untransform(Account::class, $data);

		// Create a new Transaction
		$transaction = new Transaction;

		// Assign the Attributes
		$transaction->charged_at = Carbon::parse($data['Settlement Date']);
		$transaction->amount = (int) ($data['Amount USD'] * -100);
		$transaction->description = $this->description($data['Description']);
		$transaction->original_description = $data['Description'];

		// Associate the Transaction
		$transaction->account()->associate($account);

		// Return the Transaction
		return $transaction;
	}

	/**
	 * Parses the Original Description to retrieve a Human Friendly Description.
	 *
	 * @param  string  $description
	 *
	 * @return string
	 */
	public function description($description)
	{
		return $description;
	}
}