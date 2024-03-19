<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as AuthGate;

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    // public function boot(AuthGate $gate)
    // {
    //     $this->registerPolicies($gate);

    //     $gate->define('isAdmin',function($user){
    //         return $user->role_id =='2';
    //     });
    //     $gate->define('isUser',function($user){
    //         return $user->role_id =='1';
    //     });

    // }
//     public function boot()
// {
//     $this->registerPolicies();

//     // Gate::define('Create Project', function (User $user) {
//     //     return $user->permissions()->where('category', 'Project')->where('title', 'Create Project')->exists();
//     // });
//     // Gate::define('admin-access', function (User $user) {
//     //     return $user->role_id == 1;
//     // });

//     // Gate::define('task-manager-access', function (User $user) {
//     //     return $user->role_id == 2;
//     // });

//     // Gate::define('team-member-access', function (User $user) {
//     //     return $user->role_id == 3;
//     // });

//     // Gate::define('user-access', function (User $user) {
//     //     return $user->role_id == 4;
//     // });

//     Gate::define('create-project', function (User $user) {

//         if ($user->role_id == 1 || $user->role_id == 2) {
//             return true;
//         }
//         return $user->permissions()
//         ->join('permission_categories', 'permissions.per_category_id', '=', 'permission_categories.id')
//         ->where('permission_categories.name', 'Project')
//         ->where('permissions.title', 'Create Project')
//         ->exists();

//         // return $user->permissions()->where('category', 'Project')->where('title', 'Create Project')->exists();
//     });

//     Gate::define('edit-project', function (User $user) {
//         if ($user->role_id == 1 || $user->role_id == 2) {
//             return true;
//         }
//         return $user->permissions()
//         ->join('permission_categories', 'permissions.per_category_id', '=', 'permission_categories.id')
//         ->where('permission_categories.name', 'Project')
//         ->where('permissions.title', 'Edit Project')
//         ->exists();
//         // return  $user->permissions()->where('category', 'Project')->where('title', 'Edit Project')->exists();
//     });
//     Gate::define('delete-project', function (User $user) {
//         if ($user->role_id == 1 || $user->role_id == 2) {
//             return true;
//         }
//         return $user->permissions()
//         ->join('permission_categories', 'permissions.per_category_id', '=', 'permission_categories.id')
//         ->where('permission_categories.name', 'Project')
//         ->where('permissions.title', 'Delete Project')
//         ->exists();
//         // return  $user->permissions()->where('category', 'Project')->where('title', 'Delete Project')->exists();
//     });


//     Gate::define('read-project', function (User $user) {
//     if($user->role_id >= 3){
//         return true;
//     }
//         return  $user->permissions()->where('category', 'Project')->where('title', 'Read Project')->exists();
//     });

//     Gate::define('read-module', function (User $user) {
//         if($user->role_id >= 3){
//             return true;
//         }
//         return $user->permissions()->where('category', 'Module')->where('title', 'Read Module')->exists();
//     });

//     Gate::define('edit-module', function (User $user) {
//         if ($user->role_id == 1 || $user->role_id == 2){
//             return true;
//         }
//         return $user->permissions()
//         ->join('permission_categories', 'permissions.per_category_id', '=', 'permission_categories.id')
//         ->where('permission_categories.name', 'Module')
//         ->where('permissions.title', 'Edit Module')
//         ->exists();
//         // return $user->permissions()->where('category', 'Module')->where('title', 'Edit Module')->exists();
//     });
//     Gate::define('delete-module', function (User $user) {
//         if ($user->role_id == 1 || $user->role_id == 2){
//             return true;
//         }
//         return $user->permissions()
//         ->join('permission_categories', 'permissions.per_category_id', '=', 'permission_categories.id')
//         ->where('permission_categories.name', 'Module')
//         ->where('permissions.title', 'Delete Module')
//         ->exists();
//         // return  $user->permissions()->where('category', 'Module')->where('title', 'Delete Module')->exists();
//     });
//     Gate::define('create-module', function (User $user) {
//         if ($user->role_id == 1 || $user->role_id == 2){
//             return true;
//         }
//         return $user->permissions()
//         ->join('permission_categories', 'permissions.per_category_id', '=', 'permission_categories.id')
//         ->where('permission_categories.name', 'Module')
//         ->where('permissions.title', 'Create Module')
//         ->exists();
//         // return  $user->permissions()->where('category', 'Module')->where('title', 'Create Module')->exists();
//     });



//     Gate::define('create-task', function (User $user) {
//         if($user->role_id == 2 || $user->role_id == 3 ){
//             return true;
//         }
//         return  $user->permissions()->where('category', 'Task')->where('title', 'Create Task')->exists();
//     });


//     Gate::define('read-task', function (User $user) {
//         if($user->role_id >= 3){
//             return true;
//         }
//         return  $user->permissions()->where('category', 'Task')->where('title', 'Read Task')->exists();
//     });
//     Gate::define('edit-task', function (User $user) {
//         if($user->role_id >= 3){
//             return true;
//         }
//         return  $user->permissions()->where('category', 'Task')->where('title', 'Edit Task')->exists();
//     });

//     Gate::define('delete-task', function (User $user) {
//         if($user->role_id >= 3){
//             return true;
//         }
//         return  $user->permissions()->where('category', 'Task')->where('title', 'Delete Task')->exists();
//     });



// }
// public function boot()
// {
//     $this->registerPolicies();

//     Gate::define('has-permission', function ($user, $permission) {
//         if ($user->role === 'admin') {
//             // Check if the permission exists in the database
//             $existingPermission = Permission::where('permission', $permission)->first();

//             // If the permission exists, check if it is assigned to the admin role
//             if ($existingPermission) {
//                 $adminRole = Role::where('role', 'admin')->first();
//                 return $adminRole->permissions->contains($existingPermission);
//             } else {
//                 // If the permission does not exist, deny access
//                 return false;
//             }
//         }

//         // For non-admin users, check if the user's role has the given permission
//         $role = Role::findOrFail($user->role_id);
//         return $role->permissions()->where('permission', $permission)->exists();
//     });
// }
// -------------------final its working------------------------------
public function boot()
{
    $this->registerPolicies();


    Gate::define('has-permission', function ($user, $permission) {
        if ($user->role === 'Super Admin') {
            return true;
        }
        $role = Role::find($user->role_id);
        if ($role) {
            return $role->permissions()->where('permission', $permission)->exists();
        }
        return false;
    });
}
}
