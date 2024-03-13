<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function module($pid)
{
// dd($pid);
    $project= Project::findOrFail($pid);


    $modules = Module::where('project_id', $pid)->get();


    return view('admin.module.index', compact('project','modules'));
}

public function create($pid)
{
    $modules= new Module();
    // $task = Task::find($tid);
    $project = Project::find($pid);
    // if (!$project) {
    //     abort(404);
    // }

    // $projectUsers = ProjectUser::where('project_id', $project->id)->pluck('user_id');
    // $teamMembers = User::whereIn('id', $projectUsers)->get();

    // // $projectUsers = ProjectUser::where('project_id', $task->project_id)->pluck('user_id');

    return view('admin.module.create', compact('modules','project','pid'));
}




public function store(Request $request, $pid) {

    $validatedData = $request->validate([

        'name' => 'required|string|max:255',

    ]);


    $project= Project::findOrFail($pid);


    $modules = new Module();
    $modules->project_id = $project->id;

    $modules->module_created_by = Auth::id();
    $modules->name = $validatedData['name'];


    $modules->save();


    return redirect()->route('module.index', $pid)->with('success', 'Module created successfully.');
}
public function edit($pid, $id)
{

    $project= Project::findOrFail($pid);
    $modules = Module::findOrFail($id);

    // $projectUsers = ProjectUser::where('project_id', $project->id)->pluck('user_id');
    // $teamMembers = User::whereIn('id', $projectUsers)->get();
    return view('admin.module.create', compact('project', 'modules', 'pid',));
}


    public function update(Request $request,$pid, $id)
    {



        $modules = Module::findOrFail($id);

        $request->validate([

            'name' => 'required',

        ]);

        $modules->update([

            'name' => $request->input('name'),


        ]);






        return redirect()->route('module.index',['pid' => $pid])->with('success', 'Module Updated Successfully');
    }


    public function delete($pid, $id)
    {
        $modules=Module::find($id);


        $modules->delete();

        return redirect()->back()->with('success', 'Module Deleted Successfully');
    }

}
