<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){

        $roles=Role::get();
       
        return view('admin.roles.index',compact('roles'));
}
public function create(){

    $roles=new Role();
    return view('admin.roles.create',compact('roles'));
}
public function store(Request $request){

    $roles=new Role();
    
    $data=$request->all();
    // return $data;
    Role::create($data);
    return redirect()->route('roles.index');

}
public function edit($id){

    $roles=Role::find($id);

    return view('admin.roles.create',compact('roles'));

}
public function update(Request $request,$id){

    $roles=Role::find($id);
    
    $data=$request->all();
    
    $roles->update($data);
    return redirect()->route('roles.index');

}
public function delete($id){

    $roles=Role::find($id);
    $roles->delete();
    return redirect()->route('roles.index');

}

}
