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

    $users=new User();
    
    $data=$request->all();
    // return $data;
    User::create($data);
    return redirect()->route('user.index');

}
public function edit($id){

    $users=User::find($id);
    $roles=Role::get();


    return view('admin.user.usercreate',compact('users','roles'));

}
public function update(Request $request,$id){

    $users=User::find($id);
    
    $data=$request->all();
    
    $users->update($data);
    return redirect()->route('user.index');

}
// 
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
