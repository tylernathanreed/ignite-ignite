<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Transformation Matricies
    |--------------------------------------------------------------------------
    |
    | This is where each of the matricies for the application are defined.
    | Simple key the name of the matrix will all of its mappings as the
    | value. Any object can be mapped, not just Models. Try it out!
    |
    */
	'matricies' => [

		'budget' => [

            App\Models\Budget\Account::class     => App\Transformers\Budget\AccountTransformer::class,
			App\Models\Budget\Transaction::class => App\Transformers\Budget\TransactionTransformer::class

		]

	]

];