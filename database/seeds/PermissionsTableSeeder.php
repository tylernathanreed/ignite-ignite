<?php

use App\Models\Permission;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the Default Permissions
        $this->group('Permissions', [
        	['display_name' => 'Index',  'system_name' => 'permissions_index'],
        	['display_name' => 'Create', 'system_name' => 'permissions_create'],
        	['display_name' => 'Edit',   'system_name' => 'permissions_edit'],
        	['display_name' => 'Delete', 'system_name' => 'permissions_delete'],
        ]);

        $this->group('Roles', [
        	['display_name' => 'Index',  'system_name' => 'roles_index'],
        	['display_name' => 'Create', 'system_name' => 'roles_create'],
        	['display_name' => 'Edit',   'system_name' => 'roles_edit'],
        	['display_name' => 'Delete', 'system_name' => 'roles_delete'],
        ]);
    }

    /**
	 * Creates a new Permission using the specified Information.
	 *
	 * @param  string  $display_name
	 * @param  string  $system_name
	 * @param  string  $system_group
	 *
	 * @return \App\Models\Permission
	 */
    protected function permission($display_name, $system_name, $system_group)
    {
    	return Permission::create(compact('display_name', 'system_name', 'system_group'));
    }

    /**
     * Creates several Permissions using the same System Group.
     *
     * @param  string  $system_group
     * @param  array   $permissions
     *
     * @return array
     */
    protected function group($system_group, $permissions)
    {
    	$group = [];

    	foreach($permissions as $permission)
    		$group[] = $this->permission(Arr::get($permission, 'display_name'), Arr::get($permission, 'system_name'), $system_group);

    	return $group;
    }
}