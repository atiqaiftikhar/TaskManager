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

    $role = Role::with('permissions')->findOrFail($roleId);

    $permissions = Permission::all();


    $permission_categories = PermissionCategory::with('permissions')->get();


    // dd($permission_categories->toArray());
    $selectedPermissions = $role->permissions->pluck('id')->toArray();

    return view('admin.rolepermission.create', compact('role', 'permissions', 'permission_categories', 'selectedPermissions'));
}
// public function addrolepermission($roleId)
// {
//     // Find the role and eager load its permissions
//     $role = Role::with('permissions')->findOrFail($roleId);

//     // Get all permissions
//     $permissions = Permission::all();

//     // Get permission categories with their associated permissions
//     $permission_categories = PermissionCategory::with('permissions')->get();

//     // Extract the IDs of selected permissions for the role
//     $selectedPermissions = $role->permissions->pluck('id')->toArray();

//     // If the role is admin, set all permissions as selected
//     if ($role->role === 'admin') {
//         $selectedPermissions = $permissions->pluck('id')->toArray();
//     }

//     return view('admin.rolepermission.create', compact('role', 'permissions', 'permission_categories', 'selectedPermissions'));
// }

// public function addrolepermission($roleId)
// {
//     $role = Role::with('permissions')->findOrFail($roleId);
//     $permissions = Permission::all();
//     $permission_categories = PermissionCategory::with('permissions')->get();
//     $selectedPermissions = $role->permissions->pluck('id')->toArray();

//     // Array defining project permissions and their dependency on "Read Project"
//     $projectPermissions = [
//         'Create Project' => 'Read Project',
//         'Edit Project' => 'Read Project',
//         'Delete Project' => 'Read Project',
//         'Update Project' => 'Read Project',
//         'Read Project' => null, // No need to check for a corresponding "Read" permission
//     ];

//     // Check if any project permission is selected other than "Read Project"
//     $readProjectSelected = false;
//     foreach ($selectedPermissions as $selectedPermission) {
//         if ($selectedPermission !== 'Read Project' && array_key_exists($selectedPermission, $projectPermissions)) {
//             $readProjectSelected = true;
//             break;
//         }
//     }

//     // If any project permission is selected other than "Read Project", include "Read Project"
//     if ($readProjectSelected && !in_array('Read Project', $selectedPermissions)) {
//         $selectedPermissions[] = 'Read Project';
//     }
// // Array defining user permissions and their dependency on "Read User"
// $userPermissions = [
//     'Create User' => 'Read User',
//     'Edit User' => 'Read User',
//     'Delete User' => 'Read User',
//     'Update User' => 'Read User',
//     'Read User' => null, // No need to check for a corresponding "Read" permission
// ];

// // Check if any user permission is selected other than "Read User"
// $readUserSelected = false;
// foreach ($selectedPermissions as $selectedPermission) {
//     if ($selectedPermission !== 'Read User' && array_key_exists($selectedPermission, $userPermissions)) {
//         $readUserSelected = true;
//         break;
//     }
// }

// // If any user permission is selected other than "Read User", include "Read User"
// if ($readUserSelected && !in_array('Read User', $selectedPermissions)) {
//     $selectedPermissions[] = 'Read User';
// }
//     // Similarly, add logic for task and user permissions here

//     return view('admin.rolepermission.create', compact('role', 'permissions', 'permission_categories', 'selectedPermissions'));
// }

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


    // public function store(Request $request, $roleId)
    // {
    //     $role = Role::find($roleId);
    //     if (!$role) {
    //         abort(404);
    //     }

    //     // Get all permissions
    //     $permissions = Permission::all()->pluck('id')->toArray();

    //     // If the role is admin, set all permissions as selected
    //     if ($role->role === 'admin') {
    //         $request->validate([
    //             'permissions' => 'array',
    //         ]);
    //         $permissions = $request->input('permissions', $permissions);
    //     } else {
    //         $request->validate([
    //             'permissions' => 'required|array',
    //         ]);
    //         $permissions = $request->input('permissions');
    //     }

    //     // Delete existing role permissions
    //     RolePermission::where('role_id', $roleId)->delete();

    //     // Insert selected role permissions
    //     $rolePermissions = [];
    //     foreach ($permissions as $permission) {
    //         $rolePermissions[] = [
    //             'role_id' => $roleId,
    //             'permission_id' => $permission,
    //         ];
    //     }
    //     RolePermission::insert($rolePermissions);

    //     return redirect()->route('rolepermission.index')->with('success', 'Permissions assigned to users with the role.');
    // }

    public function store(Request $request, $roleId)
    {
        $role = Role::find($roleId);
        if (!$role) {
            abort(404);
        }

        $permissions = $request->permissions;


        RolePermission::where('role_id', $roleId)->delete();


        if (!empty($permissions)) {

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

        return redirect()->route('rolepermission.index')->with('success', 'Permissions assigned to users with the role.');
    }



}
