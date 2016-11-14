<?php

namespace App\Http\Controllers\Models;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Determine the Permissions
        $permissions = Permission::all();

        // Display the Index View
        return view('models.permissions.index', compact('permissions'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function panel()
    {
        // Determine the Permissions
        $permissions = Permission::all();

        // Display the Index View
        return view('models.permissions.partials.panel', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display the Create View
        return view('models.permissions.modals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the Request
        $this->validate($request, [
            'display_name' => 'required',
            'system_name'  => 'required|unique:permissions',
            'system_group' => 'required',
        ]);

        // Create a new Permission
        $permission = Permission::create($request->only([
            'display_name', 'system_name', 'system_group'
        ]));

        // Return the Response
        return $this->panel();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('models.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('models.permissions.modals.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission    $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        // Validate the Request
        $this->validate($request, [
            'display_name' => 'required',
            'system_name'  => 'required|unique:permissions,system_name,' . $permission->id,
            'system_group' => 'required',
        ]);

        // Update the Permission
        $permission->fill($request->only([
            'display_name', 'system_name', 'system_group'
        ]))->save();

        // Return the Response
        return view('models.permissions.components.teaser', compact('permission'));
    }

    /**
     * Display the Destruction Confirmation to the User.
     *
     * @param  \App\Models\Permission  $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Permission $permission)
    {
        return view('models.permissions.modals.delete', compact('permission'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // Remember the ID
        $id = $permission->id;

        // Delete the Permission
        $permission->delete();

        // Return the Response
        return $this->panel();
    }
}
