<?php

namespace App\Http\Controllers;

use App\Models\PermissionCategory;
use Illuminate\Http\Request;

class PermissionCategoryController extends Controller
{
    public function category()
    {


            $permission_category = PermissionCategory::all();


        return view('admin.permissioncategory.index', compact('permission_category'));
    }
        public function create ()
        {

            $permission_category= new PermissionCategory();


            return view('admin.permissioncategory.create',compact('permission_category'));

        }

    public function store(Request $request)
    {


        $permission_category = new PermissionCategory();
        $permission_category->name = $request->name;

        $permission_category->save();



        return redirect()->route('permissioncategory.index')->with('success', 'Project Added Successfully');
    }
        public function edit($id)
        {

            $permission_category=PermissionCategory::find($id);


          return view('admin.permissioncategory.create',compact('permission_category'));

        }
        public function update(Request $request,$id)
        {

            $permission_category=PermissionCategory::find($id);
            $data=$request->all();
             $permission_category->update($data);
            return redirect()->route('permissioncategory.index')->with('success', 'Category Updated Successfully');
        }

        public function delete($id)
        {
            $permission_category = PermissionCategory::find($id);

            if ($permission_category) {

                $permission_category->permissions()->delete();


                $permission_category->delete();

                return redirect()->back()->with('success', 'Category Deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'Category not found');
            }
        }
}
