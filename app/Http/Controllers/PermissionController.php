<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionCategory;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permission($cid)
    {
    $permission_category = PermissionCategory::findOrFail($cid);
    $permission = Permission::where('per_category_id', $cid)->get();
     return view('admin.permission.index',compact('permission','cid','permission_category'));


    }
    public function create ($cid)
    {
        $permission= new permission();
        $permission_category = PermissionCategory::find($cid);


        return view('admin.permission.create',compact('permission','cid','permission_category'));

    }

    public function store(Request $request, $cid)
    {
        $permission_category = PermissionCategory::findOrFail($cid);
         $permission= new permission();
         $permission->title = $request->title;
         $permission->permission= $request->permission;

         $permission->per_category_id = $cid;
         $permission->save();


         return redirect()->route('permission.index', $cid)->with('success','Permission Added Successfully');

    }
    public function edit($cid,$id)
    {
        $permission_category = PermissionCategory::findOrFail($cid);
     $permission=Permission::find($id);

      return view('admin.permission.create',compact('permission','permission_category','cid'));

    }
    public function update(Request $request,$cid,$id)
    {
        $permission=Permission::find($id);
        $data=$request->all();
        $permission->update($data);
        return redirect()->route('permission.index',['cid' => $cid])->with('success', 'Permission Updated Successfully');
    }

    public function delete($cid,$id)
    {
        $permission=Permission::find($id);

        $permission->delete();

        return redirect()->back()->with('success', 'Permission Deleted Successfully');
    }
}
