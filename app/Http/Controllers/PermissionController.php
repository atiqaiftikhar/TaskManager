<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionCategory;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permission($cid)
    {
     $permission=Permission::get();
     return view('admin.permission.index',compact('permission','cid'));


    }
    public function create ($cid)
    {
        $permission= new permission();
        $permission_category = PermissionCategory::find($cid);


        return view('admin.permission.create',compact('permission','cid'));

    }

    public function store(Request $request, $cid)
    {
        $permission_category = PermissionCategory::findOrFail($cid);
         $permission= new permission();

         $data=$request->all();
         $permission->create($data);

         return redirect()->route('permission.index')->with('success','Permission Added Successfully');

    }
    public function edit($id)
    {

     $permission=Permission::find($id);

      return view('admin.permission.create',compact('permission',));

    }
    public function update(Request $request,$id)
    {
        //$id=$request->$id;
        $permission=Permission::find($id);
        $data=$request->all();
        $permission->update($data);
        return redirect()->route('permission.index')->with('success', 'Permission Updated Successfully');
    }

    public function delete($id)
    {
        $permission=Permission::find($id);

        $permission->delete();

        return redirect()->back()->with('success', 'Permission Deleted Successfully');
    }
}
