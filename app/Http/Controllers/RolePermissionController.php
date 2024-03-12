<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionCategory;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function index()
    {

     $roles=Role::get();



     return view('admin.rolepermission.index',compact('roles'));


    }
    public function addrolepermission($roleId)
{
    // Find the role and eager load its permissions
    $role = Role::with('permissions')->findOrFail($roleId);

    // Get all permissions
    $permissions = Permission::all();

    // Get permission categories with their associated permissions
    $permission_categories = PermissionCategory::with('permissions')->get();

    // Extract the IDs of selected permissions for the role
    $selectedPermissions = $role->permissions->pluck('id')->toArray();

    return view('admin.rolepermission.create', compact('role', 'permissions', 'permission_categories', 'selectedPermissions'));
}
    // public function store(Request $request, $roleId)
    // {


    //     $role = Role::find($roleId);
    //     if(!$role){
    //         abort(404);
    //     }
    //     $permissions=$request->permissions;

    //     RolePermission::where('role_id',$roleId)->delete();
    //     $role_users=User::where('role_id',$roleId)->pluck('id');


    //     if(count($permissions) > 0){


    //         foreach($permissions as $permission){
    //             $per['role_id']=$roleId;
    //             $per['permission_id']=$permission;
    //             RolePermission::create($per);

    //         }
    //     }
    //     return redirect()->back()->with('SUCCESS','Permissions Updated Successfully!');


    //     return redirect()->route('rolepermission.index')->with('success', 'Permissions assigned to users with the role.');
    // }
    public function store(Request $request, $roleId)
{
    $role = Role::find($roleId);
    if (!$role) {
        abort(404);
    }

    $permissions = $request->permissions;


    if (!empty($permissions)) {

        RolePermission::where('role_id', $roleId)->delete();

        // Prepare data for bulk insertion
        $rolePermissions = [];
        foreach ($permissions as $permission) {
            $rolePermissions[] = [
                'role_id' => $roleId,
                'permission_id' => $permission,
            ];
        }

        // Bulk insert the new role permissions
        RolePermission::insert($rolePermissions);
    }

    // return redirect()->back()->with('success', 'Permissions Updated Successfully!');
    return redirect()->route('rolepermission.index')->with('success', 'Permissions assigned to users with the role.');
}

}
