<?php

namespace App\Http\Controllers\Models;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Determine the Roles
        $roles = Role::with('permissions')->get();

        // Display the Index View
        return view('models.roles.index', compact('roles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function panel()
    {
        // Determine the Roles
        $roles = Role::all();

        // Display the Index View
        return view('models.roles.partials.panel', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display the Create View
        return view('models.roles.modals.create');
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
            'system_name'  => 'required|unique:roles',
        ]);

        // Create a new Role
        $role = Role::create($request->only([
            'display_name', 'system_name'
        ]));

        // Sync the Permissions
        $role->permissions = $request->permissions;

        // Return the Response
        return $this->panel();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('models.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('models.roles.modals.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role          $role
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Validate the Request
        $this->validate($request, [
            'display_name' => 'required',
            'system_name'  => 'required|unique:roles,system_name,' . $role->id,
        ]);

        // Update the Role
        $role->fill($request->only([
            'display_name', 'system_name'
        ]))->save();

        // Sync the Permissions
        $role->permissions = $request->permissions;

        // Return the Response
        return view('models.roles.components.teaser', compact('role'));
    }

    /**
     * Display the Destruction Confirmation to the User.
     *
     * @param  \App\Models\Role  $role
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Role $role)
    {
        return view('models.roles.modals.delete', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Remember the ID
        $id = $role->id;

        // Delete the Role
        $role->delete();

        // Return the Response
        return $this->panel();
    }
}
