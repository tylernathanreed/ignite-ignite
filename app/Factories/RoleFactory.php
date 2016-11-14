<?php

namespace App\Factories;

use App\Models\Role;

class RoleFactory
{
	public function select()
	{
		return Role::pluck('display_name', 'system_name')->all();
	}
}