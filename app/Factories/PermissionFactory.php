<?php

namespace App\Factories;

use App\Models\Permission;

class PermissionFactory
{
	public function select()
	{
		return Permission::categories()->keyBy('name')->map(function($category) {
			return $category->permissions->pluck('name', 'system_name')->all();
		})->all();
	}
}