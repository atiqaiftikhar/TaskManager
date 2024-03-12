<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
 }

    public function index(){

        $users=User::get();
       
        return view('admin.user.userindex',compact('users'));
}
public function create(){

    $users=new User();
    
    $roles=Role::get();
    // dd($roles);

    return view('admin.user.usercreate',compact('users','roles'));
}

public function store(Request $request){
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        'role' => 'required|string|exists:roles,role', 
    ]);

    
    $role = Role::where('role', $data['role'])->first();

 
    if ($role) {
        $data['role'] = $role->role; 
        $data['role_id'] = $role->id; 
    } else {
      
        return redirect()->back()->with('error', 'Selected role does not exist.');
    }

    User::create($data);

    return redirect()->route('user.index')->with('success', 'User created successfully');
}
public function edit($id){

    $users=User::find($id);
    $roles=Role::get();


    return view('admin.user.usercreate',compact('users','roles'));

}



public function update(Request $request, $id){
    $user = User::find($id);
    
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'password' => 'nullable|string|min:6',
        'role' => 'required|string|exists:roles,role', 
    ]);

    $role = Role::where('role', $data['role'])->first();

    if ($role) {
        $data['role'] = $role->role; 
        $data['role_id'] = $role->id; 
    } else {
     
        return redirect()->back()->with('error', 'Selected role does not exist.');
    }

   
    $user->fill($data)->save();

    return redirect()->route('user.index')->with('success', 'User updated successfully');
}

    public function delete($id)
{

    $user = User::find($id);
    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }
    $user->delete();
    return redirect()->route('user.index');
}

}
