<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('role-permission.role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $permissions = Permission::all();
        return view('role-permission.role.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name'
        ]);


        $role->name = $request->input('name');
        $role->givePermissionTo($request->input('permission'));

        # check if the role already exists
        // if ($role->exists) {
        //     return redirect()->back()->with('error', 'Role already exists');
        //     }
        //     # save the role
        //     // $role->save();

        //     # assign the permissions to the role
        //     $role->givePermissionTo($request->input('permission'));
        //     return redirect()->route('role.index')->with('success', 'Role created successfully');


        # assign the permissions to the role
        // if(!empty($request->permission)){
        //     // $role->syncPermissions($request->permission);
        //     foreach ($request->permission as $name) {
        //         $role->givePermissionTo($name);
        //     }
        // }
        // else{
        //     return redirect()->back()->with('error', 'Please select at least one permission');
        // }

        $role->save();
        return redirect('role')->with('success', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

        $permissions = Permission::all();
        # get permission on role
        $hasPermissions = $role->permissions->pluck('name');
        return view('role-permission.role.edit', [
            'role' => $role,
            'hasPermissions' => $hasPermissions,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {

        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id,
            ],
        ]);

        $role->update([
            'name' => $request->name
        ]);

        if (!empty($request->permission)) {
            // $role->givePermissionTo($request->permission);

            $role->syncPermissions($request->permission);
        } else {
            // $role->permissions()->detach();
            $role->syncPermissions([]);
        }

        // $role->syncPermissions($request->permission);
        // $role->givePermissionTo($request->input('permission'));

        return redirect('role')->with('success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {

        if ($role == null) {
            session()->flash('error', 'Role not Found');
            return response()->json(['status' => false]);
        }


        // $role->permissions()->detach($role);


        // $permission->removeRole($role);
        $permission = Permission::get();
        // $permission->detach($role);
        $role->revokePermissionTo($permission);
        $role->delete();

        session()->flash('success', 'Role Deleted successfully');

        // return response()->json(['status' => true]);

        return redirect('role')->with('success', 'Role Deleted Successfully');
    }

    public function addPermissionRole(Role $role)
    {

        $permissions = Permission::get();
        return view(
            'role-permission.role.add-permission',
            [
                'role' => $role,
                'permissions' => $permissions
            ]
        );
    }
    public function givePermissionRole(Request $request, $role)
    {

        // validation
        $request->validate([
            'permission' => 'required'
        ]);


        $roles = Role::findOrFail($role);
        // return $roles;
        // $roles->permissions()->sync($request->permission);
        $roles->syncPermissions($request->permission);


        return redirect('role')->with('success', 'Permission added to Role');
        // return redirect()->back()->with('status', 'Permission added to Role');

    }
}
