<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Model Factories
	|--------------------------------------------------------------------------
	|
	| This array of maps Models to their respective Factories. The Factories
	| themselves do not need a Model instance or class, and therefore are
	| just aliased by whatever name you give them.
	|
	*/

	'factories' => [

		'permissions' => App\Factories\PermissionFactory::class,
		'roles'       => App\Factories\RoleFactory::class

	]

];